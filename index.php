<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php include __DIR__ . '/style.html'; ?>

    <script>
        <?php if (isset($_SESSION["upload_message"])) : ?>
            alert("<?php echo $_SESSION["upload_message"]; ?>");
            <?php unset($_SESSION["upload_message"]); ?>
        <?php endif; ?>
    </script>
</head>

<body>
    <div class="container vh-100">
        <div class="row d-flex justify-content-center align-items-center vh-100">
            <div class="col col-md-8 col-lg-5 bg-white">

                <img src="img/logo.jpg" alt="logo" class="object-fit-cover w-100">

                <form action="./index-code.php" method="POST" enctype="multipart/form-data">

                    <label for="insert">File :</label>

                    <input id="insert" name="photo" type="file">

                    <input type="submit" name="submit" value="UPLOAD IMAGE">

                    <p>Only .jpg, .jpeg, .gif, .png formats are allowed with a maximum size of 5MB</p>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>