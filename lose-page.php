<?php

    // Démarrer la session
session_start();

// Récupérer la variable $solution depuis la session
$tempSolution = $_SESSION['tempSolution']


?>

<!DOCTYPE html>
<html>
<?php require_once 'includes/head.php' ?>
<title>Retentes ta chance !</title>

<body>
    <div class="container1">
        <div class="content">
            <div class="todo-container">
                <h1>C'est perdu !</h1>
                <!-- Afficher les tentatives -->
                <a href="/play-page.php" class="btn btn-primary">Rejouer</a>
                <a href="/index.php" class="btn btn-primary">Menu</a>
                 <?php if (isset($tempSolution)) : ?>
                        <?php foreach ($tempSolution as $value) : ?>
                            <li><?= implode(', ', $tempSolution) ?></li>
                        <?php endforeach; ?>
                    <?php endif ?>
                </form>
            </div>
        </div>
        <?php require_once 'includes/footer.php' ?>
    </div>
</body>
</html>