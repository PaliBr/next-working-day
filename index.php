<?php

require("assets/functions/functions.php");

?>
<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendár | Zadanie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/lib/jquery-ui/jquery-ui.css">
</head>

<body>

    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-8 offset-2 my-5 p-5 shadow rounded-lg">
                <form method="POST">
                    <div class="form-group">
                        <label for="emailInput">Emailová adresa</label>
                        <input type="email" class="form-control" id="emailInput" name="email" aria-describedby="emailHelp" required value="<?php echo (!empty($email)) ? $email : ''; ?>">
                        <?php
                        if (isset($error) && !empty($error)) {
                            switch ($error) {
                                case in_array("wrong_email", $error):
                                    echo '<small class="text-danger">Zadali ste nesprávny email</small>';
                                    break;
                                case in_array("empty_email", $error):
                                    echo '<small class="text-danger">Vyplňte emailovú adresu</small>';
                                    break;
                            }
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="datepicker">Dátum</label>
                        <input type="text" class="form-control" id="datepicker" name="date" autocomplete="off" value="<?php echo (!empty($date)) ? $date : ''; ?>">
                        <?php
                        if (isset($error) && !empty($error)) {
                            switch ($error) {
                                case in_array("wrong_date", $error):
                                    echo '<small class="text-danger">Zadali ste nesprávny formát dátumu</small>';
                                    break;
                                case in_array("empty_date", $error):
                                    echo '<small class="text-danger">Vyberte dátum</small>';
                                    break;
                            }
                        }
                        ?>
                    </div>
                    <button type="submit" class="btn btn-primary" name="form-submit">Odoslať</button>
                </form>
                <?php if(isset($result) && !empty($result)){ ?>
                    <div class="text-info font-weight-bold py-3"><?php echo $result; ?></div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="assets/lib/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>