-- Criar o banco
CREATE DATABASE curso CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Criar a Tabela
CREATE TABLE usuarios (
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(8) NOT NULL
) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE clientes (
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_cliente VARCHAR(150) NOT NULL UNIQUE,
    telefone VARCHAR(11) NOT NULL,
    cep INT(8) NOT NULL
) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE produtos (
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_produto VARCHAR(150) NOT NULL,
	valor DECIMAL(10,2)
) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE vendas (
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    quantidade INT(5) NOT NULL,
	total DECIMAL(10,2) NOT NULL,
    data DATE NOT NULL,
    cliente_id INT UNSIGNED NOT NULL,
    produto_id INT UNSIGNED NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES clientes (id),
    FOREIGN KEY (produto_id) REFERENCES produtos (id)
) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- INSERTs
-- Usuario
INSERT INTO usuarios (nome_usuario, senha) VALUES ('master', 'master00');
INSERT INTO usuarios (nome_usuario, senha) VALUES ('usuario1', '12345678');
INSERT INTO usuarios (nome_usuario, senha) VALUES ('usuario2', '87654321');
INSERT INTO usuarios (nome_usuario, senha) VALUES ('usuario3', '14785236');
INSERT INTO usuarios (nome_usuario, senha) VALUES ('usuario4', '63258741');
INSERT INTO usuarios (nome_usuario, senha) VALUES ('teste', '123');

-- Cliente
INSERT INTO clientes (nome_cliente, telefone, cep) VALUES ('José Nunes', '48999999999', 88801500);
INSERT INTO clientes (nome_cliente, telefone, cep) VALUES ('Maria Lopes', '48988888888', 88801014);
INSERT INTO clientes (nome_cliente, telefone, cep) VALUES ('Jarbas da Silva', '48977777777', 88801030);
INSERT INTO clientes (nome_cliente, telefone, cep) VALUES ('Ludes Maria', '48922223333', 88802050);
INSERT INTO clientes (nome_cliente, telefone, cep) VALUES ('Carlos Souza', '48922224444', 88801445);

-- Produto
INSERT INTO produtos (nome_produto, valor) VALUES ('Caneca branca sem estampa', 20.00);
INSERT INTO produtos (nome_produto, valor) VALUES ('Boné branco sem estampa', 40.00);
INSERT INTO produtos (nome_produto, valor) VALUES ('Camiseta preta sem estampa', 50.00);
INSERT INTO produtos (nome_produto, valor) VALUES ('Camiseta branca sem estampa', 50.00);
INSERT INTO produtos (nome_produto, valor) VALUES ('Caneca dourada sem estampa', 30.00);

-- Venda
INSERT INTO vendas (quantidade, total, data, cliente_id, produto_id) VALUES ( 1, 40.00, '2024-03-01', 2, 2);
INSERT INTO vendas (quantidade, total, data, cliente_id, produto_id) VALUES (2, 80.00, '2024-03-08', 3, 2);
INSERT INTO vendas (quantidade, total, data, cliente_id, produto_id) VALUES (1, 20.00, '2024-03-08', 3, 1);
INSERT INTO vendas (quantidade, total, data, cliente_id, produto_id) VALUES (3, 150.00, '2024-03-09', 1, 3);
INSERT INTO vendas (quantidade, total, data, cliente_id, produto_id) VALUES (4, 120.00, '2024-03-15', 5, 5);

-- SELECT
SELECT * FROM usuarios;
SELECT * FROM clientes;
SELECT * FROM produtos;
SELECT * FROM vendas;

-- INNER não vai trazer os registros dos clientes que não tiver vendas
SELECT ven.cliente_id as 'Tabela Vendas', cli.id as 'Tabela cliente', cli.nome_cliente as 'Tabela nomecliente'
FROM clientes cli
INNER JOIN vendas ven ON ven.cliente_id = cli.id
WHERE cli.id = 7;

SELECT ven.produto_id as 'Tabela Vendas', pro.id as 'Tabela Produto', pro.nome_produto as 'Tabela nomeproduto'
FROM produtos pro
INNER JOIN vendas ven ON ven.produto_id = pro.id
WHERE pro.id = 2;

SELECT ven.id, cli.nome_cliente, pro.nome_produto, ven.quantidade, ven.total, ven.data 
FROM vendas ven
INNER JOIN clientes cli ON cli.id = ven.cliente_id
INNER JOIN produtos pro ON pro.id = ven.produto_id
WHERE ven.id = 1;




-- Excluir Tabelas
/*
DROP TABLE IF EXISTS vendas;
DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS produtos;
DROP TABLE IF EXISTS clientes;
*/
