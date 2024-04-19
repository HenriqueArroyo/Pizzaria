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

    // Verificar se os dados foram enviados via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Dados do formulário
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $cargo = $_POST['cargo'];
        $dataAdmissao = $_POST['dataAdmissao'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Preparar a SQL para inserir o funcionário na tabela
        $sql = "INSERT INTO funcionarios (nome, telefone, cpf, cargo, data_admissao, email, senha) VALUES (:nome, :telefone, :cpf, :cargo, :dataAdmissao, :email, :senha)";
        $stmt = $pdo->prepare($sql);

        // Bind dos parâmetros
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':cargo', $cargo);
        $stmt->bindParam(':dataAdmissao', $dataAdmissao);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);

        // Executar a SQL
        $stmt->execute();

        // Redirecionar de volta para a página de cadastro com uma mensagem de sucesso
        header("Location: cadastroFuncionario.php?msg=Cadastro realizado com sucesso!");
        exit;
    }
} catch (PDOException $e) {
    echo "Falha ao conectar ao banco de dados. <br/>";
    die($e->getMessage());
}
?>
