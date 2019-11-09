
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Preview and Upload PHP</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="container">

    <form action="processImage.php" method="post"  name="save_avatar"  enctype="multipart/form-data">
        <input type="file" name="avatar" id="avatar" >
        <input type="submit" name="save_avatar" value="upload">
    </form>

</div>
</body>
</html>