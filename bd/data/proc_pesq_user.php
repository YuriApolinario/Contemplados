<?php
$servername = "mysql.fragaebitelloconsorcios.com.br";
$username = "fragaebitelloc";
$password = "Fb1234";
$dbname = "fragaebitelloc";

$conn = mysqli_connect($servername, $username, $password, $dbname)
//Receber a requisão da pesquisa 
$requestData= $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array(
    array( '0' => 'cod' ),
    array( '1' => 'categoria' ),
    array( '2' => 'valor_credito' ),
    array( '3' => 'entrada' ),
    array( '4' => 'parcelas' ),
    array( '5' => 'valor_parcela' ),
    array( '6' => 'administradora' ),
  );

//Obtendo registros de número total sem qualquer pesquisa
$quanti_dados = "SELECT  cod, categoria, valor_credito, entrada, parcelas, valor_parcela, administradora from tab_contemplados WHERE 1=1";
$filtro =mysqli_query($conn, $quanti_dados);
$qnt_linhas = mysqli_num_rows($filtro);

//Obter os dados a serem apresentados
if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios.=" AND ( categoria LIKE '".$requestData['search']['value']."%' ";    
        $result_usuarios.=" OR valor_credito LIKE '".$requestData['search']['value']."%' ";
        $result_usuarios.=" OR entrada '".$requestData['search']['value']."%' )";
        $result_usuarios.=" OR parcelas '".$requestData['search']['value']."%' )";
        $result_usuarios.=" OR valor_parcelas '".$requestData['search']['value']."%' )";
        $result_usuarios.=" OR administradora '".$requestData['search']['value']."%' )";
    }

$resultado_usuarios=mysqli_query($conn, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);
//Ordenar o resultado
$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_usuarios=mysqli_query($conn, $result_usuarios);

// Ler e criar o array de dados
$dados = array();
while( $row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {  
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


//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json
