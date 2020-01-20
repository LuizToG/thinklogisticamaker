<?php 
 function getConn()
{
	
 try {
	 ini_set('max_execution_time', 200000);
   //return  new PDO("pgsql:host=192.168.0.250;dbname=bd_think_des;user=postgres;password=09182736");
   return  new PDO("pgsql:host=192.99.210.173;dbname=bd_think;user=postgres;password=devBabitaNovo08062017");
 } catch (PDOException  $e) {
    print $e->getMessage();
 }
}

function getConnDes()
{
	
 try {
	 ini_set('max_execution_time', 200000);
   return  new PDO("pgsql:host=192.168.0.250;dbname=bd_think_des;user=postgres;password=09182736");
 } catch (PDOException  $e) {
    print $e->getMessage();
 }
}


 function getConnInterna()
{
 try {
//  echo new PDO("pgsql:host=localhost  dbname=bd_think_des user=postgres password=/\/BabSysteM");

  return  new PDO("pgsql:host=192.168.0.251;dbname=bd_babita;user=postgres;password=devBabitaNovoBab09182736");
  //return  new PDO("pgsql:host=192.168.0.250  dbname=bd_think_des user=postgres password=09182736");
 
 } catch (PDOException  $e) {
    print $e->getMessage();
    echo   $e->getMessage();
 }
};


 function getConnGeral($ip, $nombanco, $user,$senha)
{
 try {
   return  new PDO("pgsql:host=".$ip." dbname=".$nombanco." user=".$user." password=".$senha);

 } catch (PDOException  $e) {
    print $e->getMessage();
 }
}


 ?>

