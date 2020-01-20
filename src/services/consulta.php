<?php
// Verifica se existe a variável txtnome
if (isset($_GET["txtnome"])) {
    $codigo = $_GET["txtnome"];

    
    // Conexao com o banco de dados
    /*$server = "localhost";
    $user = "root";
    $senha = "011224";
    $base = "agenda";
    $conexao = mysql_connect($server, $user, $senha) or die("Erro na conexão!");
    mysql_select_db($base);*/



$server  = '192.168.0.251';
$base  = 'bd_babita';
$user = 'postgres';
$db_port = 5432;
$senha  = 'devBabitaNovoBab09182736';

$conn_string = sprintf("host=%s port=%s dbname=%s user=%s password=%s",
        $server, $db_port, $base, $user, $senha);

$connection = pg_connect($conn_string) 
        or die("Could not connect : " . pg_last_error());




    // Verifica se a variável está vazia
    if (empty($codigo)) {
        $sql = "SELECT * FROM erp_fabricantes";
    } else {
        $codigo .= "";
        $sql = "SELECT * FROM erp_fabricantes WHERE fabricantes_id = '$codigo'";
    }
    sleep(1);
    $result = pg_query($sql);
    $cont = pg_affected_rows($result);
    // Verifica se a consulta retornou linhas 
    if ($cont > 0) {
        // Atribui o código HTML para montar uma tabela
        $tabela = "<table border='1'>
                    <thead>
                        <tr>
                            <th>CODIGO</th>
                            <th>NOME</th>
                            <th>COMISSAO</th>
                            <th>NOME FANTASIA</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>";
        $return = "$tabela";
        // Captura os dados da consulta e inseri na tabela HTML
        while ($linha = pg_fetch_array($result)) {
            $return.= "<td>" . utf8_encode($linha["fabricantes_id"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["fabricantes_nome"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["fabricantes_comissao"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["fabricantes_nomfant"]) . "</td>";
            $return.= "</tr>";
        }
        echo $return.="</tbody></table>";
    } else {
        // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
        echo "Não foram encontrados registros!";
    }
}
?>




