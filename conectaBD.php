<?php
// Configurações do banco de dados
$endereco = 'localhost';
$banco = 'postgres';
$usuario = 'postgres';
$senha = 'postgres';

try {
    // Conexão com o banco de dados
    $pdo = new PDO(
        "pgsql:host=$endereco;port=5432;dbname=$banco",
        $usuario,
        $senha,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // Criação da tabela cliente
    $sql_cliente = "CREATE TABLE IF NOT EXISTS cliente (
        id SERIAL PRIMARY KEY,
        nome VARCHAR(255),
        telefone VARCHAR(255),
        endereco VARCHAR(255),
        email VARCHAR(255) UNIQUE,
        senha VARCHAR(255)
    )";
    $pdo->exec($sql_cliente);

    // Criação da tabela funcionarios
    $sql_funcionarios = "CREATE TABLE IF NOT EXISTS funcionarios (
        id SERIAL PRIMARY KEY,
        nome VARCHAR(255),
        telefone VARCHAR(255),
        cpf VARCHAR(14) UNIQUE,
        cargo VARCHAR(255),
        data_admissao DATE,
        email VARCHAR(255) UNIQUE,
        senha VARCHAR(255)
    )";
    $pdo->exec($sql_funcionarios);

    // Criação da tabela pedidos
    $sql_pedidos = "CREATE TABLE IF NOT EXISTS pedidos (
        id SERIAL PRIMARY KEY,
        id_cliente INT REFERENCES cliente(id),
        tipo_pizza VARCHAR(255) NOT NULL,
        telefone VARCHAR(255) NOT NULL,
        endereco VARCHAR(255) NOT NULL,
        data_pedido DATE DEFAULT CURRENT_DATE,
        valor_total NUMERIC(10, 2) NOT NULL
    )";
    $pdo->exec($sql_pedidos);

    echo "Tabelas criadas com sucesso!";
} catch (PDOException $e) {
    echo "Falha ao conectar ao banco de dados. <br/>";
    die($e->getMessage());
}
?>
