<?php

const ERROR_REQUIRED = 'Veuillez renseigner une proposition';
const ERROR_TOO_SHORT = 'Veuillez entrer au moins 4 caractères';
const MAX_ATTEMPTS = 10;

$error = '';
$essaies = $_SESSION['essaies'] ?? 0;
$indications = [];
$tentatives = [];

session_start();

if (!isset($_SESSION['solution'])) {
    // Générer la solution initiale
    $solution =  [];
    for ($i = 0; $i < 4; $i++) {
        $ran = rand(1, 6);
        array_push($solution, $ran);
    }
    $_SESSION['solution'] = $solution;
} else {
    $solution = $_SESSION['solution'];
}

/** Récupère les valeurs des champs **/
$choix1 = $_POST['choix1'] ?? '';
$choix2 = $_POST['choix2'] ?? '';
$choix3 = $_POST['choix3'] ?? '';
$choix4 = $_POST['choix4'] ?? '';
$joueurProposition = array(
    $_POST['choix1'] ?? '',
    $_POST['choix2'] ?? '',
    $_POST['choix3'] ?? '',
    $_POST['choix4'] ?? ''
);


/** Vérifie qu'il s'agit d'un form de type POST **/
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /** Incrémente la variable $essaies  **/
    if (!isset($_SESSION['essaies'])) {
        $_SESSION['essaies'] = 1;
    } else {
        $_SESSION['essaies'] += 1;
    }
    $essaies = $_SESSION['essaies'];
    $_SESSION['essaies'] = $essaies;

    if (array_diff($joueurProposition, $solution) !== array_diff($solution, $joueurProposition)) {
      array_push($tentatives, $joueurProposition);
    }

    /** Vérifie les erreurs des inputs **/
    if (!$joueurProposition) {
        $error = ERROR_REQUIRED;
    } elseif (count($joueurProposition) != 4) {
        $error = ERROR_TOO_SHORT;
    }

    foreach ($joueurProposition as $key => $value) {
        if ($solution[$key] == $value) {
            $indication = "La couleur à la position " . ($key + 1) . " est à la bonne place";
            array_push($indications, $indication);
        } elseif (in_array($value, $solution)) {
            $indication = $value . " est dans la solution";
            array_push($indications, $indication);
        }
    }

    if (array_diff($joueurProposition, $solution) === array_diff($solution, $joueurProposition)) {
        header('Location: /win-page.php');
        unset($_SESSION['essaies']);
        exit;
    } elseif ($essaies >= MAX_ATTEMPTS) {
        header('Location: /lose-page.php');
        unset($_SESSION['essaies']);
        $tempSolution = $_SESSION['solution'];
        unset($_SESSION['solution']);
        $_SESSION['tempSolution'] = $tempSolution;
        exit;
    }
}

?>



<!DOCTYPE html>
<html>
<?php require_once 'includes/head.php' ?>

<body>
    <?php require_once 'includes/header.php' ?>
    <div class="container my-5" style="height: 39vh">
        <h1> C'est à toi de jouer !</h1>
        <form action="/play-page.php" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-2 my-4">
                        <div id="choix1" style="width: 100px; height: 100px;border-radius: 5px"></div>
                        <select class="form-select my-4" name="choix1" aria-label="Default select example" onchange="changeCouleur1(this)">
                            <option selected>Choisir une couleur</option>
                            <option value="1">Blanc</option>
                            <option value="2">Noire</option>
                            <option value="3">Vert</option>
                            <option value="4">Jaune</option>
                            <option value="5">Rouge</option>
                            <option value="6">Bleu</option>
                        </select>
                    </div>
                    <div class="col-2 my-4">
                        <div id="choix2" style="width: 100px; height: 100px;border-radius: 5px"></div>
                        <select class="form-select my-4" name="choix2" aria-label="Default select example" onchange="changeCouleur2(this)">
                            <option selected>Choisir une couleur</option>
                            <option value="1">Blanc</option>
                            <option value="2">Noire</option>
                            <option value="3">Vert</option>
                            <option value="4">Jaune</option>
                            <option value="5">Rouge</option>
                            <option value="6">Bleu</option>
                        </select>
                    </div>
                    <div class="col-2 my-4">
                        <div id="choix3" style="width: 100px; height: 100px;border-radius: 5px"></div>
                        <select class="form-select my-4" name="choix3" aria-label="Default select example" onchange="changeCouleur3(this)">
                            <option selected>Choisir une couleur</option>
                            <option value="1">Blanc</option>
                            <option value="2">Noire</option>
                            <option value="3">Vert</option>
                            <option value="4">Jaune</option>
                            <option value="5">Rouge</option>
                            <option value="6">Bleu</option>
                        </select>
                    </div>
                    <div class="col-2 my-4">
                        <div id="choix4" style="width: 100px; height: 100px;border-radius: 5px"></div>
                        <select class="form-select my-4" name="choix4" aria-label="Default select example" onchange="changeCouleur4(this)">
                            <option selected>Choisir une couleur</option>
                            <option value="1">Blanc</option>
                            <option value="2">Noire</option>
                            <option value="3">Vert</option>
                            <option value="4">Jaune</option>
                            <option value="5">Rouge</option>
                            <option value="6">Bleu</option>
                        </select>
                    </div>
                    <div class="col-2 my-4">
                        <div id="choix4" style="width: 100px; height: 100px;"></div>
                        <button class="btn btn-primary my-4">Jouer</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container" style="height: 29vh">
        <div class="row">
            <div class="col-4">
                <h3> <i class="fa-solid fa-dice-three mx-3"></i>Nombres d'essaies : <?= $essaies ?></h3>
            </div>
            <div class="col-4">
                <h3> <i class="fa-solid fa-dice-three mx-3"></i>Indications : </h3>
                <ul class="list-unstyled">
                <?php if (isset($indications)) : ?>
                        <?php foreach ($indications as $value) : ?>
                            <li><?= implode(', ', $indications) ?></li>
                        <?php endforeach; ?>
                    <?php endif ?>
                </ul>
            </div>
            <div class="col-4">
                <h3> <i class="fa-solid fa-dice-three mx-3"></i>Tentatives :</h3>
                <ul class="list-unstyled">
                    <?php if (isset($tentatives)) : ?>
                        <?php foreach ($tentatives as $tentative) : ?>
                            <li><?= implode(', ', $tentative) ?></li>
                        <?php endforeach; ?>
                    <?php endif ?>
                </ul>
            </div>
        </div>



    </div>
    </div>
</div>
<?php require_once 'includes/footer.php' ?>
</body>

</html>