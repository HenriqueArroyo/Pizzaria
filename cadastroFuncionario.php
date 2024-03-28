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
    <a href="index.php"><img src="/Assets/RECEBA.png" alt="Logo"></a>
    <div class="link">
      <a href="index.php"><p>Pizzas</p></a>
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
  <div class="container">
        <form action="processa_usuario.php" method="post">
            <div class="col-4">
                <label for="nome">Nome Completo</label><br>
                <input type="text" name="nome" id="nome" class="form-control">
            </div>

            <div class="col-4">
                <label for="telefone">Telefone para Contato</label><br>
                <input type="tel" name="telefone" id="telefone" class="form-control">
            </div>
            <div class="col-4">
                <label for="cpf">CPF</label><br>

                <input type="text" name="cpf" id="cpf" class="form-control">

            </div>
            <div class="col-4">
                <label for="cargo">Cargo</label><br>

                <input type="text" name="cargo" id="cargo" class="form-control">

            </div>

            <div class="col-4">
                <label for="dataAdmissao">Data de Admissão</label><br>

                <input type="date" name="dataAdmissao" id="dataAdmissao" class="form-control">

            </div>
            <div class="col-4">
                <label for="email">E-mail</label><br>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="col-4">
                <label for="senha">Senha</label><br>
                <input type="password" name="senha" id="senha" class="form-control">
            </div><br>

            <button type="submit" name="enviarDados" class="btn btn-primary">Cadastrar</button>

            <a href="index.php" class="btn btn-danger">Cancelar</a>
        </form>

  </section>


</body>
</html>
