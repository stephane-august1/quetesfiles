<?php
$target_dir="assets/Upload/";
if(!empty($_GET["sup"]) && (file_exists($target_dir.$_GET["sup"])))
{
  unlink($target_dir.$_GET["sup"]);
  header("Location: /index.php");
}
echo' <!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Cookie Factory</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/styles.css" />
  </head>

  <body>
    <header>
      <!-- MENU ENTETE -->
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
              data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
              <img class="pull-left" src="assets/img/cookie_funny_clipart.png" alt="The Cookies Factory logo">
              <h1>The Cookies Factory</h1>
            </a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Chocolates chips</a></li>
              <li><a href="#">Nuts</a></li>
              <li><a href="#">Gluten full</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <form action="upload.php" enctype="multipart/form-data" method="POST">
        <div class="form-group">
          <label for="FormControl1">Exemple de telechargement</label>
          <input type="file" class="form-control-file" id="FormControlFile1" name="files[]" multiple>
          <input type="submit" value="telecharger">
        </div>
      </form>
      <br>';
     
      $files = scandir('assets/Upload');

      $nb_photos = 0;
      for ($i=0;$i<count($files);$i++) {
          if (!is_dir($files[$i])) {
              //echo '<pre>'.print_r($files, true).'</pre>';
              $nb_photos += 1;
          
              echo $nb_photos;
          
          
              echo'

      <section class="cookies continer-fluid">
        <div class="row">
          <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3">
            <figure class="thumbnail text-center">
              <img src="assets/Upload/'.$files[$i].'" alt="cookies choclate chips" class="img-responsive">
              <figcaption class="caption">
                <h3>Pecan nuts</h3>
                <p>Cooked by Penny !</p>
                <a href="?add_to_cart=46" class="btn btn-primary">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                </a>
                <a href="?sup='.$files[$i].'" class="btn btn-primary">supprimer</a>
              </figcaption>
            </figure>
          </div>';
          
      }}
      echo'
    
      
        </div>
      </section>
      <footer>
        <nav class="navbar navbar-default">
          <div class="container-fluid">

            <!-- Collect the nav links, forms, and other content for toggling -->
            <ul class="nav navbar-nav ">
              <li><a href="#">Conditions générales</a></li>
              <li><a href="#">Privacy</a></li>
              <li><a href="#">À propos</a></li>
              <li><a href="#">Recrutement</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
        </nav>
      </footer>
      <!-- Latest compiled and minified Bootstrap JavaScript + JQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
      </script>
  </body>

</html>';