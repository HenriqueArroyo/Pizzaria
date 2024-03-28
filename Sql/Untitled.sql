CREATE DATABASE bd_ex4;

-- Tabela

CREATE TABLE cadfun (
 CODFUN INT NOT NULL PRIMARY KEY,
 NOME VARCHAR(40) NOT NULL,
 DEPTO CHAR( 2),
 FUNCAO CHAR(20),
 SALARIO NUMERIC(10, 2)
);


-- Inserção de Dados

INSERT INTO cadfun (CODFUN, NOME, DEPTO, FUNCAO, SALARIO)
VALUES (12, 'CARLOS ALBERTO', '3', 'VENDEDOR', 1530.00);

INSERT INTO cadfun (CODFUN, NOME, DEPTO, FUNCAO, SALARIO)
VALUES (15, 'MARCOS HENRIQUE', '2', 'GERENTE', 1985.75);

INSERT INTO cadfun (CODFUN, NOME, DEPTO, FUNCAO, SALARIO)
VALUES (7, 'APARECIDA SILVA', '3', 'SECRETARIA', 1200.50);

INSERT INTO cadfun (CODFUN, NOME, DEPTO, FUNCAO, SALARIO)
VALUES (12, 'CARLOS ALBERTO', '3', 'VENDEDOR', 1530.00);

INSERT INTO cadfun (CODFUN, NOME, DEPTO, FUNCAO, SALARIO)
VALUES (12, 'CARLOS ALBERTO', '3', 'VENDEDOR', 1530.00);

INSERT INTO cadfun (CODFUN, NOME, DEPTO, FUNCAO, SALARIO)
VALUES (12, 'CARLOS ALBERTO', '3', 'VENDEDOR', 1530.00);