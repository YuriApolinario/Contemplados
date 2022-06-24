<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title>Celke</title>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript">
		$(document).ready(function() {
			$("#listar-contemplados").DataTable({
				"processing": true,
				"serverSide": true,
				"ajax": "index.php"
			});
		});
	</script>
</head>

<body>
	<h1>Listar usuários</h1>
	<table id="listar-contemplados" class="display" style="width:100%">
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
			<tbody>
				<th>Nº</th>
				<th>categoria</th>
				<th>Crédito</th>
				<th>Entrada</th>
				<th>Prazo</th>
				<th>Parcela</th>
				<th>Adm</th>
				<th>Contato</th>
			</tbody>
		</thead>
	</table>
</body>

</html>