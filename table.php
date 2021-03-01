<?php
$BASE = "../files/";

$currentpath = $_POST["currentPath"];
var_dump($currentpath);
$a = array_diff(scandir($BASE . $currentpath), array('.'));
foreach ($a as $file){
    $path = $BASE . $currentpath . $file;
    if (!strcmp($file, '..')){
        if (strcmp($path, $BASE . "..")){
            echo "<tr>
                    <td><i class='bi bi-folder-symlink'></i>&nbsp;
                        <a href='$path'>parent folder</a>
                    </td>
                    <td></td>
                    <td></td>
                   </tr>";
        }
    }
    else if (is_file($path)){
        echo "<tr>
                    <td>
                        <a href='$path'>{$file}</a>
                    </td>
                    <td>" . (filesize($path)) >> 10 . " kB" . "</td>
                    <td>" . date("F d Y H:i:s", filemtime($path)) . "</td>
                   </tr>";
    }else{
        echo "<tr>
                    <td><i class='bi bi-folder'></i>&nbsp;{$file}</td>
                    <td></td>
                    <td></td>
                   </tr>";
    }//<a href="?path=../files/filee">filee</a> for one dir
}
?>