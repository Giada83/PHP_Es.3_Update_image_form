<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $allowed_extensions = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $name_file = $_FILES["photo"]["name"];
        $type_file = $_FILES["photo"]["type"];
        $size_file = $_FILES["photo"]["size"];

        $extensions = pathinfo($name_file, PATHINFO_EXTENSION);
        if (!array_key_exists($extensions, $allowed_extensions)) {
            $_SESSION["upload_message"] = "Error: Please select a valid format";
            header("Location: index.php");
            exit();
        } else {
            $max_size = 5 * 1024 * 1024;
            if ($size_file > $max_size) {
                $_SESSION["upload_message"] = "Error: the size is greater than the 5mb limit";
                header("Location: index.php");
                exit();
            } else {
                if (in_array($type_file, $allowed_extensions)) {
                    if (file_exists("update/" . $name_file)) {
                        $_SESSION["upload_message"] = "$name_file already exists";
                        header("Location: index.php");
                        exit();
                    } else {
                        move_uploaded_file($_FILES["photo"]["tmp_name"], "update/" . $name_file);
                        $_SESSION["upload_message"] = "Your file has been uploaded successfully";
                        header("Location: index.php");
                        exit();
                    }
                } else {
                    $_SESSION["upload_message"] = "Error: There was a problem uploading your file. Try again";
                    header("Location: index.php");
                    exit();
                }
            }
        }
    } else {
        $_SESSION["upload_message"] = "Error: " . $_FILES["photo"]["error"];
        header("Location: index.php");
        exit();
    }
}
