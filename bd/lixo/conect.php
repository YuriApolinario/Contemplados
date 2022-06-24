<?php
  

  $strcon = mysqli_connect('mysql.fragaebitelloconsorcios.com.br', 'fragaebitelloc', 'Fb1234', 'fragaebitelloc') or die('erro ao conectar ao banco de dados');
  
  $todos = "SELECT cod, categoria, valor_credito, entrada, parcelas, valor_parcela, administradora from tab_contemplados";
  $veiculos = "SELECT cod, categoria, valor_credito, entrada, parcelas, valor_parcela, administradora from tab_contemplados WHERE categoria='veículos'";
  
  //recebe os dados da pesquisa 
  $resultado = mysqli_query($strcon,$todos) or die("falha de acesso ao banco de dados");
  

  $columns = array(
    array( '0' => 'cod' ),
    array( '1' => 'categoria' ),
    array( '2' => 'valor_credito' ),
    array( '3' => 'entrada' ),
    array( '4' => 'parcelas' ),
    array( '5' => 'valor_parcela' ),
    array( '6' => 'administradora' ),
  );
    $strcon = mysqli_connect('mysql.fragaebitelloconsorcios.com.br', 'fragaebitelloc', 'Fb1234', 'fragaebitelloc') or die('erro ao conectar ao banco de dados');
    $todos = "SELECT cod, categoria, valor_credito, entrada, parcelas, valor_parcela, administradora FROM tab_contemplados";
    $resultado_contemp =mysqli_query($conn, $todos)
    $qnt_linhas = mysqli_num_rows($resultado_contemp); 
 
    // $todos = "SELECT cod, categoria, valor_credito, entrada, parcelas, valor_parcela, administradora from tab_contemplados";
    $veiculos = "SELECT cod, categoria, valor_credito, entrada, parcelas, valor_parcela, administradora from tab_contemplados WHERE categoria='veículos'";
    $resultado = mysqli_query($strcon,$todos) or die("falha de acesso ao banco de dados");
   
    //obter dados apresentados
    $result_search =  "SELECT cod, categoria, valor_credito, entrada, parcelas, valor_parcela, administradora from tab_contemplados";
    if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
        $result_usuarios.=" AND ( categoria LIKE '".$requestData['search']['value']."%' ";    
        $result_usuarios.=" OR valor_credito LIKE '".$requestData['search']['value']."%' ";
        $result_usuarios.=" OR entrada '".$requestData['search']['value']."%' )";
        $result_usuarios.=" OR parcelas '".$requestData['search']['value']."%' )";
        $result_usuarios.=" OR valor_parcelas '".$requestData['search']['value']."%' )";
        $result_usuarios.=" OR administradora '".$requestData['search']['value']."%' )";
    }
    $resultado=mysqli_query($strcon,$result_search)
    $totalFiltered = mysqli_num_rows($resultado_usuarios);

    $dados = array();
    while($contemplados mysql_fetch_array($todos)){
        $dado = array(); 
        $dado[] = $todos["cod"];
        $dado[] = $todos["categoria"];
        $dado[] = $todos["valor_credito"];
        $dado[] = $todos["entrada"];
        $dado[] = $todos["parcelas"];
        $dado[] = $todos["valor_parcela"];
        $dado[] = $todos["administradora"];		

        $dados[] = $dado;
    }

    $json_data = array(
        "draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	    "recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
	    "recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	    "data" => $dados   //Array de dados completo dos dados retornados da tabela 
    );
?>