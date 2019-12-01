<?php 


$db_host = "localhost";
$db_name = "BDD_timeline";
$db_user = "root";
$db_pass = "root";
$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$requ = "SELECT * FROM TM_date WHERE Id_date = ".$_GET['id'];
						$req = $db->prepare($requ);
						$req->execute();


						while ($resu = $req->fetch()) {

							echo $resu['Title'] ;
							echo "tt";
							

						}
echo "tt";


?>