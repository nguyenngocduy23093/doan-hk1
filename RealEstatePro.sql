-- Create database (optional)
CREATE DATABASE IF NOT EXISTS realestatepro;
USE realestatepro;

-- USERS
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name NVARCHAR(255),
    email NVARCHAR(255) UNIQUE,
    password NVARCHAR(255),
    avatar NVARCHAR(255),
    role NVARCHAR(50), -- admin, user
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- CATEGORIES
CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name NVARCHAR(255) UNIQUE
);

-- PROPERTIES
CREATE TABLE properties (
    property_id INT AUTO_INCREMENT PRIMARY KEY,
    title NVARCHAR(255),
    price DOUBLE,
    image_main_url NVARCHAR(255),
    location NVARCHAR(255),
    description TEXT,
    type NVARCHAR(100), -- apartment, villa, etc.
    category NVARCHAR(255),
    bedrooms INT,
    bathrooms INT,
    area INT,
    furnishing NVARCHAR(100), -- furnished, unfurnished, etc.
    amenities NVARCHAR(500),
    gps NVARCHAR(750),
    CONSTRAINT fk_property_category
        FOREIGN KEY (category)
        REFERENCES categories(name)
        ON UPDATE CASCADE
        ON DELETE SET NULL
);

-- PROPERTY IMAGES
CREATE TABLE property_images (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    property_id INT,
    image_url NVARCHAR(255),
    CONSTRAINT fk_image_property
        FOREIGN KEY (property_id)
        REFERENCES properties(property_id)
        ON DELETE CASCADE
);

-- FEEDBACK
CREATE TABLE feedback (
    feedback_id INT AUTO_INCREMENT PRIMARY KEY,
    rating INT,
    message TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    unread TINYINT DEFAULT 1
);

-- INQUIRIES
CREATE TABLE inquiries (
    inquiry_id INT AUTO_INCREMENT PRIMARY KEY,
    property_id INT,
    name NVARCHAR(255),
    email NVARCHAR(255),
    title NVARCHAR(255),
    message TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_inquiry_property
        FOREIGN KEY (property_id)
        REFERENCES properties(property_id)
        ON DELETE CASCADE
);

-- Insert default categories
INSERT INTO categories (name)
VALUES ('buy'), ('rent'), ('featured');