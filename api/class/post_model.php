<?php

class PostModel
{

    // Connection
    private $conn;

    // Table
    private $db_table = "reservation";

    // Columns
    public $post_id;
    public $name;
    public $email;
    public $cnum;
    public $date;
    public $time;
    public $address;

    // Db connection
    public function __construct($db)
    {

        $this->conn = $db;

    }

    // Create
    public function onCreatePost()
    {

        $sql = "INSERT INTO " . $this->db_table . " SET 
                        name = :name, 
                        email = :email,
                        cnum = :cnum,
                        date = :date,
                        time = :time,
                        address = :address";

        $stmt = $this->conn->prepare($sql);

        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->cnum=htmlspecialchars(strip_tags($this->cnum));
        $this->date=htmlspecialchars(strip_tags($this->date));
        $this->time=htmlspecialchars(strip_tags($this->time));
        $this->address=htmlspecialchars(strip_tags($this->address));

        // bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":cnum", $this->cnum);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":time", $this->time);
        $stmt->bindParam(":address", $this->address);

        if($stmt->execute())
        {

            return true;

        }
        return false;

    }

    // Read
    public function getPosts()
    {

        $sql = "SELECT * FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;

    }

    // Single Read
    public function getPost()
    {

        $sql = "SELECT * FROM " . $this->db_table . " WHERE post_id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(1, $this->post_id);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $dataRow['name'];
        $this->email = $dataRow['email'];

    }

    // Update
    public function onUpdatePost()
    {

        $sql = "UPDATE " . $this->db_table . "
                    SET
                        name = :name,
                        email = :email,
                    WHERE
                        post_id = :post_id";

        $stmt = $this->conn->prepare($sql);

        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->post_id=htmlspecialchars(strip_tags($this->post_id));

        // bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":post_id", $this->post_id);

        if($stmt->execute())
        {

            return true;

        }
        return false;

    }

    // Delete
    public function onDeletePost()
    {

        $sql = "DELETE FROM " . $this->db_table . " WHERE post_id = ?";

        $stmt = $this->conn->prepare($sql);

        $this->post_id=htmlspecialchars(strip_tags($this->post_id));

        $stmt->bindParam(1, $this->post_id);

        if($stmt->execute())
        {

            return true;

        }
        return false;

    }

}

?>