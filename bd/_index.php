<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Gregorio-Consorcios - Contemplados</title>
  <!-- <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" /> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
  <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
  
  <style>

@charset "UTF-8"; 
        .conteudo{
            width: 1200;
        }
        .whats {
            width: 25px;
        }

        .banner {
            width: 1344px;
        }
        #minhaTabela{
            margin-top: 2500px;
        }
        .navbar {
            position: static;
            -ms-flex-wrap: wrap;
            -webkit-box-align: right;
            -ms-flex-align: right;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="http://gregorioconsorcios.com.br/">
    <img src="img/logo-gregorio-consorcio.png" width="250"alt="">
  </a>
  <a class="navbar-brand" href="http://gregorioconsorcios.com.br/">Home</a>
  <a class="navbar-brand" href="http://gregorioconsorcios.com.br/index.php/about/">Sobre nós</a>
  <a class="navbar-brand" href="http://gregorioconsorcios.com.br/index.php/contact/">Contato</a>
  <a class="navbar-brand" href="hhttps://api.whatsapp.com/send/?phone=%2B554498502920&text&app_absent=0">Fale Conosco</a>
</nav>
<img class="banner" src="img/banner-site.jpg" alt="">
  <div class="container conteudo" >
  <select value="filtro" id="filtro">
    <option value="categoria">categoria</option>
    <option value="imóveis">imóveis</option>
    <option value="veículos">veículos</option>
    ...
  </select>
  <?php
        // header('Content-type: text/html; charset=UTF-8', true);
        // header("Content-Type: text/html; charset=ISO-8859-1", true);
  
        echo "<table id='minhaTabela' content='text/html; charset=utf-8' class='table table-striped compact table-bordered' style='width:100%'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>N</th>";
        echo "<th>Categoria</th>";
        echo "<th>Crédito</th>";
        echo "<th>Entrada</th>";
        echo "<th>Prazo</th>";
        echo "<th>Parcela</th>";
        echo "<th>Administradora</th>";
        echo "<th>Negociar</th>";
        echo "</thead>";

       
        $strcon = mysqli_connect('mysql.fragaebitelloconsorcios.com.br', 'fragaebitelloc', 'Fb1234', 'fragaebitelloc') or die('erro ao conectar ao banco de dados');
        mysqli_set_charset($strcon, 'utf8');
        $todos = "SELECT cod, categoria, valor_credito, entrada, parcelas, valor_parcela, administradora from tab_contemplados";
        $veiculos = "SELECT cod, categoria, valor_credito, entrada, parcelas, valor_parcela, administradora from tab_contemplados WHERE categoria = 'veículos'";
        $resultado = mysqli_query($strcon, $todos) or die("falha de acesso ao banco de dados");
        
      

        while ($registro = mysqli_fetch_array($resultado)) {
            $cod = $registro['cod'];
            $categoria = $registro['categoria'];
            $credito = $registro['valor_credito'];
            $entrada = $registro['entrada'];
            $prazo = $registro['parcelas'];
            $parcela = $registro['valor_parcela'];
            $adm = $registro['administradora'];
            $msg = 'Estou interessado no crédito contemplado N° ' . $cod . ' para ' . $categoria . ' no valor de R$ ' . $credito . ' ? ';
            
            echo "<tr>";
            echo "<td>" . $cod . "</td>";
            echo "<td>" . $categoria . "</td>";
            echo "<td>" . $credito . "</td>";
            echo "<td>" . $entrada . "</td>";
            echo "<td>" . $prazo . "</td>";
            echo "<td>" . $parcela . "</td>";
            echo "<td>" . $adm . "</td>";
            echo "<td><a type='button' class='btn btn-success' target='_blank' href='https://api.whatsapp.com/send?phone=554498502920&text=$msg'><img class='whats' src='img/whatsapp.png'> Negociar </a></td>";
        }
       
        ?>
        </tr>
        </table>
        <?php
        mysqli_close($strcon);
        ?>
  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

  <script>
  $(document).ready(function(){
      $('#minhaTabela').DataTable({
        paging:false,
          "columnDefs": [{ type: "categoria", targets: 0 }],
        	"language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
            }
        });
  </script>
 
  </div>
  <footer class="bg-dark text-light">
    <div class="container-fluid py-3">
    <div class="row">
      <div class="col-4">
        <ul class="nav flex-column">
          <li class="nav-link"><a href="http://gregorioconsorcios.com.br/">Home</a></li>
          <li class="nav-link"><a href="http://gregorioconsorcios.com.br/index.php/about/">Sobre Nós</a></li>
          <li class="nav-link"><a href="http://gregorioconsorcios.com.br/index.php/contact/">Contato</a></li>
          <li class="nav-link"><a href="https://api.whatsapp.com/send/?phone=%2B554498502920&text&app_absent=0">fale conosco</a></li>
        </ul>
      </div>
      <div class="col-8">
        <p>
            
        </p>
        <ul class="nav">
          <a href="http://gregorioconsorcios.com.br/">
              <img src="img/logo-gregorio-consorcio.png" width="250"alt="">
          </a>
        </ul>
      </div>
    </div>
    </div>
    <div class="text-center" style="background-color: #333; padding: 20px;" >
      &copy 2022 Copyright: <a href="http://gregorioconsorcios.com.br/">Gregorio Consorcios</a>
    </div>
  </footer>
</body>
</html>