<?php


include("conexao.php");

fornecedoressilas();

function fornecedoressilas() {

    //$revistas_id = addslashes(trim($_GET["revistas_id"]));

    $conexao = getConn();
    //$conexao = getConnGeral('192.99.210.173', 'bd_think', 'postgres','devBabitaNovo08062017');

    $sql = "SELECT *
FROM public.erp_revistas
where rev_num_rev >= 0 order by rev_num_rev";


//echo $sql;
 $rows = array('data' => array());

    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $rows['data'] = $stmt->fetchAll(PDO::FETCH_OBJ);
   
    echo json_encode($rows); 

}


?>


