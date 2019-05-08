<?php 
echo '<pre>',print_r($_FILES),'<pre>';
//declaration du tableau d'erreurs
$errors= array();
//chemin de destination du file
$target_dir = "assets/Upload/";
if (count($_FILES['files']['name'])>0) {
    for ($i=0;$i<count($_FILES['files']['name']);$i++) {
        echo '$i = '.$i;
        //
        if(($_FILES['files']['type'][$i] == 'image/gif') || ($_FILES['files']['type'][$i] == 'image/jpg') || ($_FILES['files']['type'][$i] == 'image/png'))
        {
           echo ' .ok type correct';
           if(($_FILES['files']['size'][$i]) <= 1048576)
           {
            echo ' .ok taille est bonne';
            $rename='image'.uniqid().'.'.str_replace("image/", "", $_FILES['files']['type'][$i]);
            if (move_uploaded_file($_FILES["files"]["tmp_name"][$i],$target_dir.$rename))
             {
                array_push($errors, "Le fichier ". $_FILES["files"]["name"][$i]. " a bien été uploader sous le nom ");
                echo $errors[$i];
             }
             else
             {
                array_push($errors, "le fichier na pas pu etre uploader.");
            }
           }
           else{
            echo ' . taille superieure a 1Mega';
            die();
           }
        }
        else
        {
           echo ' . type non png ,jpg ou gif';
           die();
        }


    }
}
$files = scandir($target_dir);

$nb_photos = 0;
for ($i=0;$i<count($files);$i++) {
    if (!is_dir($files[$i])) {
        //echo '<pre>'.print_r($files, true).'</pre>';
        $nb_photos += 1;
    }
}
