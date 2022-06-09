<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Banco de Empregos de Jahu</title>

  <?php include VIEWS . '../includes/config_css.php' ?>
</head>

<body class="bg-cinza-escuro">

  <?php include VIEWS . '../includes/header.php' ?>

  <main>
    <div class="container mw-100">

      


      <div class="row h5 text-white-black-shadow bg-cinza-bem-escuro">
        <!-- <div class="col-sm text-center p-5">
          <p>Lista de <br /> Orçamentos</p>
          <a class="btn btn-success" href="cadastro" role="button">Ver Todos</a>
        </div> -->

        <div class="col-sm text-center p-5">
          <h2 class="h3 text-green-black-shadow">CURRÍCULO</h2>
          <p>Esteja visível <br /> para empresas</p>
          <a class="btn btn-success" href="/pessoa/fisica/cadastro" role="button" title="">CADASTRAR</a>
        </div>

        <div class="col-sm text-center p-5">
          <h2 class="h3 text-green-black-shadow">VAGAS DE EMPREGO</h2>
          <p>Vagas anunciadas <br /> em Jahu</p>
          <a class="btn btn-success" href="/vagas" role="button" title="">BUSCAR AGORA</a>
        </div>

        <div class="col-sm text-center p-5">
          <h2 class="h3 text-green-black-shadow">EMPRESAS</h2>
          <p>Busca de  <br /> Currículos</p>
          <a class="btn btn-success" href="/pessoa/juridica/cadastro" role="button" title="">BUSCAR</a>
        </div>

        <!-- <div class="col-sm text-center p-5">
          <p>Catálogo em <br /> PDF</p>
          <a class="btn btn-success" href="cadastro" role="button">Baixar</a>
        </div> -->
      </div>

      <div class="row">
        <div class="col bg-light shadow rounded  m-5 p-3 text-center">
          <h2 class="h3 text-green-black-shadow">Sobre o Projeto</h2>
          <p>
           Adicionar aqui um texto explicando sobre como funciona o banco de empregos.
          </p>
        </div>

      </div>
    </div>
  </main>

  <?php include VIEWS . '../includes/footer.php' ?>

  <?php include VIEWS . '../includes/config_js.php' ?>

</html>