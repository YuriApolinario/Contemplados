<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Gregorio-Consorcios - Contemplados</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
  <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="js/filterDropDown.js"></script>
  <style>
    html {
        font-family: sans-serif;
        background-color: gray;
      }
      body {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        background-color: white;
      }
      header {
        background: url(header.jpg) no-repeat center;
        height: 200px;
      }
      img {
        display: block;
        margin: 0 auto;
        max-width: 100%;
      }
      section {
        padding: 20px;
      }
        .conteudo{
            width: 1200;
        }
        .whats {
            width: 25px;
        }

        .banner {
          max-width: 1200px;   
        }
        #minhaTabela{
            margin-top: 2500px;
        }
        .navbar {
            position: static;
            -ms-flex: wrap;
            -webkit-box-align: right;
            -ms-flex-align: right;
            align-items: center;
            justify-content: center;
        }
  </style>
    

  <script>
  $(document).ready(function(){

    var table = $('#minhaTabela').DataTable( {
      select: true,
      paging:false,
          "columnDefs": [
            { 
              type: "categoria", 
              targets: 0,
              orderable: false }],
        	"language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
                
            },
        dom: 'Bfrtip',
        buttons: [
            {
                text: 'Todos',
                action: function ( e, dt, node, config ) {
                    table
                        .search('')
                        .columns(2)
                        .search('') //TODOS OS REGISTROS
                        .draw();
                }
            },
            {
                text: 'veiculo',
                action: function ( e, dt, node, config ) {
                    table
                        .search('')
                        .columns(2) //COLUNA PARA FILTRAR
                        .search('veículo') //PALAVRA PARA FILTRAR
                        .draw();
                }
            },
            {
                text: 'imóveis',
                action: function ( e, dt, node, config ) {
                    table
                        .search('')
                        .columns(2)
                        .search('imóveis')
                        .draw();
                }
            }
        ],
                        responsive: true
        });

        table.buttons().container().prependTo(
     $('#minhaTabela_wrapper'), table.table().container()
   );
  });
  </script>
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
  
  <table id='minhaTabela' content='text/html; charset=utf-8' class='display nowrap table table-striped compact table-bordered' style='width:100%'>
      <thead>
      <tr>
      <th>Nº</th>
      <th>
      <select name="category" id="category" class="form-control">
         <option value="">Categoria</option>
         <option value="">veículo</option>
         <option value="">Imóvel</option>
         <?php 
         while($row = mysqli_fetch_array($result))
         {
          echo '<option value="'.$registro["categoria"].'">'.$registro["categoria"].'</option>';
          echo '<option value="'.$registro["veiculo"].'">'.$registro["veiculo"].'</option>';
          echo '<option value="'.$registro["imovel"].'">'.$registro["imovel"].'</option>';
         }
         ?>
      </select>
      </th>
      <th>Crédito</th>
      <th>Entrada</th>
      <th>Prazo</th>
      <th>Parcela</th>
      <th>Administradora</th>
      <th>Negociar</th>
      </thead>
      
  <?php
     
       

       
        $strcon = mysqli_connect('mysql.fragaebitelloconsorcios.com.br', 'fragaebitelloc', 'Fb1234', 'fragaebitelloc') or die('erro ao conectar ao banco de dados');
        mysqli_set_charset($strcon, 'utf8');
        $todos = "SELECT cod, categoria, valor_credito, entrada, parcelas, valor_parcela, administradora from tab_contemplados";
        $veiculos = "SELECT cod, categoria, valor_credito, entrada, parcelas, valor_parcela, administradora from tab_contemplados WHERE categoria='veículo'";
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
            echo "</tr>";
          }
          
          
          
          mysqli_close($strcon);
          ?>
          </table>


  
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