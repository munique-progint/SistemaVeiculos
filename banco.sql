CREATE DATABASE IF NOT EXISTS sistema_veiculos;

USE sistema_veiculos;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(100) NOT NULL,
    senha VARCHAR(100) NOT NULL
);

CREATE TABLE marcas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(100) NOT NULL
);

CREATE TABLE veiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(100) NOT NULL,
    id_marca INT NOT NULL,
    potencia VARCHAR(50) NOT NULL,
    ano_fabricacao INT NOT NULL,
    tipo VARCHAR(20) NOT NULL,

    FOREIGN KEY (id_marca)
    REFERENCES marcas(id)
);

INSERT INTO usuarios (usuario, senha)
VALUES
('admin','123456');

INSERT INTO marcas (marca)
VALUES
('Chevrolet'),
('Fiat'),
('Ford'),
('Honda'),
('Hyundai'),
('Toyota'),
('Volkswagen');