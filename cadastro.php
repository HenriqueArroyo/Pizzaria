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
  <form method="post" action="processa_usuario.php">
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
