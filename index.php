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
            <h2>View files</h2>
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
        if(isset($_GET["dir"])){
            $currentpath = $_GET["dir"].'/';
        }else{
            $currentpath="/home/xrichterova/public_html/files/";  // "../files/.."
        }
        $a = array_diff(scandir($currentpath), array('.'));
        foreach ($a as $file){
            $path = $currentpath . $file;
            if (!strcmp($file, '..')){
                if (strcmp($path, "/home/xrichterova/public_html/files/..")){ //subdirectories
                    $parentPath = realpath($path);
                    echo "<tr>
                    <td><i class='bi bi-arrow-90deg-left'></i>&nbsp;
                        <a href='index.php?dir={$parentPath}'>Parent directory</a>
                    </td>
                    <td></td>
                    <td></td>
                   </tr>";
                }
            }
            else if (is_file($path)){
                echo "<tr>
                    <td>{$file}</td>
                    <td>" . (filesize($path)) >> 10 . " kB" . "</td>
                    <td>" . date("m.d.Y H:i:s", filemtime($path)) . "</td>
                   </tr>";
            }else{

                echo "<tr>
                    <td><i class='bi bi-folder'></i>&nbsp;
                        <a href='index.php?dir={$path}'>{$file}</a></td>
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
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="js/sort.js"></script>
</body>
</html>
