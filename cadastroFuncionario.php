<?php
session_start();

require_once 'conectaBD.php';

if(isset($_SESSION['funcionario_id'])) {
    header("Location: painelFuncionario.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM funcionarios WHERE email = :email AND senha = :senha";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email, 'senha' => md5($senha)]);

    $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($funcionario) {
        $_SESSION['funcionario_id'] = $funcionario['id'];
        $_SESSION['funcionario_nome'] = $funcionario['nome'];
        header("Location: painelFuncionario.php");
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
    </form>
</body>
</html>
