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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pizzaria Receba</title>
  <link rel="stylesheet" href="/Css/cadastro.css">
</head>
<body>
  <header>
    <a href=""><img src="/Assets/RECEBA.png" alt="Logo"></a>
    <div class="link">
      <a href=""><p>Pizzas</p></a>
      <a href=""><p>Contato</p></a>
      <a href=""><p>Sobre</p></a>
    </div>
    <div class="user">
      <a href=""><input type="button" value="Cadastrar"></a>
      <a href=""><input type="button" value="Entrar"></a>
    </div>
  </header>
  <section>

  <h1>Cadastro</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Nome: <input type="text" name="nome"><br><br>
    Telefone: <input type="text" name="telefone"><br><br>
    Endereço: <input type="text" name="endereco"><br><br>
    Email: <input type="text" name="email"><br><br>
    Senha: <input type="password" name="senha"><br><br>
    <input type="submit" name="submit" value="Cadastrar">
</form>

  </section>


</body>
</html>
