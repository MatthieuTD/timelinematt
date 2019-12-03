<!DOCTYPE html>
<html>
<head>
	<title>Timeline</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Red+Hat+Text&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
<?php
        require_once 'connect.php'; 

?>

	<div class="Partie1">
		<nav>
			<ul class="date-nav">

				<li class="all"><a href="index.php?nav=1">All</a> </li>
				<li class="1969"><a href="index.php?nav=2">1969</a></li>
				<li class="1975"><a href="index.php?nav=3">1975</a></li>
				<li class="1980"><a href="index.php?nav=4">1980</a></li>
				<li class="1985"><a href="index.php?nav=5">1985</a></li>
				<li class="1990"><a href="index.php?nav=6">1990</a></li>
				<li class="1995"><a href="index.php?nav=7">1995</a></li>
				<li class="2000"><a href="index.php?nav=8">2000</a></li>
				<li class="2005"><a href="index.php?nav=9">2005</a></li>
				<li class="2010"><a href="index.php?nav=10">2010</a></li>
				<li class="2015"><a href="index.php?nav=11">2015</a></li>
				<li class="2020"><a href="index.php?nav=12">2020</a></li>
			</ul>
		</nav>
	</div>
	<div class="Partie2">
		<header>
			<h1><strong>Timeline</strong> web developpement</h1>
			<br>
			<ul class="filtre">
<?php

  $statement = $db->prepare('SELECT Categories_name FROM TM_categories');
                $statement->execute();

                 while($rez = $statement->fetch()){

                    ?>
                
                    	<li class="<?php  echo $rez['Categories_name']; ?>">
                        <?php 
                        echo $rez['Categories_name']; 
                        ?>
                        </li>
                   <?php
               }

                   ?>





				
				
			</ul>
		</header>
		<section>
			<aside>
				<ul class="dates-infos">


					<?php
					if (!isset($_GET['nav'])) {
						$navvar = 1;
					}else {
						$navvar = $_GET['nav'];
					}

				switch ($navvar) {
					case '1':
						$requete = $db->prepare('SELECT * FROM TM_date');
					$requete->execute();
						break;
					case '2':
						$requete = $db->prepare(
							"SELECT * FROM TM_date WHERE Date_name BETWEEN '1969-00-00' AND '1975-00-00'");
					$requete->execute();
						break;
					case '3':
						$requete = $db->prepare(
							"SELECT * FROM TM_date WHERE Date_name BETWEEN '1975-00-00' AND '1980-00-00'");
					$requete->execute();						break;
					case '4':
						$requete = $db->prepare(
							"SELECT * FROM TM_date WHERE Date_name BETWEEN '1980-00-00' AND '1985-00-00'");
					$requete->execute();
						break;
					case '5':
						$requete = $db->prepare(
							"SELECT * FROM TM_date WHERE Date_name BETWEEN '1985-00-00' AND '1990-00-00'");
					$requete->execute();
						break;
					case '6':
						$requete = $db->prepare(
							"SELECT * FROM TM_date WHERE Date_name BETWEEN '1990-00-00' AND '1995-00-00'");
					$requete->execute();
						break;
					case '7':
						$requete = $db->prepare(
							"SELECT * FROM TM_date WHERE Date_name BETWEEN '1995-00-00' AND '2000-00-00'");
					$requete->execute();
						break;
					case '8':
						$requete = $db->prepare(
							"SELECT * FROM TM_date WHERE Date_name BETWEEN '2000-00-00' AND '2005-00-00'");
					$requete->execute();
						break;
					case '9':
						$requete = $db->prepare(
							"SELECT * FROM TM_date WHERE Date_name BETWEEN '2005-00-00' AND '2010-00-00'");
					$requete->execute();
						break;
					case '10':
						$requete = $db->prepare(
							"SELECT * FROM TM_date WHERE Date_name BETWEEN '2010-00-00' AND '2015-00-00'");
					$requete->execute();
						break;
					case '11':
						$requete = $db->prepare(
							"SELECT * FROM TM_date WHERE Date_name BETWEEN '2015-00-00' AND '2020-00-00'");
					$requete->execute();
						break;
					case '12':
						$requete = $db->prepare(
							"SELECT * FROM TM_date WHERE Date_name BETWEEN '2020-00-00' AND '2030-00-00'");
					$requete->execute();
						break;
						
					
					
				}

					

					while($donnee = $requete->fetch()){

						

						?>
						<li class="1969 Web Jeux" onclick="myFunction(<?php echo $donnee['Id_date']; ?>)">
						<div>
							<h3>
								<?php echo $donnee['Date_name'] ; ?>
									
							</h3>
							<ul>
								<?php
						$requ = "SELECT Id_categories FROM Appartient WHERE Id_date = ".$donnee['Id_date'];
						$req = $db->prepare($requ);
						$req->execute();


						while ($resu = $req->fetch()) {

				$reque = "SELECT Categories_name FROM TM_categories WHERE Id_categories = ".$resu['Id_categories'];
						$reque1 = $db->prepare($reque);
						$reque1->execute();
						while ($resul = $reque1->fetch()) {
							?>



								<li class="<?php echo $resul['Categories_name']; ?> ">
								


							<?php
						}}

								?>
								
							</ul>
						</div>
						<div>
							<p><?php echo $donnee['Title'] ; ?></p>
							<div class="flèche">
								<div class="trait-horizontale"></div>
								<div class="trait-top"></div>
								<div class="trait-bottom"></div>
							</div>
						</div>
					</li>


						<?php


					}

					?>
					
					
				</ul>
			</aside>
			<article class="affi-date">
				<div>
					<h2>Création de Linux</h2>
					<ul>
						<li>OS</li>
						<li>Informatique</li>
					</ul>
					<h3>aout 1969</h3>
				</div>
				<div class="page-scroll">
					<div id="banniere">
						<figure>
							<img src="linux.png">
							<figcaption>Le logo de Linux</figcaption>
						</figure>
					</div>
					<p>
				
En 1969, Ken Thompson qui travaillait alors pour les laboratoires Bell développa la première version d'un système d'exploitation mono-utilisateur sous le nom de New Ken's System. Il réalisa ce travail sur un mini-ordinateur PDP-7 (Programmed Data Processor) de marque DEC animé par General Comprehensive Operating System7 et rédigea le nouveau logiciel en langage d'assemblage. Le nom Unics fut suggéré par Brian Kernighan à la suite d'un jeu de mots « latin » avec Multics; « Multi- car Multics faisait la même chose de plusieurs façons alors qu'Unics faisait chaque chose d'une seule façon ». Ce nom fut par la suite contracté en Unix (pour être déposé finalement sous le nom UNIX par AT&T), à l'initiative de Brian Kernighan.

			


					</p>
				</div>
			</article>
		</section>
	</div>
	<script>
     
      var poemDisplay = document.querySelector('.affi-date');

      function myFunction(id) {
       
        var url = 'conf.php?id='+id;

        fetch(url).then(function(response) {
          response.text().then(function(text) {
            poemDisplay.innerHTML = text;
            console.log(text);
          });
        });
      };

      myFunction(5);
      


    </script>
	<script
  src="http://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<script type="text/javascript">

		$('.date-nav li').on('click', function(e) {	  
			$('.date-nav li').removeClass('select-li');
			$(this).addClass('select-li');
		})

		$('.filtre li').on('click', function(e) {
			$(this).toggleClass('select2-li');
		})

		$('.dates-infos li').on('click', function(e) {	  
			$('.dates-infos li').removeClass('select3-li');
			$(this).addClass('select3-li');
		})

	</script>
</body>
</html>