<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf8">
  <title>Sua Página</title>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
  <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
  <style>
        .conteudo{
            width: 1200;
        }
        img {
            width: 25px;
        }

        .banner {
            width: 1344px;
        }
        #minhaTabela{
            margin-top: 2500px;
        }
    </style>
</head>
<body>
<img class="banner" src="img/banner-site.jpg" alt="">
  <div class="container conteudo">
  
  
  <?php
        echo "<table id='minhaTabela' class='table table-striped compact table-bordered' style='width:100%'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>N°</th>";
        echo "<th>Categoria</th>";
        echo "<th>Crédito</th>";
        echo "<th>Entrada</th>";
        echo "<th>Prazo</th>";
        echo "<th>Parcela</th>";
        echo "<th>Administradora</th>";
        echo "<th>Negociar</th>";
        echo "</thead>";

       
        
        $strcon = mysqli_connect('mysql.fragaebitelloconsorcios.com.br', 'fragaebitelloc', 'Fb1234', 'fragaebitelloc') or die('erro ao conectar ao banco de dados');
        // $todos = "SELECT cod, categoria, valor_credito, entrada, parcelas, valor_parcela, administradora from tab_contemplados";
        $todos = "SELECT cod, categoria, valor_credito, entrada, parcelas, valor_parcela, administradora from tab_contemplados WHERE categoria='veículos'";
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
            echo "<td><a target='_blank' href='https://api.whatsapp.com/send?phone=554498502920&text=$msg'><img src='img/whatsapp.png'> Negociar </a></td>";
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
                "search":"pesquisar",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
            }
        });
  });
  </script>
  </div>
  <footer class="footer-area centermobile">
<div class="container">
<div class="row remove-wrap">
<div class="col-md-2 ">
<a href="/">
<img alt="logo" class="img-fluid logomobile" src="/gerenciador/plugins/images/logofbbranco.png" pagespeed_url_hash="2744521953" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
</a>
</div>
<div class="col-md-2 ">
<a href="/">
<img alt="logo" class="img-fluid charles-brown tm-img" src="/gerenciador/plugins/images/logo-hs-white.png" pagespeed_url_hash="43902286" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
</a>
</div>
<div class="col-md-4 dados1212  ">
<span class="cor-letras-footer">
<a class="tirar-corlink" href="mailto:atendimento@fragaebitelloconsorcios.com.br" target="_blank">
<i class="fa fa-envelope fa-fw edit-icon"></i>
atendimento@fragaebitelloconsorcios.com.br
</a>
</span>
<span class="cor-letras-footer">
<a class="tirar-corlink" href="https://www.instagram.com/fragaebitelloconsorcios/" target="_blank">
<i class="fa fa-instagram fa-fw edit-icon"></i>
</a>
<a class="tirar-corlink" href="https://www.facebook.com/Fraga-Bitello-114744880705685" target="_blank">
<i class="fa fa-facebook fa-fw edit-icon"></i>
</a>
<a class="tirar-corlink" href="https://www.facebook.com/Fraga-Bitello-114744880705685" target="_blank">
Curta e siga nosso trabalho
</a>
</span>

</div>
<div class="col-lg-3 right centermobile ">
<div class="bridge-footer2">
<p class="footer-text">Feito com <font color="white">♥</font> por <a href="https://agenciabridge.com.br" target="_blank"> <img alt="logo" class="logobridge" src="/gerenciador/plugins/images/logobranco.png" pagespeed_url_hash="432233381" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a></p>
<p class="text-white fonty12px">
Todos os direitos reservados. Fraga &amp; Bitello Consórcios 2020</p>
</div>
</div>
</div>
</div>

</footer>
</body>
</html>