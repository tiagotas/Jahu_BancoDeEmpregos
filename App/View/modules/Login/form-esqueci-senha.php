<!doctype html>
<html lang="pt-br">

<head> 

  <title>Banco de Empregos de Jahu - Esqueci a Senha</title>
  <?php include VIEWS . '../includes/config_css.php' ?>
  
</head>

<body class="bg-cinza-escuro">


<?php include VIEWS . '../includes/header.php' ?>


  <main class="container">
    <div class="row p-1 ">
      <div class="col-sm-3 rounded shadow p-3 m-3 text-center text-white-black-shadow bg-cinza-bem-escuro">
        
         <div class="pt-3 h5 text-green-black-shadow">CADASTRAR CURRÍCULO?</div>
          <a href="/pessoa/fisica/cadastro" class="btn btn-success mt-3 mb-3">CADASTRO PESSOA FÍSICA</a>

          <div class="pt-3 h5 text-green-black-shadow">TEM EMPRESA?</div>
          <a href="/pessoa/juridica/cadastro" class="btn btn-success mt-3 mb-3">CADASTRO DE EMPRESAS</a>

          <div class="pt-3 h5 text-green-black-shadow">LEMBROU A SENHA?</div>
          <a href="/pessoa/login" class="btn btn-success mt-3 mb-3">FAZER LOGIN</a>        
      </div>


      <div class="col-sm bg-light shadow rounded p-3 mt-3 mb-3">
        <h3 class="pb-3">
          ESQUECI MINHA SENHA <br />
          <small class="text-muted">Informe seu e-mail, se tivermos seu cadastro enviaremos uma nova senha.</small>
        </h3>

        <?php if (isset($model) && $model->hasValidationErrors()) : ?>
          <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Desculpe! O correu um erro ao enviar uma nova senha:</h4>
            <hr>
            <ul>
              <?php foreach ($model->getValidationErrors() as $error) : ?>
                <li><?= $error['message'] ?></li>
              <?php endforeach ?>
              <ul>
          </div>
        <?php endif ?>

        <?php if (isset($_POST['email']) && !$model->hasValidationErrors()) : ?>
          <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Nova Senha Enviada!</h4>
            <p>Acesse seu e-mail e obtenha a nova senha.</p>
          </div>
        <?php endif ?>



        <div class="row justify-content-around">




          <div class="col-sm text-center ">
            <fieldset class="border p-3 rounded">

              <legend class="w-auto rounded border h6 p-1 text-center bg-light ">
                <strong>SEU E-MAIL DE CADASTRO</strong>
              </legend>          

              <form method="post" action="/pessoa/recuperar-senha">

                <input id="email" name="email" type="email" autofocus value="<?= $model->email ?>" placeholder="Informe o e-mail:" class="form-control" autocomplete="off">

                <div class="mt-3">
                  <div class="g-recaptcha" data-sitekey="<?= $_ENV['google_config']['recaptcha_key'] ?>"></div>
                </div>

                <div class="form-row p-3 align-items-center justify-content-center ">
                  <button type="submit" class="btn btn-lg  btn-success text-white-black-shadow">ENVIAR NOVA SENHA</button>
                </div>

              </form>
            </fieldset>


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