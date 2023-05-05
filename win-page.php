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
<title></title>

<body>
    <div style="height: 83vh;">
        <?php require_once 'includes/header.php' ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">C'est gagné !</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h1>Bats les meilleurs scores :</h1>
                    <table class="table table-striped">
                        <thead>
                            <!-- Afficher les meilleurs scores -->
                            <tr>
                                <th scope="col">Gamertag</th>
                                <th scope="col">Temps</th>
                                <th scope="col">Indices utilisés</th>
                                <th scope="col">Essaies utilisés</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
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