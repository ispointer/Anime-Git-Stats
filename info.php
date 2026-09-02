<?php
/**
 * Created by aantik
 * RevDex 📚
 */
include "RevDex.php";

function getGIT($user)
{

/*$url = "https://github.com/".$user;

$html = file_get_html($url);

$data = array();*/

//$user = $_GET['user'];

$url = "https://github.com/".$user;

$html = file_get_html($url);

$data = array();


/*
// Username
$title = $html->find("title",0);
$data["username"] = trim(str_replace(" · GitHub","", $title->plaintext));

*/

// Followers
$followers = $html->find("a[href$=\"?tab=followers\"] span",0);
$data["followers"] = trim($followers->plaintext);

/*
// Following
$following = $html->find("a[href$=\"?tab=following\"] span",0);
$data["following"] = trim($following->plaintext);



// Repository
$repo = $html->find("a[href$=\"?tab=repositories\"] span",0);
$data["repositories"] = trim($repo->plaintext);


// Avatar
$avatar = $html->find("img.avatar",0);
$data["avatar"] = $avatar->src;


// Bio
$bio = $html->find(".js-user-profile-bio",0);
$data["bio"] = trim($bio->plaintext);
*/


///header("Content-Type: application/json");

///echo json_encode($data,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

return $data;

}

?>