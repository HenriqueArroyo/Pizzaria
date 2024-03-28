<?php
// Função para conexão com o banco de dados
function conectaBD() {
    $host = "localhost"; // Endereço do servidor MySQL
    $usuario = "postgres"; // Nome de usuário do MySQL
    $senha = "postgres"; // Senha do MySQL
    $banco = "postgres"; // Nome do banco de dados

    // Conexão com o banco de dados
    $conexao = mysqli_connect($host, $usuario, $senha, $banco);

    // Verifica se a conexão foi bem sucedida
    if (!$conexao) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }

    return $conexao; // Retorna o identificador de conexão
}
?>
