$<!DOCTYPE html>
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

				<li class="all">All</li>
				<li class="1969">1969</li>
				<li class="1975">1975</li>
				<li class="1980">1980</li>
				<li class="1985">1985</li>
				<li class="1990">1990</li>
				<li class="1995">1995</li>
				<li class="2000">2000</li>
				<li class="2005">2005</li>
				<li class="2010">2010</li>
				<li class="2015">2015</li>
				<li class="2020">2020</li>
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
					$requete = $db->prepare('SELECT * FROM TM_date');
					$requete->execute();

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
			<article>
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
					<p class="affi-date">
					



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
            poemDisplay.textContent = text;
            console.log(text);
          });
        });
      };

      
      


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