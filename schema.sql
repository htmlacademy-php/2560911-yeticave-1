CREATE DATABASE yeticave
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_general_ci;

USE yeticave;

CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  symbol_code VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  email VARCHAR(255) NOT NULL UNIQUE,
  name VARCHAR(100) NOT NULL,
  passw CHAR(60) NOT NULL,
  contacts VARCHAR(500) NOT NULL
  );
  
CREATE TABLE lots (
  id INT AUTO_INCREMENT PRIMARY KEY,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  created_title VARCHAR(255) NOT NULL,
  created_desc TEXT,
  image_url VARCHAR(255),
  start_price INT NOT NULL,
  end_date DATETIME NOT NULL,
  rate_step INT NOT NULL,
  author_id INT NOT NULL,
  winner_id INT DEFAULT NULL,
  category_id INT NOT NULL,
  FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (winner_id) REFERENCES users(id) ON DELETE SET NULL,
  FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

CREATE TABLE rate (
  id INT AUTO_INCREMENT PRIMARY KEY,
  сreated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  amount INT NOT NULL,
  user_id INT NOT NULL,
  lot_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (lot_id) REFERENCES lots(id) ON DELETE CASCADE
);
