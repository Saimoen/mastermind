<?php

session_start();

// Récupérer la variable $solution depuis la session
$solution = $_SESSION['solution'];

unset($_SESSION['solution']);
unset($_SESSION['essaies']);

?>

<!DOCTYPE html>
<html>
<?php require_once 'includes/head.php' ?>
<title>Bats les meilleurs scores !</title>

<body>
    <div class="container1">
        <?php require_once 'includes/header.php' ?>
        <div class="content">
            <div class="todo-container">
                <h1>C'est gagné !</h1>
                <!-- Afficher les meilleurs scores -->
                    <a href="/play-page.php" class="btn btn-primary">Rejouer</a>
                    <a href="/index.php" class="btn btn-primary">Menu</a>
            </div>
        </div>
        <?php require_once 'includes/footer.php' ?>
    </div>
</body>

</html>