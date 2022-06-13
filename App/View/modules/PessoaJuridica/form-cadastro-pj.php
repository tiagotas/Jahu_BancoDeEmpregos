<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Banco de Empregos de Jahu - Cadastro Empresa</title>
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
          Cadastro de Empresa<br />
          <small class="text-muted"> Este cadastro permitirá cadastrar todas as vagas buscar currículos.</small>
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

            <div class="form-group col-md-6">
              <label for="razao_social"><span class="text-danger">*</span> Razão Social: </label>
              <input name="razao_social" id="razao_social" value="<?= $model->razao_social ?>" requirede autofocuss class="form-control">
            </div>

            <div class="form-group col-md-6">
              <label for="nome_fantasia"><span class="text-danger">*</span> Nome Fantasia: </label>
              <input name="nome_fantasia" id="nome_fantasia" value="<?= $model->nome_fantasia ?>" requirede class="form-control">
            </div>



            <div class="form-group col-md-4">
              <label for="email"><span class="text-danger">*</span> E-mail:</label>
              <input id="email" name="email" type="email" value="<?= $model->email ?>" class="form-control">
            </div>



            <div class="form-group col-md-4">
              <label for="cnpj"><span class="text-danger">*</span> CNPJ:</label>
              <input id="cnpj" name="cnpj" requirede value="<?= $model->cnpj ?>" class="form-control mask-cnpj">
            </div>



            <div class="form-group col-md-4">
              <label for="telefone_fixo">Telefone Fixo:</label>
              <input id="telefone_fixo" name="telefone_fixo" value="<?= $model->telefone_fixo ?>" class="form-control mask-telefone-fixo">
              <small id="telefone_fixoHelp" class="form-text text-muted">
                <input type="checkbox" name="fixo_whatsapp" id="fixo_whatsapp" value="true" <?= ''// CadastroController::setTelefoneWhatsappCheck($model->fixo_whatsapp) ?> />
                <label for="fixo_whatsapp">Este fixo é Whatsapp</label>
              </small>
            </div>

            <div class="form-group col-md-4">
              <label for="nome_contato"><span class="text-danger">*</span> Nome para Contato: </label>
              <input name="nome_contato" id="nome_contato" value="<?= $model->nome_contato ?>" requirede class="form-control">
            </div>
          </div>

          <fieldset class="border rounded p-3 bg-white shadow">            
            <legend class="w-auto rounded border h6 p-1 text-center bg-light ">
              <strong>DADOS DE ENDEREÇO</strong>
            </legend>
            <div class="form-row">

            <div class="form-group col-md-9">
              <label for="endereco"><span class="text-danger">*</span> Endereço:</label>
              <input type="text" class="form-control" name="endereco" id="endereco" maxlength="150" value="<?= $model->endereco ?>" placeholder="Ex: Rua José Carlone, 341" />
            </div>

            <div class="form-group col-md-3">
              <label for="cep"><span class="text-danger">*</span> CEP:</label>
              <input type="text" class="form-control mask-cep" name="cep" id="cep" value="<?= $model->cep ?>" />
              <small id="telefone_celularHelp" class="form-text text-muted">
                <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/default.cfm" title="Consulte seu CEP aqui." target="_blank">Não sei meu CEP</a>
              </small>
            </div>

            <div class="form-group col-md-4">
              <label for="bairro"><span class="text-danger">*</span> Bairro:</label>
              <input type="text" class="form-control" name="bairro" id="bairro" maxlength="150" value="<?= $model->bairro ?>" />
            </div>



            <div class="form-group col-md-4">
              <label for="estado"><span class="text-danger">*</span> Estado:</label>
              <?php //new Metoda\BrazilianStates($model->estado, 'form-control'); ?>
            </div>

            <div class="form-group col-md-4">
              <label for="id_cidade"><span class="text-danger">*</span> Cidade:</label>
              <?php //new Metoda\BrazilianCities($model->cidades, $model->id_cidade, 'form-control') ?>
            </div>
          </div>
          </fieldset>

          

          <fieldset class="border rounded p-3 bg-white shadow">            
            <legend class="w-auto rounded border h6 p-1 text-center bg-light ">
              <strong>DADOS DE ACESSO</strong>
            </legend>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" name="senha" id="senha" />
              </div>
              <div class="form-group col-md-6">
                <label for="senha_confirmacao">Confirme a Senha:</label>
                <input type="password" class="form-control" name="senha_confirmacao" id="senha_confirmacao" placeholder="Redigite a senha aqui para garantir" />
              </div>
            </div>
          </fieldset>

          <p class="pt-3">
            <input type="checkbox" name="accept_private_policy" id="accept_private_policy" value="true" <?= '' //CadastroController::setPrivacyPolicyCheck($model->accept_private_policy) ?> />

            <label for="accept_private_policy" class="d-inline">
              <span class="text-danger">*</span>
              Concordo com a <a href="/politica-privacidade" target="_blank" title="">
                Política de Privacidade e de Cookies</a>
            </label>
          </p>

          <div class="g-recaptcha" data-sitekey="<?= $_ENV['google_config']['recaptcha_key'] ?>"></div>

          <p class="pt-3">
            <span class="text-danger">*</span> São campos obrigatórios.
          </p>


          <div class="form-row p-3  align-items-center justify-content-center ">
            <button type="submit" class="btn btn-lg btn-success text-white-black-shadow">SALVAR E BUSCAR CURRÍCULOS</button>
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