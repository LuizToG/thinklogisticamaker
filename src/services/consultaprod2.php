<?php


include("conexao.php");

fornecedores();
fornecedoresvin();
fornecedoresgrupo();

function fornecedores() {

    $codigo = addslashes(trim($_GET["codigo"]));
    $nome = addslashes(trim($_GET["nome"]));
    $prinome = addslashes(trim($_GET["prinome"]));
    $comissao = addslashes(trim($_GET["comissao"]));
    $seguimento = addslashes(trim($_GET["seguimento"]));
    $seguimentogestao = addslashes(trim($_GET["seguimentogestao"]));
    $revistaparalelo = addslashes(trim($_GET["revistaparalelo"]));
    $ativo = addslashes(trim($_GET["ativo"]));
    $revista = addslashes(trim($_GET["revista"]));
    $acrescimo = addslashes(trim($_GET["acrescimo"]));
    $conexao = getConnInterna();

    
    



    //$conexao = getConnGeral('192.99.210.173', 'bd_think', 'postgres','devBabitaNovo08062017');

    $sql = "INSERT INTO erp_fabricantes(fabricantes_id, fabricantes_nome,fabricantes_nomfant,fabricantes_comissao, fabricantes_segmento_id,fabricantes_segmento_id_gestao,fabricantes_revista,for_ativo,fabricantes_revistas_id,fabricantes_bonus) VALUES ('$codigo','$nome','$prinome','$comissao','$seguimento','$seguimentogestao','$revistaparalelo','$ativo',$revista,'$acrescimo')";

    //echo $sql;

//echo $sql;
 $rows = array('data' => array());

    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $rows['data'] = $stmt->fetchAll(PDO::FETCH_OBJ);
   
    echo json_encode($rows); 

}

function fornecedoresvin() {

    $cpfcnpj = addslashes(trim($_GET["cpfcnpj"]));
    $prinome = addslashes(trim($_GET["prinome"]));
    $codigo = addslashes(trim($_GET["codigo"]));
    $vinculo = addslashes(trim($_GET["vinculo"]));
    $conexao = getConnInterna();
    //$conexao = getConnGeral('192.99.210.173', 'bd_think', 'postgres','devBabitaNovo08062017');

    $sql = "INSERT INTO erp_fabricantes_vinculado(fv_vinculacao_id, fv_fabricantes_id,fv_nome,fv_fabricantes_cnpj) VALUES ('$vinculo','$codigo','$prinome','$cpfcnpj')";



 $rows = array('data' => array());

    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $rows['data'] = $stmt->fetchAll(PDO::FETCH_OBJ);
   
    echo json_encode($rows); 

}

function fornecedoresgrupo() {
    
    $codigo = addslashes(trim($_GET["codigo"]));
    $grupo = addslashes(trim($_GET["grupo"]));
    $conexao = getConnInterna();
    //$conexao = getConnGeral('192.99.210.173', 'bd_think', 'postgres','devBabitaNovo08062017');

    $sql = "INSERT INTO erp_fabricante_grupo(fg_grupo_id, fg_fabricantes_id) VALUES ('$grupo','$codigo')";


//echo $sql;
 $rows = array('data' => array());

    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $rows['data'] = $stmt->fetchAll(PDO::FETCH_OBJ);
   
    echo json_encode($rows); 

}

?>
