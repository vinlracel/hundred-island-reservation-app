-- Create the database
CREATE DATABASE IF NOT EXISTS blog;

-- Use the database
USE blog;

-- Create the posts table with auto-incrementing integer post_id
CREATE TABLE IF NOT EXISTS posts (
    post_id INT AUTO_INCREMENT PRIMARY KEY,
    post_title VARCHAR(255) NOT NULL,
    post_body TEXT NOT NULL
);

-- Insert sample data
INSERT INTO posts (post_title, post_body) VALUES
('First Post', 'This is the body of the first post.'),
('Second Post', 'This is the body of the second post.'),
('Third Post', 'This is the body of the third post.');