<?php
$this->load->helper('html'); ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo base_url() ?>css/graphiques.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>css/inscription.css">
</head>

<body>
    <! -- javascript du graphique -->
	<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

	<link rel="icon" href="<?php echo base_url() ?>images/logo2.png">

	<!-- Navigation -->

	<nav class="navbar navbar-expand-sm">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="hov" href="<?php echo base_url()?>">
	          <img src="<?php echo base_url()?>/images/icon-home.png" class="icon-home-graphiques">
	        </a>
	      </li>
	      <li class="nav-item active">
	        <a class="hov" href="<?php echo base_url('index.php/MenuPrincipal')?>">
	          <img src="<?php echo base_url()?>/images/icon-retour-capteurs.png" class="icon-retour-capteurs">
	        </a>
	      </li>
	    </ul>
	    <div class="collapse navbar-collapse">
	      <ul class="navbar-nav ml-auto">
	        <li class="nav-item active">
	          <a class="nav-link text-white hov" target="_top" href = "mailto: le.covidetecteur@gmail.com">Contact
	            <span class="sr-only">(current)</span>
	          </a>
	        </li>
	        <li class="nav-item">
	          <!-- Boutton qui actionne le modale (pop-up)-->
	          <a data-toggle="modal" data-target="#exampleModalCenter">
	            <img src="<?php echo base_url()?>/images/icon-info.png" class="icon-info hov" alt="logo">
	          </a>
	        </li>
	      </ul>
	    </div>
  	</nav>
 
	<!-- Modale (pop-up) -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		 aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLongTitle">Informations sur Le Covidétecteur</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p><b>Comment analyser les données du capteur ?</b></p>
					Sur cette page cliquez sur les boutons <kbd class="bg-primary">CO2</kbd>, <kbd class="bg-primary">Humidité</kbd>
					ou <kbd class="bg-primary">Température</kbd> pour avoir accès à l'historique de votre Covidétecteur.</p>
					<p>Vous allez pouvoir par exemple vérifier à quels moments les données ont dépassé les limites de
						dangerosité.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Page Content -->


	<div class="container chart-container-size">
		<div class="row">
			<div id="col" class="col-md-12">
				<div class="card border-0 shadow my-4">
					<div class="card-body p-6">

						<div class="btn-toolbar" role="toolbar" aria-label="Group button">

							<div class="btn-group m-auto" role="group" aria-label="First group">
								<input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked value="CO2" onclick="setInfo()">
								<label class="btn btn-outline-primary" for="btnradio1">CO2</label>

								<input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="Humidity" onclick="setInfo()">
								<label class="btn btn-outline-primary" for="btnradio2">Humidité</label>

								<input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="Temp" onclick="setInfo()">
								<label class="btn btn-outline-primary" for="btnradio3">Température</label>
							</div>

							<!-- zone d'affichage des graphiques -->

							<div class="btn-group m-auto" role="group" aria-label="Second group">
								<input type="radio" class="btn-check" name="btnradio2" id="btnradio4" autocomplete="off" checked value="day" onclick="setDateDropdown();">
								<label class="btn btn-outline-primary" for="btnradio4">Jour</label>

								<input type="radio" class="btn-check" name="btnradio2" id="btnradio5" autocomplete="off" value="week" onclick="setDateDropdown();">
								<label class="btn btn-outline-primary" for="btnradio5">Semaine</label>

								<input type="radio" class="btn-check" name="btnradio2" id="btnradio6" autocomplete="off" value="month" onclick="setDateDropdown();">
								<label class="btn btn-outline-primary" for="btnradio6">Mois</label>
							</div>

							<div class="dropdown">
								<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Sélectionnez une date
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdownDate">

								</div>
							</div>

						</div>

						<div id="chart">
						</div>

						<?php $data = json_encode($detecteur) ?>
						<script>
							let dataco2 = <?php print_r($data);?>;
							// modal (pop-up) automatique

							$(window).on('load', function () {
								$('#exampleModalCenter').modal('show');
							});

							//affiche les graphiques
							document.getElementById('chart').innerHTML = '<div id="chart_co2"></div>';

							document.getElementById("co2").addEventListener("click", displayCo2);
							if(getWhen())
							function displayCo2() {
								document.getElementById('chart').innerHTML = '<div id="chart_co2"></div>';
								//recharge le js
								var head = document.getElementsByTagName('head')[0];
								var script = document.createElement('script');
								script.src = '<?php echo base_url()?>js/co2.js';
								head.appendChild(script);
							}
						</script>


					</div>

				</div>

			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="<?php echo base_url() ?>js/co2.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>js/temperature.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>js/humidite.js"></script>

</body>
</html>