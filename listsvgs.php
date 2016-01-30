<?php

// $foldername = ISSETp[]


$folder = $_POST['icon_category'];
$filenameArray = array();
$handle = opendir(dirname(realpath(__FILE__)).'/svg/'.$folder.'/');
    while($file = readdir($handle)){
        if($file !== '.' && $file !== '..'){
            array_push($filenameArray, "svg/".$folder."/$file");
        }
    }

echo json_encode($filenameArray);
?>  