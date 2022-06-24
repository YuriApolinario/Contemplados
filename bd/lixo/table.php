<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript">
		$(document).ready(function() {
			$('#listar-usuario').DataTable({			
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": "conect.php",
					"type": "POST"
				}
			});
		} );
		</script>
    <title>Document</title>
</head>
<body>
    <table id="datatables" class="display" style="width:100%">
        <thead>
                <tr>
                    <th>Nº</th>
                    <th>categoria</th>
                    <th>Crédito</th>
                    <th>Entrada</th>
                    <th>Prazo</th>
                    <th>Parcela</th>
                    <th>Adm</th>
                    <th>Contato</th>
                </tr>
            </thead>
    </table>
    <?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "testing1");
$column = array("product.id", "product.name", "category.category_name", "product.price");
$query = "
 SELECT * FROM product 
 INNER JOIN category 
 ON category.category_id = product.category 
";
$query .= " WHERE ";
if(isset($_POST["is_category"]))
{
 $query .= "product.category = '".$_POST["is_category"]."' AND ";
}
if(isset($_POST["search"]["value"]))
{
 $query .= '(product.id LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR product.name LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR category.category_name LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR product.price LIKE "%'.$_POST["search"]["value"].'%") ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY product.id DESC ';
}

$query1 = '';

if($_POST["length"] != 1)
{
 $query1 .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["id"];
 $sub_array[] = $row["name"];
 $sub_array[] = $row["category_name"];
 $sub_array[] = $row["price"];
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM product";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
</body>
</html>