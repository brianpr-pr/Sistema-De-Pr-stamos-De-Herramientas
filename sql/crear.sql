-- create_tables.sql
-- Base de datos resumida para préstamos de herramientas

DROP DATABASE IF EXISTS tools_db;
CREATE DATABASE tools_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE tools_db;

-- Tabla de herramientas
CREATE TABLE tools (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  sku VARCHAR(50) UNIQUE NOT NULL,
  total_copies INT NOT NULL DEFAULT 1,
  available_copies INT NOT NULL DEFAULT 1
);

-- Tabla de usuarios
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fullname VARCHAR(150) NOT NULL,
  email VARCHAR(150) UNIQUE NOT NULL
);

-- Tabla de préstamos
CREATE TABLE loans (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tool_id INT NOT NULL,
  user_id INT NOT NULL,
  loaned_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  due_at DATE NOT NULL,
  returned_at DATETIME NULL,
  status ENUM('ongoing','returned') NOT NULL DEFAULT 'ongoing',
  FOREIGN KEY (tool_id) REFERENCES tools(id) ON DELETE RESTRICT,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE RESTRICT
);

-- Datos de ejemplo: herramientas
INSERT INTO tools (name, sku, total_copies, available_copies) VALUES
('Hammer', 'HAM-001', 3, 2),
('Electric Drill', 'DRL-002', 2, 0),
('Circular Saw', 'SAW-003', 1, 1),
('Extension Ladder', 'LAD-004', 4, 3),
('Orbital Sander', 'SND-005', 2, 1),
('Adjustable Wrench Set', 'WRN-006', 5, 5);

-- Datos de ejemplo: usuarios
INSERT INTO users (fullname, email) VALUES
('Ana Pérez', 'ana.perez@example.com'),
('Carlos López', 'carlos.lopez@example.com'),
('María García', 'maria.garcia@example.com'),
('José Martínez', 'jose.martinez@example.com'),
('Lucía Fernández', 'lucia.fernandez@example.com'),
('Pablo Sánchez', 'pablo.sanchez@example.com');

-- Datos de ejemplo: préstamos
INSERT INTO loans (tool_id, user_id, loaned_at, due_at, returned_at, status) VALUES
(1, 1, '2025-02-20 10:15:00', '2025-02-27', NULL, 'ongoing'),
(2, 2, '2025-02-18 09:00:00', '2025-03-04', NULL, 'ongoing'),
(2, 3, '2025-02-19 14:30:00', '2025-03-05', NULL, 'ongoing'),
(4, 4, '2025-01-10 08:00:00', '2025-01-17', '2025-01-16 12:00:00', 'returned'),
(5, 5, '2025-02-22 11:45:00', '2025-03-01', NULL, 'ongoing'),
(1, 6, '2025-01-05 09:30:00', '2025-01-12', '2025-01-11 16:00:00', 'returned');
