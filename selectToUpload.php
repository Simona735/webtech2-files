<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/upload.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Upload</title>
</head>
<body>

<main>
    <div class="py-5 text-center">
        <h2>Upload files</h2>
        <p class="lead">Nižšie môžete nahrať akýkoľvek súbor.</p>
        <button type="button" onclick="window.location.href='index.php';" class="btn btn-secondary my-2">Zobraziť súbory</button>
    </div>
</main>

<form method="POST" id="file-upload-form" class="uploader" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="filename" class="form-label">Názov súboru (bez prípony)</label>
        <input type="text" class="form-control" name="filename" id="filename" placeholder="File name">
    </div>

    <input id="fileToUpload" type="file" name="fileToUpload" accept="image/*" required />
    <p class="mb-1">Upload file</p>
    <label class="mb-3" for="fileToUpload" id="file-drag">
        <div id="start">
            <i class="bi bi-file-earmark-plus"></i>
            <div>Vyber alebo sem potiahni súbor</div>
        </div>
        <span id="file-upload-btn" class="btn-custom btn-primary">Vyber súbor</span>
        <div id="response" class="d-none">
            <strong id="messages">&nbsp;</strong>
        </div>
    </label>
    <div class="mt-3 text-center">
        <button type="button" id="submit" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
            </svg>
            Upload
        </button>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="js/fileUpload.js"></script>
</body>
</html>