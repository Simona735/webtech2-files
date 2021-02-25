<?php
header('Content-Type: application/json; charset=utf-8');
$response = array();
try {
    // Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it invalid.
    if (
        !isset($_FILES['fileToUpload']['error']) ||
        is_array($_FILES['fileToUpload']['error'])
    ) {
        throw new RuntimeException('Invalid parameters.');
    }

    // Check $_FILES['fileToUpload']['error'] value.
    switch ($_FILES['fileToUpload']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }

    // You should also check filesize here.
    if ($_FILES['fileToUpload']['size'] > 2000000) {
        throw new RuntimeException('Exceeded filesize limit.');
    }

    // DO NOT TRUST $_FILES['fileToUpload']['mime'] VALUE !!
    // Check MIME Type by yourself.
    $ext = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);


    // You should name it uniquely.
    // DO NOT USE $_FILES['fileToUpload']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.

    $filename = empty($_POST['filename']) ? "file" : $_POST['filename'];
    if (!move_uploaded_file(
        $_FILES['fileToUpload']['tmp_name'], "../files/". $filename . '_' . time() . "." . $ext
    )) {
        throw new RuntimeException('Failed to move uploaded file.');
    }
    $response = array(
        "status" => "success",
        "error" => false,
        "message" => "File uploaded successfully"
    );
    echo json_encode($response);

} catch (RuntimeException $e) {
    $response = array(
        "status" => "error",
        "error" => true,
        "message" => $e->getMessage()
    );
    echo json_encode($response);
}