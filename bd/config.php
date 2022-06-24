<?php

$strcon = mysqli_connect('mysql.fragaebitelloconsorcios.com.br', 'fragaebitelloc', 'Fb1234', 'fragaebitelloc') or die('erro ao conectar ao banco de dados');
mysqli_set_charset($strcon, 'utf8');
$todos = "SELECT cod, categoria, valor_credito, entrada, parcelas, valor_parcela, administradora from tab_contemplados";
$veiculos = "SELECT cod, categoria, valor_credito, entrada, parcelas, valor_parcela, administradora from tab_contemplados WHERE categoria = 'veículos'";
$resultado = mysqli_query($strcon, $todos) or die("falha de acesso ao banco de dados");


?>