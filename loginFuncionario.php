<?php
session_start(); // Iniciar a sessão

// Verificar se o funcionário já está logado
if(isset($_SESSION['funcionarios_id'])) {
    header("Location: indexFuncionario.php"); // Redirecionar para a página do funcionário se estiver logado
    exit;
}

require_once 'conectaBD.php'; // Arquivo de conexão com o banco de dados

// Verificar se os dados de login foram submetidos via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consultar o banco de dados para encontrar o funcionário com o email e senha fornecidos
    $sql_funcionarios = "SELECT * FROM funcionarios WHERE email = :email AND senha = :senha";
    $stmt = $pdo->prepare($sql_funcionarios);
    $stmt->execute(['email' => $email, 'senha' => $senha]); // Não criptografei a senha para manter a consistência com o banco de dados, mas é recomendável criptografar

    $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Se encontrou o funcionário, redirecionar para a página do funcionário e armazenar informações da sessão
    if ($funcionario) {
        $_SESSION['funcionarios_id'] = $funcionario['id'];
        $_SESSION['funcionarios_nome'] = $funcionario['nome'];
        header("Location: pagina_do_funcionario.php");
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
    <title>Login Funcionário</title>
</head>
<body>
    <h2>Login Funcionário</h2>
    <?php if(isset($erro)) { ?>
        <p><?php echo $erro; ?></p>
    <?php } ?>
    <form method="post" action="">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>
        <input type="submit" value="Login">
        <a href="login.php">Cliente</a>
    </form>
</body>
</html>
