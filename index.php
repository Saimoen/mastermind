<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: /play-page.php');
}


?>

<!DOCTYPE html>
<html>
<?php require_once 'includes/head.php' ?>

<body id="page-top">
        <!-- Navigation-->
        <?php require_once 'includes/header.php' ?>

        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Bienvenue sur le MasterMind!</div>
                <div class="masthead-heading text-uppercase">Commencer une partie</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="/play-page.php">Jouer</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Présentation</h2>
                    <h3 class="section-subheading text-muted">Qu'est-ce que le MasterMind ?</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa-solid fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Développement de la logique</h4>
                        <p class="text-muted">Le Mastermind est un jeu qui demande de la réflexion, de la logique et de la pensée stratégique. Ce jeu peut donc être un excellent moyen de développer ces compétences.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa-solid fa-puzzle-piece fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Un jeu simple à apprendre</h4>
                        <p class="text-muted"> Le Mastermind est un jeu simple à comprendre et à apprendre, mais il peut être difficile à maîtriser. Ce qui en fait un jeu idéal pour les débutants ou pour ceux qui cherchent un passe-temps occasionnel.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Une expérience de jeu unique</h4>
                        <p class="text-muted"> Avec des millions de combinaisons possibles, chaque partie de Mastermind est unique. Même si vous jouez plusieurs fois, vous ne tomberez jamais sur la même combinaison de couleurs.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <?php require_once 'includes/footer.php' ?>
       
    </body>

</html>