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
  <nav class="light-blue lighten-1" role="navigation">
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
      <h1 class="header center blue-text">Cadastre de um produto</h1>
    </div>
  </div>

  <div class="container">
   <div class="section">
    <div class="row">
      <form class="col s12" action="" method="post">

        <div class="row">
          <div class="input-field col s12">
            <input placeholder="Insira o nome do produto" name="nomeProduto" type="text" class="validate">
            <label for="produto">Produto</label>
          </div>
        </div>
          
  <!--       <div class="row">
          <div class="input-field col s12">
            <p>Carregue a imagem do produto<p><input id="image" type="file" class="validate">
          </div>
        </div> -->
        
        <div class="row">
          <div class="input-field col s12">
            <input placeholder="Insira a descrição do produto" name="description" type="text" class="validate">
            <label for="description">Descrição</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s6">
            <input placeholder="Insira o preço do produto R$" name="price" type="number" class="validate" min="0">
            <label for="price">Preço Unitário</label>
          </div>

  <!--         <div class="input-field col s6">
            <input placeholder="Insira a Quantidade de produtos" id="qtd" type="number" class="validate" min="0">
            <label for="qtd">Quantidade</label>
          </div> -->
        </div>
        <input type="submit" class="btn btn-danger" value="Cadastrar Produto" name = "cadastrar">
      </form>
      </div>
    </div>
  </div>

  <?php

      require_once 'config.inc.php';
      require_once 'dp_conn.model.php';

      $SQL = "SELECT nome from produtos";

      $result = $Conn->prepare($SQL);
      
      $result->execute();
      $dados = $result->fetchAll(PDO::FETCH_ASSOC);


      $SQL = "SELECT COUNT(Codigo_produto) FROM produtos";
      
      $result = $Conn->prepare($SQL);
      
      $result->execute();
      $dados = $result->fetchAll(PDO::FETCH_ASSOC);
      $quantidade = 0;

      for($i = 0; $i < count($dados); $i = $i + 1){
          foreach($dados[$i] as $membro=>$dado) $quantidade = $dado;
      }

      if(isset($_POST["cadastrar"])){
        $nomeProduto      = $_POST["nomeProduto"];
        $descricaoProduto = $_POST["description"];
        $valorProduto     = $_POST["price"];
        
        if(empty( $_POST["nomeProduto"] ) or
           empty( $_POST["description"] ) or 
           empty( $_POST["price"]      )) echo "Formulário não foi devidamente preenchido!";

        else{
          $SQL = (String)("INSERT INTO produtos(Codigo_produto, Nome, Descricao, Preco) VALUES (").
                                      (String)($quantidade         + 1) . ",'" .
                                      (String)($nomeProduto           ) . "','".
                                      (String)($descricaoProduto      ) . "'," .
                                      (String)($valorProduto          ) . ")"  ;
          echo($SQL);
          $result = $Conn->prepare($SQL);

          $result->execute();   
        }
      }
      else{
      }
    ?>


  <footer class="page-footer blue">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
            <h5 class="white-text">Desenvolvedor Beck-End PHP Bleez</h5>

        </div>


      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
