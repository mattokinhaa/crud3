create database Funko;
USE Funko;

create table clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    senha varchar(8) not null
);

INSERT INTO clientes (nome, senha) VALUES 
('teste', '12345678');

select * from clientes;