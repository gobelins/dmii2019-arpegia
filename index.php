<?php
  $url = 'https://accounts.spotify.com/api/token';
  $credentials = "96dc887368944382a37dcd39286e551d:50c9171ac6eb4d5584ff4dce03e9d4b3";

  $headers = array(
    "Accept: application/json",
    "Content-Type: application/x-www-form-urlencoded",
    "User-Agent: runscope/0.1",
    "Authorization: Basic " . base64_encode($credentials)
  );

  $data = 'grant_type=client_credentials';
  unset($_COOKIE['stateKey']);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = json_decode(curl_exec($ch), true);
  curl_close($ch);

  setcookie('spotifyToken',$response['access_token'] );
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="twitter:card" content="summary" />
  <meta property="og:title" content="ARPEGIA" />
  <meta property="og:description" content="Découvrez les talents d'Astérios" />
  <meta property="og:image" content="http://guyonmelina.fr/projets/arpegia/assets/interface/social-img.jpg" />
  <meta property="og:image:secure_url" content="https://guyonmelina.fr/projets/arpegia/assets/interface/social-img.jpg" />
  <meta property="og:image:type" content="image/jpeg" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="600" />

  <title>ARPEGIA</title>
  <link rel="stylesheet" href="stylesheet/main.css">
</head>
<body>
    <!-- webGL -->
  	<div id="container"></div>
    <!-- webGL -->

    <div class="interface">
      <div class="pause"></div>

      <div class="overlay"></div>

      <div class="loader">
        <img src="assets/logos/logo_loader.gif" alt="" class="loader_logo">
        <div class="loader_margin">Margin</div>
      </div>

      <div class="splash">
        <img src="assets/logos/logo_interface.svg" alt="" class="splash_logo">
        <div class="splash_baseline">ARPEGIA</div>
      </div>
      <div class="tuto">

        <div class="tuto_explanations">
          <p class="tuto_explanations_baseline">ARPEGIA</p>
          <p>La serrure de cette mystérieuse boîte est verrouillée...<br>La clé, c'est un accord de 3 notes.</p>
        </div>
        <div class="skip">
          <span class="skip_tuto">PASSER L'INTRODUCTION</span>
          <img src="assets/interface/skip.svg" alt="" class="skip_tuto skip_arrow">
        </div>

        <div class="tuto_training">
          <p class="tuto_training_consigne">Utilise ton clavier comme celui d'un piano, et retrouve les combinaisons de touches adjacentes qui correspondent aux accords déverrouillant la boîte.</p>
          <p>Es-tu prêt ?</p>
          <img src="assets/interface/key_oui.svg" alt ="" class="oui_img">
        </div>
      </div>
      <div class="game">
        <img src="assets/logos/logo_interface.svg" alt="" class="interface_logo">

        <div class="about">
          <span class="interface_about about_text">A PROPOS</span>
          <img src="assets/interface/about.svg" alt="" class="interface_about">
        </div>

        <div class="help">
          <img src="assets/interface/help.svg" alt="" class="interface_help">
          <span class="interface_help help_text">COUP DE MAIN</span>
        </div>

        <div class="socials">
          <img src="assets/interface/facebook.svg" alt="" class="interface_fb">
          <img src="assets/interface/twitter.svg" alt="" class="interface_twitter">
        </div>

        <button type="button" class="artist-lirary-button">
          <span class="found"></span>/<span class="total"></span> artistes trouvés
        </button>
        <a href="http://asterios.fr/fr/agenda" target="_blank" class="go-to-billeterie">
          Voir l'artiste en concert
        </a>

        <p class="game_consigne"></p>
      </div>

      <div class="about_screen">
        <button type="button" class="about-close-button">
          <img src="assets/library/cross.svg" alt="">
        </button>
        <div class="container">
          <p><span class="bold">ARPEGIA</span> est un projet imaginé et créé en collaboration avec Astérios Spectacles par Alicia Baudry, Lucas Domingues, Melina Guyon et Emmanuelle Persson, étudiants en Master Design et Management de l’Innovation Interactive à Gobelins.</p>
          <p><span class="bold">Merci</span> à Medhi Hadi, Christophe Massolin, William Mapan, Samsy et l’équipe pédagogique de Gobelins.</p>
          <div class="about_logos">
            <img src="assets/logos/gobelins.svg" alt="" class="gobelins_logo">
            <img src="assets/logos/jardin_imparfait.svg" alt="" class="jardin_logo">
            <img src="assets/logos/asterios.svg" alt="" class="asterios_logo">
          </div>
        </div>
      </div>

      <div class="help_screen">
        <button type="button" class="help-close-button">
          <img src="assets/library/cross.svg" alt="">
        </button>
        <div class="container">
          <p>Pour révéler ce que renferme cette boîte, il faut trouver un accord de 3 notes. Utilise ton clavier comme celui d'un piano et teste différentes combinaisons de touches en appuyant simultanément sur 3 lettres adjacentes; tu trouveras peut-être un accord déverrouillant la boîte.</p>
          <img src="assets/interface/how_to_play.gif" alt="" class="help_img">
        </div>
      </div>
    </div>

    <div class="artistsLibrary">
      <button type="button" class="libray-close-button">
        <img src="assets/library/cross.svg" alt="">
      </button>
      <div class="artist">
        <p class="name gray">Orelsan</p>
        <p class="chord">N J K</p>
        <div class="lock"></div>
      </div>
      <div class="artist">
        <p class="name yellow">Mademoiselle K</p>
        <p class="chord">A Q W</p>
        <div class="lock"></div>
      </div>
      <div class="artist">
        <p class="name pink">Petit Biscuit</p>
        <p class="chord">V F T</p>
        <div class="lock"></div>
      </div>
    </div>

    <div class="songCarateristics">
      <div class="songsName">
        <img class="next-button" src=""></img>
        <div>
          <p class="artist"></p>
          <p class="song"></p>
        </div>
      </div>

      <div class="letters">
        <span class="one"></span>
        <span class="two"></span>
        <span class="three"></span>
      </div>
    </div>

  	<script src="javascript/bundle.js"></script>

    <!-- analytics -->
    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        //marqueur Gobelins projets
        ga('create', 'UA-34423251-3', 'auto', 'gobelins');
        // dimensions personnalisées
        ga('gobelins.set', 'dimension2', 'etudiant-design-interactif-web');
        ga('gobelins.set', 'dimension3', 'DMII');
        ga('gobelins.set', 'dimension5', 'WebGL Asterios');
        ga('gobelins.set', 'dimension6', 'Arpegia');
        ga('gobelins.set', 'dimension7', '2019');
        ga('gobelins.set', 'dimension8', '2017-12-08');
        ga('gobelins.send', 'pageview');
    </script>
</body>
</html>
