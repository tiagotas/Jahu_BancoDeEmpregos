

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 

  <title>Banco de Empregos de Jahu - Cadastro Currículo</title>
  <?php include VIEWS . '../includes/config_css.php' ?>

</head>

<body class="bg-cinza-escuro">


<?php include VIEWS . '../includes/header.php' ?>


  <main class="container">
    <div class="row p-1">

      <div class="col-sm-3 p-3 m-3 rounded shadow text-center text-white-black-shadow bg-cinza-bem-escuro">
        <div>
          <h1 class="h5 pt-3 text-green-black-shadow text-center">POR QUE ME CADASTRAR?</h1>


          <p class="text-center">
            Inserindo seu currículo em nosso
            sistema buscaremos seu cadastro mais facilmente,
            além de não haver necessidade entregar pessoalmente.
          </p>
        </div>
      </div>



      <div class="col-sm bg-light shadow rounded p-3 mt-3 mb-3">

        <h3>
          Seu Currículo <br />
          <small class="text-muted"> Aqui você pode enviar seu currículo e nos falar um pouco sobre você.</small>
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


        <?php if (isset($_POST['nome']) && !$model->hasValidationErrors()) : ?>
          <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Currículo Enviado</h4>
            <p>Obrigado por nos enviar seu currículo.</p>
          </div>
        <?php endif ?>

        <form action="/trabalhe-conosco/salvar" method="post" enctype="multipart/form-data">

          <fieldset class="border rounded mt-3 p-3 bg-white shadow">
            <legend class="w-auto rounded border h6 p-1 text-center bg-light ">
              <strong>DADOS PESSOAIS</strong>
            </legend>

            <div class="form-row">
              <div class="form-group col-md-5">
                <label for="nome"><span class="text-danger">*</span> Nome: </label>
                <input id="nome" name="nome" value="<?= $model->nome ?>" requirede class="form-control">
              </div>

              <div class="form-group col-md-4">
                <label for="email">E-mail:</label>
                <input id="email" name="email" type="email" value="<?= $model->email ?>" class="form-control">
              </div>

              <div class="form-group col-md-3">
                <label for="area_pretendida"><span class="text-danger">*</span> Área Pretendida:</label>
                <select id="area_pretendida" name="area_pretendida" class="form-control" requirede>
                  <option value="">Selecione...</option>
                  <option value="Administrativo" <?= '' // TrabalheConoscoController::setAreaPretendidaSelected('Administrativo', $model->area_pretendida) ?>>Administrativo</option>
                  <option value="Comercial" <?= '' //TrabalheConoscoController::setAreaPretendidaSelected('Comercial', $model->area_pretendida) ?>>Comercial</option>
                  <option value="Engenharia" <?= '' //TrabalheConoscoController::setAreaPretendidaSelected('Engenharia', $model->area_pretendida) ?>>Engenharia</option>
                  <option value="Limpeza" <?= '' //TrabalheConoscoController::setAreaPretendidaSelected('Limpeza', $model->area_pretendida) ?>>Limpeza</option>
                  <option value="Produção" <?= '' //TrabalheConoscoController::setAreaPretendidaSelected('Produção', $model->area_pretendida) ?>>Produção</option>
                </select>
              </div>



              <div class="form-group col-md-3">
                <label for="data_nascimento"><span class="text-danger">*</span> Data de Nascimento:</label>
                <input id="data_nascimento" name="data_nascimento" requirede type="text" value="<?= $model->data_nascimento ?>" class="form-control mask-date">
              </div>

              <div class="form-group col-md-3">
                <label for="cpf"><span class="text-danger">*</span> CPF:</label>
                <input id="cpf" name="cpf" requirede value="<?= $model->cpf ?>" class="form-control mask-cpf">
              </div>

              <div class="form-group col-md-3">
                <label for="telefone_fixo">Telefone Fixo:</label>
                <input id="telefone_fixo" name="telefone_fixo" value="<?= $model->telefone_fixo ?>" class="form-control mask-telefone">
              </div>

              <div class="form-group col-md-3">
                <label for="telefone_celular"><span class="text-danger">*</span> Telefone Celular:</label>
                <input id="telefone_celular" name="telefone_celular" requirede value="<?= $model->telefone_celular ?>" class="form-control mask-telefone">
                <small id="telefone_celularHelp" class="form-text text-muted">
                <input type="checkbox" name="telefone_celular_whatsapp" id="telefone_celular_whatsapp" value="true" <?= '' //TrabalheConoscoController::setTelefoneWhatsappCheck($model->telefone_celular_whatsapp) ?> />
                  <label for="telefone_celular_whatsapp">Este telefone é Whatsapp</label>
              </small>
              </div>

              <div class="form-group col-md-6">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" name="endereco" id="endereco" value="<?= $model->endereco ?>" />
              </div>

              <div class="form-group col-md-3">
                <label for="estado">Estado:</label>
                <?php //new Metoda\BrazilianStates($model->estado, 'form-control'); ?>
              </div>

              <div class="form-group col-md-3">
                <label for="cidade"><span class="text-danger">*</span> Cidade:</label>
                <?php //new Metoda\BrazilianCities($model->cidades, $model->id_cidade, 'form-control') ?>
              </div>
            </div>
          </fieldset>

          <fieldset class="border rounded mt-3 p-3 bg-white shadow">
            <legend class="w-auto rounded border h6 p-1 text-center bg-light ">
              <strong>EXPERIÊNCIA PROFISSIONAL</strong>
            </legend>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="ultimo_emprego"><span class="text-danger">*</span> Último Emprego</label>
                <textarea name="ultimo_emprego" id="ultimo_emprego" requirede class="form-control" rows="5" placeholder="Nos conte suas atribuições no seu último emprego."><?= $model->ultimo_emprego ?></textarea>
              </div>

              <div class="form-group col-md-6">
                <label for="penultimo_emprego">Penúltimo Emprego</label>
                <textarea name="penultimo_emprego" id="penultimo_emprego" class="form-control" rows="5" placeholder="Nos conte suas atribuições no seu penúltimo emprego."><?= $model->penultimo_emprego ?></textarea>
              </div>
            </div>
          </fieldset>

          <fieldset class="border rounded mt-3 p-3 bg-white shadow">
            <legend class="w-auto rounded border h6 p-1 text-center bg-light ">
              <strong>FOTO E CURRÍCULO EM ARQUIVO</strong>
            </legend>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="foto">Foto</label>
                <input id="foto" name="curriculo_foto[]" type="file" class="form-control-file" accept="image/gif,image/png,image/jpeg" aria-describedby="fotoHelpBlock">
                <small id="fotoHelpBlock" class="form-text text-muted">
                  Dê preferência para fotos 3x4. Enviar a foto é opcional.
                </small>
              </div>

              <div class="form-group col-md-6">
                <label for="arquivo">Currículo em Arquivo</label>
                <input id="arquivo" name="curriculo_arquivo[]" type="file" class="form-control-file" accept="application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document" aria-describedby="arquivoHelpBlock">
                <small id="arquivoHelpBlock" class="form-text text-muted">
                  Somente arquivos PDF ou do Microsoft Word, envio opcional.
                </small>
              </div>
            </div>
          </fieldset>

          

          <fieldset class="border rounded mt-3 p-3 bg-white shadow">
            <legend class="w-auto rounded border h6 p-1 text-center bg-light ">
              <strong>OBSERVAÇÕES</strong>
            </legend>

            <div class="form-row">
              <textarea name="observacoes" id="observacoes" class="form-control" rows="5" placeholder="Caso necessário, deixe aqui observações que sejam úteis."><?= $model->observacoes ?></textarea>
            </div>
          </fieldset>







          









          <p class="pt-3">
            <input type="checkbox" name="accept_private_policy" id="accept_private_policy" value="true" <?= '' // TrabalheConoscoController::setPrivacyPolicyCheck($model->accept_private_policy) ?> />

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


          <div class="form-row p-3 align-items-center justify-content-center ">
            <button type="submit" class="btn btn-lg btn-success text-white-black-shadow">ENVIAR</button>
          </div>
        </form>
      </div>



    </div>
  </main>

  <?php include VIEWS . '../includes/footer.php' ?>
  <?php include VIEWS . '../includes/config_js.php' ?>
  <script type="text/javascript" src="/App/View/Site/js/jquery.maskedinput.js"></script>
  <script type="text/javascript" src="/App/View/Site/js/jquery.maskedinput.init.js"></script>
  <script type="text/javascript" src="/App/View/Site/js/jquery.tas.curriculo.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>

</html>