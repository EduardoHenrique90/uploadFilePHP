<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload with php</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Upload a File:
        <input type="file" name="myfile" id="fileToUpload">
        <input type="submit" name="submit" value="Upload File Now" >
    </form>
</body>
</html>