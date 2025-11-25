CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    avatar VARCHAR(255),
    role VARCHAR(50), -- admin, user
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) UNIQUE
);

CREATE TABLE properties (
    property_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    price DOUBLE,
    location VARCHAR(255),
    description TEXT,
    type VARCHAR(100),     -- apartment, villa, shop, etc.
    category VARCHAR(255), -- references categories.name
    bedrooms INT,
    bathrooms INT,
    area INT,
    furnishing VARCHAR(100), -- furnished, semi-furnished, unfurnished
    amenities JSON,          -- stores JSON
    CONSTRAINT fk_category_name FOREIGN KEY (category) REFERENCES categories(name)
);

CREATE TABLE property_images (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    property_id INT,
    image_url VARCHAR(255),
    FOREIGN KEY (property_id) REFERENCES properties(property_id) ON DELETE CASCADE
);

CREATE TABLE feedback (
    feedback_id INT AUTO_INCREMENT PRIMARY KEY,
    rating INT,
    message TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    unread TINYINT(1)
);

CREATE TABLE inquiries (
    inquiry_id INT AUTO_INCREMENT PRIMARY KEY,
    property_id INT,
    name VARCHAR(255),
    email VARCHAR(255),
    title VARCHAR(255),
    message TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (property_id) REFERENCES properties(property_id) ON DELETE CASCADE
);