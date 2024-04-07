<?php
use App\Controllers\Covid19Controller;
use App\Controllers\PaisesDisponiveisController;

require_once "./vendor/autoload.php";

$apiCovid = new Covid19Controller;
$apiPaises = new PaisesDisponiveisController;
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID-19 Tracker</title>
    <?php require_once __DIR__ . "/shared/navbar.php"; ?>
</head>

<body data-bs-theme="dark">

    <div class="container-fluid justify-content-center align-items-center">

        <div class="container text-center mt-5">
            <h2>Selecione dois paises</h2>
        </div>
        <form action="./bonus.php" method="post">
            <div class="row justify-content-center">
                <div class="col-sm-2 text-center mb-5">
                    <div class="container">
                        <select class="form-select mt-5 mb-3" id="pais1" name="pais1" aria-label="Seleção de País">
                            <option selected>Selecionar pais</option>
                            <?php
                            $paises = $apiPaises->getResponse();
                            foreach ($paises as $pais) { ?>
                                <option value="<?= $pais ?>">
                                    <?= $pais ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2 text-center mb-5">
                    <div class="container">
                        <select class="form-select mt-5 mb-3" id="pais2" name="pais2" aria-label="Seleção de País">
                            <option selected>Selecionar pais</option>
                            <?php
                            foreach ($paises as $pais) { ?>
                                <option value="<?= $pais ?>">
                                    <?= $pais ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="container text-center">
                    <button type="submit" class="btn btn-primary">Comparar Paises</button>
                </div>
            </div>
        </form>
        <div class="row justify-content-around mt-5">

            <?php if (isset($_POST['pais1']) && isset($_POST['pais2'])) {
                $i = 0;
                for ($i = 0; $i < 2; $i++) {
                    $pais = $_POST["pais" . $i + 1];

                    $response = $apiCovid->getResponse($pais);

                    $totalConfirmados = 0;
                    $totalMortos = 0;
                    foreach ($response as $estado) {
                        $totalConfirmados += $estado->Confirmados;
                        $totalMortos += $estado->Mortos;
                    } ?>


                    <div class="col-sm-5 mt-2 mb-3 mx-2 border border-2 rounded pb-4">
                        <div class="container">
                            <div class="mt-2">
                                <h2 class="bold">
                                    <?= $estado->Pais ?>
                                </h2>
                            </div>
                            <div class="mt-3">
                                <label for="confirmados" class="form-label">Casos Confirmados</label>
                                <input type="text" class="form-control mb-3" id="confirmados" disabled readonly
                                    placeholder="Número de Mortes" value="<?= $totalConfirmados ?>">
                                <label for="mortes" class="form-label">Mortes</label>
                                <input type="text" class="form-control" id="mortes" disabled readonly
                                    placeholder="Número de Mortes" value="<?= $totalMortos ?>">
                            </div>
                        </div>
                    </div>

                <?php } ?>
                <hr class="invisible" style="height: 100px">
            </div>

        <?php } else { ?>
            <div class="row">
                <div class="col-sm mt-5">
                    <div class="container">
                        <div class="mt-5">
                            <label for="confirmados" class="form-label">Casos Confirmados</label>
                            <input type="text" class="form-control mb-3" id="confirmados" disabled readonly
                                placeholder="Número de Mortes">
                            <label for="mortes" class="form-label">Mortes</label>
                            <input type="text" class="form-control" id="mortes" disabled readonly
                                placeholder="Número de Mortes">
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>


</body>

<footer>
    <?php require_once __DIR__ . '/shared/footer.php'; ?>
</footer>

</html>