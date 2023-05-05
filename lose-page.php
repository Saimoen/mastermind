<?php

// Démarrer la session
session_start();

// Récupérer la variable $solution depuis la session
$tempSolution = $_SESSION['tempSolution']


?>

<!DOCTYPE html>
<html>
<?php require_once 'includes/head.php' ?>
<title></title>

<body>
    <div style="height: 83vh;">
        <?php require_once 'includes/header.php' ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">C'est perdu !</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h1>La solution était :</h1>
                    <ul class="list-unstyled">

                        <?php if (isset($tempSolution)) : ?>
                            <li class="text-center">
                                <h3><?= implode(', ', $tempSolution) ?></h3>
                            </li>
                            <?php endif ?>
                    </ul>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-6">
                    <a href="/play-page.php" class="btn btn-primary">Relancer</a>
                    <a href="/index.php" class="btn btn-primary">Menu</a>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'includes/footer.php' ?>
</body>

</html>