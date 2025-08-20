CREATE DATABASE IF NOT EXISTS ud_meylin;
USE ud_meylin;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    role ENUM('superadmin','admin') DEFAULT 'admin'
);

INSERT INTO users (username, password, role) VALUES
('admin', MD5('admin123'), 'superadmin'),
('user', MD5('user123'), 'admin');

CREATE TABLE items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_barang VARCHAR(100),
    satuan VARCHAR(20)
);

INSERT INTO items (nama_barang, satuan) VALUES
('Aqua Gelas', 'pcs'),
('Aqua Botol 330ml', 'pcs'),
('Aqua Botol 600ml', 'pcs'),
('Aqua Botol 750ml', 'pcs'),
('Aqua Botol 1500ml', 'pcs'),
('Gas Elpiji 3kg', 'tabung'),
('Gas Elpiji 5kg', 'tabung'),
('Gas Elpiji 12kg', 'tabung');

CREATE TABLE harga_barang (
    item_id INT PRIMARY KEY,
    harga_jual DECIMAL(12,2),
    updated_at DATETIME,
    FOREIGN KEY (item_id) REFERENCES items(id)
);

CREATE TABLE pembelian (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_id INT,
    jumlah INT,
    tanggal DATE,
    FOREIGN KEY (item_id) REFERENCES items(id)
);

CREATE TABLE penjualan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_id INT,
    jumlah INT,
    harga DECIMAL(12,2),
    tanggal DATE,
    FOREIGN KEY (item_id) REFERENCES items(id)
);