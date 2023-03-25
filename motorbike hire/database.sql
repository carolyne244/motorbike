CREATE DATABASE motorbike_management;

USE motorbike_management;

CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(100) NOT NULL,
  full_name VARCHAR(100) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY username (username),
  UNIQUE KEY email (email)
);

CREATE TABLE motorbikes (
  id INT(11) NOT NULL AUTO_INCREMENT,
  brand VARCHAR(50) NOT NULL,
  model VARCHAR(50) NOT NULL,
  year INT(4) NOT NULL,
  color VARCHAR(20) NOT NULL,
  description TEXT,
  image VARCHAR(100),
  price DECIMAL(10,2) NOT NULL,
  available BOOLEAN DEFAULT true,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

CREATE TABLE bookings (
  id INT(11) NOT NULL AUTO_INCREMENT,
  user_id INT(11) NOT NULL,
  motorbike_id INT(11) NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (motorbike_id) REFERENCES motorbikes(id)
);

CREATE TABLE payments (
  id INT(11) NOT NULL AUTO_INCREMENT,
  booking_id INT(11) NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  cardholder_name VARCHAR(100) NOT NULL,
  card_number VARCHAR(20) NOT NULL,
  expiry_date VARCHAR(10) NOT NULL,
  cvv VARCHAR(4) NOT NULL,
  billing_address VARCHAR(100) NOT NULL,
  city VARCHAR(50) NOT NULL,
  state VARCHAR(50) NOT NULL,
  zip VARCHAR(10) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (booking_id) REFERENCES bookings(id)
);
