<!DOCTYPE html>
<html>
<head>
    <title>Upload Picture</title>
</head>
<body>
    <h2>Upload a Picture</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>
