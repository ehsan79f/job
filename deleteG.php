<?php
/**
 * Created by PhpStorm.
 * User: Ehsan
 * Date: 10/21/2019
 * Time: 12:00 AM
 */
include 'db.php';
$data="1571602928-s2.jpg";
$dir = "images";
$dirHandle = opendir($dir);

$sql = "SELECT avatar FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($file = readdir($dirHandle)) {
        $flag=true;
        foreach ($result as $item) {
            echo $item["avatar"].'<br/>';
            if($item["avatar"]==$file) $flag=false;
        }
        if($flag) {
            unlink($dir.'/'.$file);
        }
    }
} else {
    echo "0 results";
}

