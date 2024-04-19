<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Pedidos</title>
</head>
<body>
    <h2>Escolha seu Pedido</h2>
    <form method="post" action="processar_pedido.php">
        <label for="tipo_pizza">Escolha o tipo de pizza:</label><br>
        <select id="tipo_pizza" name="tipo_pizza" required>
            <option value="Mussarela">Mussarela</option>
            <option value="Calabresa">Calabresa</option>
            <option value="Margherita">Margherita</option>
            <option value="Quatro Queijos">Quatro Queijos</option>
        </select><br><br>
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>
        <label for="telefone">Telefone:</label><br>
        <input type="text" id="telefone" name="telefone" required><br><br>
        <label for="endereco">Endereço:</label><br>
        <input type="text" id="endereco" name="endereco" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Fazer Pedido">
    </form>
</body>
</html>
