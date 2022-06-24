<?php
include('config.php');
if(isset($_POST['request'])){

    $request = $_POST['request']
    $veiculos = "SELECT cod, categoria, valor_credito, entrada, parcelas, valor_parcela, administradora from tab_contemplados WHERE categoria='veículo'";
}
?>
