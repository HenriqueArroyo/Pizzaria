<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Lista de Pedidos</h2>

<?php
require_once 'conectaBD.php';

try {
    // SQL para selecionar todos os pedidos
    $sql = "SELECT * FROM pedidos";
    $stmt = $pdo->query($sql);

    // Se existem pedidos
    if ($stmt->rowCount() > 0) {
        echo "<table>";
        echo "<tr><th>Tipo de Pizza</th><th>Nome</th><th>Telefone</th><th>Endereço</th><th>Email</th><th>Data do Pedido</th></tr>";

        // Loop através dos resultados e exibir cada pedido em uma linha da tabela
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['tipo_pizza']."</td>";
            echo "<td>".$row['nome']."</td>";
            echo "<td>".$row['telefone']."</td>";
            echo "<td>".$row['endereco']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['data_pedido']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum pedido encontrado.";
    }
} catch (PDOException $e) {
    echo "Erro ao recuperar pedidos: " . $e->getMessage();
}
?>

</body>
</html>
