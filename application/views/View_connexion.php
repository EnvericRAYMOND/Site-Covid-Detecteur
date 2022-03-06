<?php
$this->load->helper('form');

?>
<!DOCTYPE html>
<html>

<body>

 <!-- Navigation -->
  <nav class="navbar navbar-expand-sm">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="hov" href="<?php echo base_url()?>">
          <img src="<?php echo base_url()?>/images/icon-home.png" class="icon-home">
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
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle">Informations sur Le Covidétecteur</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p><b>Ce site va vous permettre de connecter votre capteur Covidétecteur afin de visualiser ses données.</b></p>
          <p>Le Covidétecteur est un appareil capable de détecter et d'alerter sur la présence potentielle de charge virale dans l’air d’un lieu clos.</p>
          <p>Le Covidétecteur est équipé d'un capteur Sensirion SCD30 utilisant la technologie CMOSens® pour la détection infrarouge qui permet la mesure extrêmement précise de dioxyde de carbone. Outre la technologie de mesure NDIR pour la détection du CO2, un capteur d'humidité et de température Sensirion de qualité supérieure est également intégré sur le même module capteur.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Page Content -->
  <div class="container carte-blanche-connexion">
    <div class="card border-0 shadow my-4">
      <div class="card-body p-3">
        <div class="text-center">
          <h1 class="font-weight-light">Connexion</h1>
        </div>

        <!-- Logo -->
        <div class="text-center">
          <img src="<?php echo base_url()?>/images/logo.png" class="logo-page-connexion" alt="logo" unselectable="on">
        </div>

        <br>

        <!-- Form -->
        <?php
        echo form_open();
        echo "<div class=\"form-group\">";


        echo form_input(['type'=>'email',
          'placeholder'=>'Adresse email',
          'class'=>'form-size form-control my-3 mx-auto',

          'name'=>'email']);

        echo form_password(['placeholder'=>'Mot de passe',
          'class'=>'form-size form-control my-3 mx-auto',
          'name'=>'password']);




        echo "<div class=\"text-center\">";

        echo "Rester connecté ".form_checkbox([
          'data'=>'staylogged',
          'value'=>'true','class'=>'my-3']);
        echo "<br>";
        echo form_submit(['type'=>'submit',
          'class'=>'btn btn-success rounded-pill',
          'style'=>'width:50%',
        ],"Se connecter");


        echo form_close();
        ?>
      </div>
      <br>
      <br>

      <div class="text-center">
        <p class="lead mb-0 text-secondary">Profitez de l’innovation pour un air plus sain !</p>
      </div>
    </div>
  </div>

</body>

</html>
