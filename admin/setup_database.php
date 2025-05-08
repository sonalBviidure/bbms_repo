<?php
require 'connection.php';



$queries = [
    // 1. Create categories table first (no foreign key dependencies)
    "CREATE TABLE categories (
        id INT AUTO_INCREMENT PRIMARY KEY,
        category_name VARCHAR(255) NOT NULL,
        category_code VARCHAR(50) UNIQUE NOT NULL,
        image VARCHAR(255),
        status TINYINT(1) DEFAULT 1
    );",

    

    // 2. Create matrices table (no foreign key dependencies)
    "CREATE TABLE matrices (
        id INT AUTO_INCREMENT PRIMARY KEY,
        matrix_name VARCHAR(255) NOT NULL,
        matrix_area VARCHAR(255) NOT NULL,
        contact_person VARCHAR(255) NOT NULL,
        contact_number VARCHAR(20) NOT NULL,
        email VARCHAR(255) NOT NULL,
        address TEXT NOT NULL,
        photo VARCHAR(255),
        status TINYINT(1) DEFAULT 1,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );",

    // 3. Create board_members table (depends on matrices and categories)
    "CREATE TABLE board_members (
        id INT AUTO_INCREMENT PRIMARY KEY,
        matrix_id INT,
        member_name VARCHAR(255) NOT NULL,
        business_name VARCHAR(255) NOT NULL,
        category_id INT NOT NULL,
        contact_number VARCHAR(20) NOT NULL,
        email VARCHAR(255) NOT NULL,
        photo VARCHAR(255),
        status TINYINT(1) DEFAULT 1,
        FOREIGN KEY (matrix_id) REFERENCES matrices(id),
        FOREIGN KEY (category_id) REFERENCES categories(id)
    );",

    // 4. Create meetings table (depends on matrices)
    "CREATE TABLE meetings (
        id INT AUTO_INCREMENT PRIMARY KEY,
        matrix_id INT,
        meeting_date DATE NOT NULL,
        meeting_time TIME NOT NULL,
        venue VARCHAR(255) NOT NULL,
        description TEXT,
        status TINYINT(1) DEFAULT 1,
        FOREIGN KEY (matrix_id) REFERENCES matrices(id)
    );"
];

foreach ($queries as $query) {
    if ($con->query($query) === TRUE) {
        echo "Table created successfully<br>";
    } else {
        echo "Error creating table: " . $con->error . "<br>";
    }
}



$con->close();
?>