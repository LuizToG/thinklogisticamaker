<?php

ini_set('max_execution_time', 1200000);
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !

include ("conexao.php");
//	include ("consultas.php");
//	include ("util.php");


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':

        $vinculo = $_REQUEST["vinculo"];
       // $nome = $_REQUEST["nome"];
    
     
        buscaProd($vinculo);
}




function buscaProd($vinculo) {
     
    $conexao2 = getConnInterna();



 
        $consultaProd = "SELECT DISTINCT fv_fabricantes_cnpj
        FROM public.erp_fabricantes_vinculado
        WHERE fv_vinculacao_id = '$vinculo'  LIMIT 1  ";
       
      


 //echo $consultaProd;
        $sqlInsert1 = $conexao2->prepare($consultaProd);
        $sqlInsert1->execute();
  
		    $rows = array('data' => array());
    $rows['data'] = $sqlInsert1->fetchAll(PDO::FETCH_OBJ);
		echo  json_encode($rows);
		
//31 3023 6621

}

?>