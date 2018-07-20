<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Starter Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="orange lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">Bleez</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="cadastro.php">Fazer cadastro</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
      <li><a href="index.php">Inicio</a></li>
      <li><a href="cadastro.php">Fazer cadastro</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">Produtos</h1>
    </div>
  </div>

  <div class="container">
    <div class="section">
      <?php
      require_once 'config.inc.php';
      require_once 'dp_conn.model.php';

      error_reporting(0);
      
      $SQL = "SELECT * from produtos";

      $result = $Conn->prepare($SQL);
      
      $result->execute();
      $dados = $result->fetchAll(PDO::FETCH_ASSOC);

      $produtos = array();
      $colunas = array();

      if($dados != NULL){
        foreach($dados[0] as $membro=>$valor){
            array_push($colunas, $membro);
        }
      }

      echo "<table border='1' class=\"bordered\">"; 

      echo "<tr>";
      foreach($colunas as $coluna) echo "<td>".$coluna."</td>";
      echo "<td>Ver Produto</td>";
      echo "</tr>"; 

      for($i = 0; $i < count($dados);$i = $i + 1){
        echo "<tr>";
        foreach($dados[$i] as $membro=>$dado) {
          echo "<td>".$dado."</td>"; 
          if($membro == "Nome") $nomeaux = $dado; 
        }
        echo "<td><button data-target=\"modal1\" name=\".$nomeaux.\"class=\"btn modal-trigger\">Ver Produto</button></td>";
        echo "</tr>"; 
      }  
      ?>
    </div>
  </div>
  </div>
    
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Aqui os dados do produto</h4>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Sair</a>
    </div>
  </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.modal');
      var instances = M.Modal.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function(){
      $('.modal').modal();
    });
  </script>

  </body>
</html>
