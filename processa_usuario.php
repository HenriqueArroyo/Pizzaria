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

// Função para limpar os dados enviados pelo formulário
function limpar_dados($dados) {
    $conexao = conectaBD();
    $dados = trim($dados);
    $dados = mysqli_real_escape_string($conexao, $dados);
    mysqli_close($conexao);
    return $dados;
}

// Processamento do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexao = conectaBD();

    $nome = limpar_dados($_POST["nome"]);
    $telefone = limpar_dados($_POST["telefone"]);
    $endereco = limpar_dados($_POST["endereco"]);
    $email = limpar_dados($_POST["email"]);
    $senha = limpar_dados($_POST["senha"]);

    // Atualiza os dados na tabela Cliente
    $sql = "INSERT INTO Cliente (nome_cliente, telefone_cliente, endereco_cliente, email_cliente, senha_cliente) VALUES ('$nome', '$telefone', '$endereco', '$email', '$senha')";
    if (mysqli_query($conexao, $sql)) {
        echo "Cliente cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o cliente: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
}
?>
