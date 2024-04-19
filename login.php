<?php
session_start(); // Iniciar a sessão

// Verificar se o usuário já está logado
if(isset($_SESSION['cliente_id'])) {
    header("Location: indexLogado.php"); // Redirecionar para a página do painel se estiver logado
    exit;
}

require_once 'conectaBD.php'; // Arquivo de conexão com o banco de dados

// Verificar se os dados de login foram submetidos via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consultar o banco de dados para encontrar o usuário com o email e senha fornecidos
    $sql = "SELECT * FROM cliente WHERE email = :email AND senha = :senha";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email, 'senha' => md5($senha)]); // Usando md5 para criptografar a senha (não é a melhor prática)

    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    // Se encontrou o usuário, redirecionar para o painel e armazenar informações da sessão
    if ($cliente) {
        $_SESSION['cliente_id'] = $cliente['id'];
        $_SESSION['cliente_nome'] = $cliente['nome'];
        header("Location: indexLogado.php");
        exit;
    } else {
        $erro = "Credenciais inválidas. Por favor, tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if(isset($erro)) { ?>
        <p><?php echo $erro; ?></p>
    <?php } ?>
    <form method="post" action="">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>
        <input type="submit" value="Login">
        <a href="loginFuncionario.php">Funcionario</a>
    </form>
</body>
</html>
