<?php
ini_set('display_errors', 0);

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>El Backend de la Suerte 2023 - Apocalypse edition</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
          crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</head>

<body>
<div>
    <nav class="navbar navbar-dark bg-primary sticky-top">
        <a href="#" class="navbar-brand">
            El Backend de la Muerte
        </a>

        <div style="color: white; font-weight: bolder">
            <p>Welcome to Apocalypse!</p>
        </div>
    </nav>
</div>

<div>
    <?php
    include 'db.php';
    include 'helper/functions.php';
    if (isset($_POST["req"])) {
        switch ($_POST["req"]) {
            
            case 'neworder':
                $result = setOrder($mysqli, $_POST);
                break;

            case 'deleteorders':
                deleteorders($mysqli);
                break;

            default:
                break;
        }
    }
    include 'content.php';
    ?>
</div>

</body>
</html>