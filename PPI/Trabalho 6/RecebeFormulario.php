<?php
  // Verifica se o formulário foi enviado
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    // Gera a página dinâmica apresentando os dados em uma grade do Bootstrap
    echo '<div class="container">';
    echo '  <div class="row">';
    echo '    <div class="col-sm-2 font-weight-bold">CEP</div>';
    echo '    <div class="col-sm-10">' . $cep . '</div>';
    echo '  </div>';
    echo '  <div class="row">';
    echo '    <div class="col-sm-2 font-weight-bold">Logradouro</div>';
    echo '    <div class="col-sm-10">' . $logradouro . '</div>';
    echo '  </div>';
    echo '  <div class="row">';
    echo '    <div class="col-sm-2 font-weight-bold">Bairro</div>';
    echo '    <div class="col-sm-10">' . $bairro . '</div>';
    echo '  </div>';
    echo '  <div class="row">';
    echo '    <div class="col-sm-2 font-weight-bold">Cidade</div>';
    echo '    <div class="col-sm-4">' . $cidade . '</div>';
    echo '    <div class="col-sm-2 font-weight-bold">Estado</div>';
    echo '    <div class="col-sm-4">' . $estado . '</div>';
    echo '  </div>';
    echo '</div>';
  }
?>
