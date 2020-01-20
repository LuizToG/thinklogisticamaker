<?php

ini_set('max_execution_time', 1200000);
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !

include ("conexao.php");
//	include ("consultas.php");
//	include ("util.php");


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':

        $codigo = $_REQUEST["codigo"];
       // $nome = $_REQUEST["nome"];
    
     
        buscaProd($codigo);
}




function buscaProd($codigo) {
     
    $conexao2 = getConnInterna();



 
        $consultaProd = "select * 
        from erp_fabricantes 
        inner join erp_fabricantes_vinculado on erp_fabricantes_vinculado.fv_fabricantes_id =  erp_fabricantes.fabricantes_id 
        inner join erp_segmento on erp_segmento.segmento_id =  erp_fabricantes.fabricantes_segmento_id 
        inner join erp_fabricante_grupo on erp_fabricante_grupo.fg_fabricantes_id = erp_fabricantes.fabricantes_id
        inner join erp_grupo on erp_grupo.grupo_id = erp_fabricante_grupo.fg_grupo_id
        where fabricantes_id = '$codigo'";
      


 //echo $consultaProd;
        $sqlInsert1 = $conexao2->prepare($consultaProd);
        $sqlInsert1->execute();
  
		    $rows = array('data' => array());
    $rows['data'] = $sqlInsert1->fetchAll(PDO::FETCH_OBJ);
		echo  json_encode($rows);
		
//31 3023 6621

}

?>