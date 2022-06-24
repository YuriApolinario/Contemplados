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