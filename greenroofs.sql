CREATE TABLE green_area_type (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(50) NOT NULL,
    description TEXT
);

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role VARCHAR(20) DEFAULT 'user'
);

CREATE TABLE settlements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    settlement_name VARCHAR(50)
);

CREATE TABLE zip_codes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    zip_code INT
);

CREATE TABLE location_zip_codes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    settlement_id INT NOT NULL,
    zip_code_id INT NOT NULL,
    FOREIGN KEY (settlement_id) REFERENCES settlements(id),
    FOREIGN KEY (zip_code_id) REFERENCES zip_codes(id)
);

CREATE TABLE green_area (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    type_id INT NOT NULL,
    area_m2 FLOAT NOT NULL,
    creation_date DATE,
    coordinates GEOMETRY,
    admin_id INT NOT NULL,
    location_zip_code_id INT NOT NULL,
    FOREIGN KEY (type_id) REFERENCES green_area_type(id),
    FOREIGN KEY (admin_id) REFERENCES admin(id),
    FOREIGN KEY (location_zip_code_id) REFERENCES location_zip_codes(id)
);

CREATE TABLE impacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    urban_green_area_id INT NOT NULL,
    air_quality_improvement FLOAT DEFAULT 0,
    noise_reduction FLOAT DEFAULT 0,
    temperature_reduction FLOAT DEFAULT 0,
    biodiversity_increase INT DEFAULT 0,
    FOREIGN KEY (urban_green_area_id) REFERENCES green_area(id)
);

CREATE TABLE green_roof_buildings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    building_name VARCHAR(100),
    address VARCHAR(150) NOT NULL,
    green_roof_area_m2 FLOAT NOT NULL,
    construction_date DATE,
    green_area_id INT NOT NULL,
    FOREIGN KEY (green_area_id) REFERENCES green_area(id)
);

-- Mintaadatok beszúrása

-- green_area_type
INSERT INTO green_area_type (type_name, description) VALUES
('Park', 'Egy közterületi park zöld területe.'),
('Játszótér', 'Játszótér gyerekek számára.'),
('Botanikus kert', 'Növények gyűjteményét tartalmazó kert.');

-- admin
INSERT INTO admin (username, password_hash, role) VALUES
('admin1', 'hashed_password1', 'admin'),
('user1', 'hashed_password2', 'user'),
('user2', 'hashed_password3', 'user');

-- settlements
INSERT INTO settlements (settlement_name) VALUES
('Budapest'),
('Debrecen'),
('Szeged');

-- zip_codes
INSERT INTO zip_codes (zip_code) VALUES
(1011),
(4025),
(6720);

-- location_zip_codes
INSERT INTO location_zip_codes (settlement_id, zip_code_id) VALUES
(1, 1), -- Budapest, 1011
(2, 2), -- Debrecen, 4025
(3, 3); -- Szeged, 6720

-- green_area
INSERT INTO green_area (name, type_id, area_m2, creation_date, coordinates, admin_id, location_zip_code_id) VALUES
('Margitsziget', 1, 960000, '1950-01-01', NULL, 1, 1), -- Budapest, admin1
('Nagyerdő', 1, 1080000, '1970-06-15', NULL, 2, 2), -- Debrecen, user1
('Szegedi Vadaspark', 3, 450000, '1989-03-25', NULL, 3, 3); -- Szeged, user2

-- impacts
INSERT INTO impacts (urban_green_area_id, air_quality_improvement, noise_reduction, temperature_reduction, biodiversity_increase) VALUES
(1, 85.5, 70.0, 2.5, 100),
(2, 60.0, 50.0, 1.8, 80),
(3, 72.3, 65.0, 2.2, 90);

-- green_roof_buildings
INSERT INTO green_roof_buildings (building_name, address, green_roof_area_m2, construction_date, green_area_id) VALUES
('Budapest Towers', 'Budapest, Fő utca 1.', 1500, '2010-09-15', 1),
('Debreceni Pláza', 'Debrecen, Piac utca 3.', 1200, '2015-04-20', 2),
('Szegedi Irodaház', 'Szeged, Tisza Lajos körút 5.', 800, '2020-06-10', 3);

