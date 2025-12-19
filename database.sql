CREATE DATABASE IF NOT EXISTS realestatepro;
USE realestatepro;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name NVARCHAR(255),
    email NVARCHAR(255) UNIQUE,
    password NVARCHAR(255),
    avatar NVARCHAR(255),
    role NVARCHAR(50) DEFAULT 'user',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP(),
    updated_at DATETIME
);

CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name NVARCHAR(255) UNIQUE
);

CREATE TABLE properties (
    property_id INT AUTO_INCREMENT PRIMARY KEY,
    title NVARCHAR(255),
    price DOUBLE,
    main_image VARCHAR(255),
    location NVARCHAR(255),
    type NVARCHAR(255),
    category NVARCHAR(255),
    bedrooms INT,
    bathrooms INT,
    area INT,
    furnished TINYINT DEFAULT 0,
    amenities NVARCHAR(500),
    gps NVARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP() ,
    CONSTRAINT fk_category
        FOREIGN KEY (category)
        REFERENCES categories(name)
        ON UPDATE CASCADE
        ON DELETE SET NULL
);

CREATE TABLE property_images (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    property_id INT,
    image VARCHAR(255),
    CONSTRAINT fk_property_image
        FOREIGN KEY (property_id)
        REFERENCES properties(property_id)
        ON DELETE CASCADE
);

CREATE TABLE feedback (
    feedback_id INT AUTO_INCREMENT PRIMARY KEY,
    rating INT,
    message TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP(),
    unread TINYINT DEFAULT 1
);

CREATE TABLE inquiries (
    inquiry_id INT AUTO_INCREMENT PRIMARY KEY,
    property_id INT,
    name NVARCHAR(255),
    email NVARCHAR(255),
    title NVARCHAR(255),
    message TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP(),
    unread TINYINT DEFAULT 1,
    CONSTRAINT fk_inquiry_property
        FOREIGN KEY (property_id)
        REFERENCES properties(property_id)
        ON DELETE CASCADE
);

INSERT INTO categories (name) VALUES 
('buy'),
('rent'),
('featured');