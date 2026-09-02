<?php
/**
 * Created by aantik
 * RevDex 📚
 */
header("Content-Type: image/svg+xml");

include "info.php";


if(isset($_GET['num'])){

    $num = $_GET['num'];

}
else if(isset($_GET['git'])){

    $data = getGIT($_GET['git']);

    $num = $data['followers'];

}
else{

    $num = "0";

}

//$num = $_GET['num'];
//$num = $_REQUEST['num'];


$folder = "assets/";

$x = 0;
$width = 0;
$height = 100;


echo '<?xml version="1.0"?>';

echo '<svg xmlns="http://www.w3.org/2000/svg">';

for($i=0; $i<strlen($num); $i++)
{

    $char = strtoupper($num[$i]);

    $file = $folder.$char.".gif";


    if(file_exists($file))
    {

        $info = getimagesize($file);

        $w = $info[0];
        $h = $info[1];


        $image = base64_encode(file_get_contents($file));
        
        echo '<image 
        x="'.$x.'" 
        y="0"
        width="'.$w.'"
        height="'.$h.'"
        href="data:image/gif;base64,'.$image.'"/>';
        
        $x = $x + $w;

        $width = $width + $w;

    }

}
//echo $followers;
echo '</svg>';

?>