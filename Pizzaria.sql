CREATE TABLE Cliente (
ID_cliente SERIAL PRIMARY KEY,
endereco_cliente VARCHAR(255),
email_cliente VARCHAR(255),
senha_cliente VARCHAR(255) NOT NULL ,
nome_cliente VARCHAR(100) UNIQUE,
telefone_cliente VARCHAR(14)
);

CREATE TABLE Pizzas (
ID_pizza SERIAL PRIMARY KEY,
preco_pizza MONEY NOT NULL,
sabor_pizza VARCHAR(100) NOT NULL,
tamanho_pizza VARCHAR(30) NOT NULL,
borda_pizza VARCHAR(50),
descricao_pizza VARCHAR(255)
);

CREATE TABLE Funcionarios (
ID_funcionario SERIAL PRIMARY KEY,
nome_funcionario VARCHAR(100) NOT NULL,
cargo_funcionario VARCHAR(255),
email_funcionario VARCHAR(255),
telefone_funcionario VARCHAR(14),
cpf_funcionario VARCHAR(14) UNIQUE,
data_contratacao DATE NOT NULL
);


CREATE TABLE Pedido (
ID_pedido SERIAL PRIMARY KEY,
ID_cliente INT REFERENCES Cliente(ID_cliente),
data_pedido DATE NOT NULL,
status_pedido VARCHAR(50),
total_pedido MONEY
);


CREATE TABLE Itens_Pedido (
ID_item SERIAL PRIMARY KEY,
ID_pedido INT REFERENCES Pedido(ID_pedido),
quantidade INT,
preco_unitario MONEY,
subtotal_pedido MONEY,
ID_pizza INT REFERENCES PIZZAS(ID_PIZZA)
);

CREATE TABLE Vendas (
ID_venda SERIAL PRIMARY KEY,
ID_pedido INT REFERENCES PEDIDO(ID_pedido),
ID_cliente INT REFERENCES CLIENTE (ID_cliente),
endereco_cliente VARCHAR(255),
data_venda DATE,
metodo_pagamento VARCHAR(30) NOT NULL,
total_venda MONEY
);