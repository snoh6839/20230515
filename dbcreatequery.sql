CREATE DATABASE animesite;

USE animesite;

-- Table user_info
CREATE TABLE user_info (
  user_no INT AUTO_INCREMENT PRIMARY KEY,
  user_id VARCHAR(255) NOT NULL,
  user_pw VARCHAR(255) NOT NULL,
  user_name VARCHAR(255) NOT NULL
);

-- Table user_comment
CREATE TABLE user_comment (
  comment_no INT AUTO_INCREMENT PRIMARY KEY,
  user_no INT NOT NULL,
  comment_content TEXT NOT NULL,
  comment_date DATETIME NOT NULL,
  FOREIGN KEY (user_no) REFERENCES user_info (user_no)
);

ALTER TABLE user_comment ALTER COLUMN comment_date SET DEFAULT NOW();

-- Table anime_data
CREATE TABLE anime_data (
  anime_no INT AUTO_INCREMENT PRIMARY KEY,
  anime_name VARCHAR(255) NOT NULL,
  anime_description TEXT NOT NULL,
  anime_type VARCHAR(255) NOT NULL,
  anime_studios VARCHAR(255) NOT NULL,
  anime_date DATE NOT NULL,
  anime_status VARCHAR(255) NOT NULL,
  anime_genre VARCHAR(255) NOT NULL,
  anime_scores DECIMAL(3, 2) NOT NULL,
  anime_rating DECIMAL(3, 2) NOT NULL,
  anime_duration INT NOT NULL,
  anime_quality VARCHAR(255) NOT NULL,
  views INT NOT NULL
);

-- Table follows
CREATE TABLE follows (
  user_no INT NOT NULL,
  anime_no INT NOT NULL,
  follow_flag CHAR(1) NOT NULL,
  FOREIGN KEY (user_no) REFERENCES user_info (user_no),
  FOREIGN KEY (anime_no) REFERENCES anime_data (anime_no)
);

ALTER TABLE follows ALTER COLUMN follow_flag SET DEFAULT '0';

COMMIT;