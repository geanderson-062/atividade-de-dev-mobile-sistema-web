<?php 
    // session_start();
    // include('../verifica_login.php');

    //incluindo a conexao
    include('../conexao.php');

    //pegando os dados das tabelas e transformando em vareaveis
    $sql = "SELECT * FROM `administrador`";
    $dados= mysqli_query($conexao,$sql);
    
 ?>

<html lang="pt-br"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
    <link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="../assets/img/favicon/apple-icon-57x57.png">
   <link rel="apple-touch-icon" sizes="60x60" href="../assets/img/favicon/apple-icon-60x60.png">
   <link rel="apple-touch-icon" sizes="72x72" href="../assets/img/favicon/apple-icon-72x72.png">
   <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/favicon/apple-icon-76x76.png">
   <link rel="apple-touch-icon" sizes="114x114" href="../assets/img/favicon/apple-icon-114x114.png">
   <link rel="apple-touch-icon" sizes="120x120" href="../assets/img/favicon/apple-icon-120x120.png">
   <link rel="apple-touch-icon" sizes="144x144" href="../assets/img/favicon/apple-icon-144x144.png">
   <link rel="apple-touch-icon" sizes="152x152" href="../assets/img/favicon/apple-icon-152x152.png">
   <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicon/apple-icon-180x180.png">
   <link rel="icon" type="image/png" sizes="192x192"  href="../assets/img/favicon/android-icon-192x192.png">
   <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon/favicon-32x32.png">
   <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon/favicon-96x96.png">
   <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon/favicon-16x16.png">
   <link rel="manifest" href="../assets/img/favicon/manifest.json">
   <meta name="msapplication-TileColor" content="#00a000">
   <meta name="msapplication-TileImage" content="../assets/img/favicon/ms-icon-144x144.png">
   <meta name="theme-color" content="#00a000">
   <!--favicon-->

    <title>Dashboard</title>
    
</head>

<body style="background-color: #00a000">

  <!--navbar inicio-->

  <nav class="navbar navbar-expand-lg navbar-light corPrimaria">
    <div class="container-fluid">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-2 text-light" href="#">
        <img src="assets/img/imgHome.png" alt="" width="50" height="50">
        Cadastrapet
      </a>
    </div>
  </nav>

  <!--navbar fim-->



    <!--menu da dashboard-->

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
       
        <div class="btn-toolbar mb-2 mb-md-0">
     
          <p class="text-white">_</p>
          
          <a href="tela_de_cadastro.html" type="button" class="btn btn-dark">
              Cadastrar pet
          </a>

        </div>
      </div>

      <!--fim menuda dasbord-->
     
        <div>
          <br>
          <br>
          <br>
          <br>
        </div>

      <!--seção dos administradores-->

      <h2 id="adm">Administradores cadastrados</h2> <!--titulo da tabela-->

      <div>
        <br>
        <br>
      </div>

      <div class="table-responsive">

          <!--tabela inicio-->

        <table class="table table-sm"> <!--deixar ela listrada table-striped-->
         
        <thead>
            <tr>
              
              <th scope="col"><p class="fs-5">Nome</p></th>
              <th scope="col"><p class="fs-5">Cpf</p></th>
              <th scope="col"><p class="fs-5">Telefone</p></th>
              <th scope="col"><p class="fs-5">Senha</p></th>
              <th scope="col"><p class="fs-5">Função</p></th>
              <th scope="col"><p class="fs-5">Opções</p></th>

            </tr>
          </thead>

          <tbody>
                  
          <?php

//recebendo varevel dados 
while ($linha= mysqli_fetch_assoc ( $dados)) {
   
   //pegando os dados da vareavel dados e colocando em novas vareaveis e colocando na tabela

   $idADM = $linha ['idADM'];
   $nomeADM= $linha ['nomeADM'];
   $cpfADM= $linha ['cpfADM'];
   $telefoneADM= $linha ['telefoneADM'];
   $senhaADM= $linha ['senhaADM'];
   $tipoADM= $linha ['tipoADM'];


    echo "<tr>
    <th scope='row'>$nomeADM</th>
    <td>$cpfADM</td>
    <td>$telefoneADM</td>
    <td>$senhaADM</td>
    <td>$tipoADM</td>
    <td>
    <a href='adit_adm.php? idADM=$idADM' class='btn btn-success'> Editar </a>
    <a href='#' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#confirmar'
    onClick= " . '"' . "pegar_dados( $idADM , '$nomeADM')" . '"'. ">Excluir</a>
    
  </tr>";
}

?>
         
          </tbody>

        </table>

        <!--fim da tabela dos adm-->
<!-- Modal-->
<div class="modal fade" id="confirmar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="excluirADM.php" method="POST">
       <p> Realmente deseja EXCLUIR <b ID="nomeADM_pessoa">Nome da pessoa</b>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <input type="hidden" name="idADM" ID="cod_pessoa" value="">
        <input type="hidden" name="nomeADM" ID="cod_pessoa1" value="">
        <input type="submit" class="btn btn-danger" value="Confirmar">
        <script type="text/Javascript">

function pegar_dados(idADM, nomeADM){


    document.getElementById("nomeADM_pessoa").innerHTML = nomeADM; 
    document.getElementById("cod_pessoa1").value = nomeADM; 
    document.getElementById("cod_pessoa").value = idADM;

}

</script>
        </form>
      </div>


<footer class="py-3 my-4 corPrimaria">
 
  <p class="text-center text-white">© 2022 Cadastrapet Company, Inc</p>
  <p class="text-center text-white">Sistema web desenvolvido por Geanderson Ferreira & Viviane Raquel</p>

</footer>
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body></html>