<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Richterova">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Upload files</title>
</head>

<body class="bg-light">

<div class="container">
    <main>
        <div class="py-5 text-center">
            <h2>View & upload files</h2>
            <p class="lead">Tabuľka súborov</p>
            <button type="button" onclick="window.location.href='selectToUpload.php';" class="btn btn-primary my-2">
                <i class="bi bi-file-earmark-plus"></i>
                Nahrať súbor
            </button>
        </div>
    </main>

    <table class="table" id="filesTable">
        <thead>
        <tr>
            <th scope="col" data-sortable="true">Meno súboru</th>
            <th scope="col" data-sortable="true">Veľkosť</th>
            <th scope="col" data-sortable="true">Dátum</th>
        </tr>
        </thead>
        <tbody id="tableBody">
        <?php
        if(isset($_GET["currentPath"])){
            $currentpath = $_GET["currentPath"].'/';
        }else{
            $currentpath="../files/";
        }
        $a = array_diff(scandir($currentpath), array('.'));
        foreach ($a as $file){
            $path = $currentpath . $file;
            if (!strcmp($file, '..')){
                if (strcmp($path, "../files/..")){ //subdirectories
                    $string = substr($path, 0, -3);
                    $right_length = (strlen(strrchr($string, '/')) - 1);
                    $left_length = (strlen($string) - $right_length - 1);
                    $parentPath = substr($string, 0, ($left_length));

                    echo "<tr>
                    <td><i class='bi bi-folder-symlink'></i>&nbsp;
                        <a href='index.php?currentPath={$parentPath}'>parent folder</a>
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
                    <td><i class='bi bi-folder'></i>&nbsp;
                        <a href='index.php?currentPath={$path}'>{$file}</a></td>
                    <td></td>
                    <td></td>
                   </tr>";
            }
        }
        ?>
        </tbody>
    </table>

    <footer class="my-3 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy;2021 WEBTECH2 - Richterová </p>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="js/sort.js"></script>
<script src="js/javascript.js"></script>
</body>
</html>
