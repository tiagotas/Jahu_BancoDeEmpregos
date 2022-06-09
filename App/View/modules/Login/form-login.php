<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Banco de Empregos de Jahu - Login</title>
  <?php include VIEWS . '../includes/config_css.php' ?>


</head>

<body class="bg-cinza-escuro">


  <?php include VIEWS . '../includes/header.php' ?>


  <main class="container">
    <div class="row p-1 ">

      <div class="col-sm-3 p-3 m-3 rounded shadow text-center text-white-black-shadow bg-cinza-bem-escuro">

        <h3 class="h5  text-green-black-shadow">BANCO DE EMPREGOS</h3>
        <div class="pt-2">...</div>

        <h3 class="h5 pt-5  text-green-black-shadow">COMO FUNCIONA?</h3>
        <div class="pt-2">
         ...
        </div>

        <h3 class="h5 pt-5  text-green-black-shadow">SEU CURRÍCULO</h3>
        <div class="pt-2">
         ...
        </div>

      </div>


      <div class="col-sm bg-light shadow rounded mt-3 mb-3 p-3">
        <h2 class="h2 pb-3">
          SEU CADASTRO<br />
          <small class="text-muted">É <strong>rápido</strong>, é <strong>fácil</strong>, é sem complicação.</small>
        </h2>

        <?php if (isset($model) && $model->hasValidationErrors()) : ?>
          <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Desculpe! Não conseguimos acessar seu cadastro.</h4>
            <p>Corrija os erros abaixo para que possamos continuar:</p>
            <hr>
            <ul>
              <?php foreach ($model->getValidationErrors() as $error) : ?>
                <li><?= $error['message'] ?></li>
              <?php endforeach ?>
              <ul>
          </div>
        <?php endif ?>



        <div class="row justify-content-around">

          <div class="col-sm  text-center align-self-center">

            <fieldset class="border pb-5 rounded">
              <legend class="w-auto rounded border h6 p-1 text-center bg-light ">
                <strong>AINDA NÃO TEM CADASTRO?</strong>
              </legend>

              <a class="btn btn-lg btn-success text-white-black-shadow mb-5 mt-5" href="/pessoa/fisica/cadastro">CADASTRAR MEU CURRÍCULO</a>
              <a class="btn btn-lg btn-success text-white-black-shadow" href="/pessoa/juridica/cadastro">CADASTRAR MINHA EMPRESA</a>

            </fieldset>
          </div>


          <div class="col-sm text-center ">
            <fieldset class="border mt-3 pl-3 pr-3 pb-3 rounded">
              <legend class="w-auto rounded border h6 p-1 text-center bg-light ">
                <strong>JÁ POSSUO CADASTRO</strong>
              </legend>

              <form method="post" action="/orcamento/auth">

                <div class="form-row">
                  <div class="form-group col">
                    <label for="email">E-mail:</label>
                    <input id="email" name="email" type="email" value="<?= $model->email ?>" class="form-control" autocomplete="off">
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col">
                    <label for="senha">Senha:</label>
                    <input id="senha" name="senha" type="password" class="form-control">
                  </div>
                </div>


                <div class="g-recaptcha" data-sitekey="<?= $_ENV['google_config']['recaptcha_key'] ?>"></div>

                <div class="form-row pt-3 pb-3 align-items-center justify-content-center ">
                  <button type="submit" class="btn btn-lg alert-glow  btn-success text-white-black-shadow">ENTRAR</button>
                </div>

                <a class="btn btn-sm btn-secondary" href="/pessoa/recuperar-senha">ESQUECI A SENHA</a>
              </form>
            </fieldset>


          </div>
        </div>

        <div class="row  ">
          <div class="col pt-5 text-center text-green-black-shadow">
            <!-- <h1 class="h4">LINHAS DISPONÍVEIS</h1> -->
          </div>

        </div>


        


      </div>
    </div>
    </div>
  </main>

  <?php include VIEWS . '../includes/footer.php' ?>
  <?php include VIEWS . '../includes/config_js.php' ?>
  <script src='https://www.google.com/recaptcha/api.js'></script>

</html>