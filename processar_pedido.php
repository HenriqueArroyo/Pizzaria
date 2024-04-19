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

    // Criar a tabela pedidos se ainda não existir
    $sql_create_table = "CREATE TABLE IF NOT EXISTS pedidos (
        id SERIAL PRIMARY KEY,
        tipo_pizza VARCHAR(255) NOT NULL,
        nome VARCHAR(255) NOT NULL,
        telefone VARCHAR(255) NOT NULL,
        endereco VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $stmt_create_table = $pdo->prepare($sql_create_table);
    $stmt_create_table->execute();

    // Verificar se os dados foram enviados via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Dados do formulário
        $tipo_pizza = $_POST['tipo_pizza'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $email = $_POST['email'];

        // Preparar a SQL para inserir o pedido na tabela
        $sql = "INSERT INTO pedidos (tipo_pizza, nome, telefone, endereco, email) VALUES (:tipo_pizza, :nome, :telefone, :endereco, :email)";
        $stmt = $pdo->prepare($sql);

        // Bind dos parâmetros
        $stmt->bindParam(':tipo_pizza', $tipo_pizza);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':email', $email);

        // Executar a SQL
        $stmt->execute();

        // Redirecionar de volta para a página de pedidos com uma mensagem de sucesso
        header("Location: pedido.php?msg=Pedido realizado com sucesso!");
        exit;
    } else {
        // Se os dados não foram enviados via POST, redirecionar de volta para a página de pedidos
        header("Location: pedido.php");
        exit;
    }
} catch (PDOException $e) {
    echo "Falha ao conectar ao banco de dados. <br/>";
    die($e->getMessage());
}
?>
