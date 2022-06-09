<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Banco de Empregos de Jahu - Cadastro de Vaga</title>
  <?php include VIEWS . '../includes/config_css.php' ?>
</head>

<body class="bg-cinza-escuro">


<?php include VIEWS . '../includes/header.php' ?>


  <main class="container">
    <div class="row p-1">

      <div class="col-sm-3 rounded shadow p-3 m-3 text-center text-white-black-shadow bg-cinza-bem-escuro">
        <div>
          <h1 class="h5 pt-3 text-green-black-shadow text-center">POR QUE ME CADASTRAR?</h1>

          <div class="pt-3">...</div>

          <div class="pt-3 h5 text-green-black-shadow">É PESSOA FÍSICA?</div>

          <a href="/pessoa/fisica/cadastro" class="btn btn-success mt-3 mb-3">CADASTRAR CURRÍCULO</a>

          <div class="pt-3 h5 text-green-black-shadow">JÁ TEM CADASTRO?</div>

          <a href="/pessoa/login" class="btn btn-success mt-3 mb-3">FAZER LOGIN</a>
        </div>
      </div>



      <div class=" col-sm bg-light shadow rounded p-3 mt-3 mb-3">

        <h3>
          Cadastro de Vaga de Emprego <br />
          <small class="text-muted"> Anuncie sua vaga e receba candidaturas</small>
        </h3>

        <?php if (isset($model) && $model->hasValidationErrors()) : ?>
          <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Atenção! Ocorreram erros de validação no formulário.</h4>
            <p>Corrija os erros abaixo para que possamos continuar:</p>
            <hr>
            <ul>
              <?php foreach ($model->getValidationErrors() as $error) : ?>
                <li><?= $error['message'] ?></li>
              <?php endforeach ?>
              <ul>
          </div>
        <?php endif ?>

        <form action="/cadastro/pessoa-juridica/save" method="post">

          <div class="form-row">

          <div class="form-group col-md-10">
              <label for="titulo"><span class="text-danger">*</span> Titulo: </label>
              <input name="titulo" id="titulo" value="<?= $model->razao_social ?>" requirede autofocuss class="form-control">
            </div>            

            <div class="form-group col-md-2">
              <label for="salario">Salário: </label>
              <input name="salario" id="salario" value="<?= $model->razao_social ?>" requirede autofocuss class="form-control">
            </div>

            <div class="form-group col-md-12">
              <label for="descricao"><span class="text-danger">*</span> Descrição: </label>
              <textarea name="descricao" id="descricao" requirede class="form-control" rows="5" placeholder="Detalhe mais sobre a vaga"><?= $model->ultimo_emprego ?></textarea>
            </div>
          </div>





            



            


           

          
          <div class="form-row">
          <p class="pt-3">
            <input type="checkbox" name="accept_private_policy" id="accept_private_policy" value="true" <?= '' //CadastroController::setPrivacyPolicyCheck($model->accept_private_policy) ?> />

            <label for="accept_private_policy" class="d-inline">
              <span class="text-danger">*</span>
              Concordo com a <a href="/politica-privacidade" target="_blank" title="">
                Política de Privacidade e de Cookies</a>
            </label>
          </p>
          </div>

          <div class="form-row">
            <div class="g-recaptcha" data-sitekey="<?= $_ENV['google_config']['recaptcha_key'] ?>"></div>
          </div>

          <p class="pt-3">
            <span class="text-danger">*</span> São campos obrigatórios.
          </p>


          <div class="form-row p-3  align-items-center justify-content-center ">
            <button type="submit" class="btn btn-lg btn-success text-white-black-shadow">CADASTRAR VAGA</button>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="cadastro-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Banco de Empregos</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Fim Modal -->


        </form>
      </div>



    </div>
  </main>

  <?php include VIEWS . '../includes/footer.php' ?>
  <?php include VIEWS . '../includes/config_js.php' ?>
  <script type="text/javascript" src="/App/View/Site/js/jquery.maskedinput.js"></script>
  <script type="text/javascript" src="/App/View/Site/js/jquery.maskedinput.init.js"></script>
  <script type="text/javascript" src="/App/View/Site/js/jquery.metoda.cadastro.orcamento.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>

</html>