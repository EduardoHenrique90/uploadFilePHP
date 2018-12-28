<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
header('Access-Control-Allow-Credentials: true');
// Nas versões do PHP anteriores a 4.1.0, $HTTP_POST_FILES deve ser utilizado ao invés
// de $_FILES.

$currentDir = getcwd();
$uploadDirectory = "/invoices/";
// $uploadPath = $currentDir . $uploadDirectory . basename($_FILES['userfile']['name']); 
// $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

$errors = []; // Store all foreseen and unforseen errors here

$dir = $_POST['invoice_id'];
$fileName = $_FILES['file']['name'];
$fileSize = $_FILES['file']['size'];
$fileTmpName  = $_FILES['file']['tmp_name'];
$fileType = $_FILES['file']['type'];
$fileExtension = strtolower(end(explode('.',$fileName)));
mkdir($currentDir . $uploadDirectory.'/'.$dir, 0755);
$uploadPath = $currentDir . $uploadDirectory . $dir . '/' . basename($fileName); 

// if (isset($_POST['submit'])) {

    if ($fileSize > 2000000000000) {
        $errors[] = "This file is more than 2gb. Sorry, it has to be less than or equal to 2gb";
    }

    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
            return json_encode(['1']);
        } else {
            return 0;
        }
    } else {
        foreach ($errors as $error) {
            return $error . "These are the errors" . "\n";
        }
    }

?>