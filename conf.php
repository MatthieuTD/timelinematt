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
                            ?>
                            <div>
                              <h2><?php echo $resu['Title'] ; ?></h2>
                    <ul>
                        <li>web</li>
                        <li>Informatique</li>
                    </ul>
                    <h3><?php echo $resu['Date_name'] ; ?></h3>
                </div>
                <div class="page-scroll">
                    <div id="banniere">
                        <figure>
                            <img src="linux.png">
                            <figcaption>Le logo de Linux</figcaption>
                        </figure>
                    </div>
                    <p >
                <?php echo $resu['Comments'] ; ?>


                


                    </p>  
</div>

                            <?php
							
							
							

						}



?>