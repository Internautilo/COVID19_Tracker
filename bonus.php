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
        <div class="row justify-content-center mt-5">

            <?php if (isset($_POST['pais1']) && isset($_POST['pais2'])) {
                $i = 0;
                for ($i = 0; $i < 2; $i++) {
                    $pais = $_POST["pais" . $i + 1];

                    $response = $apiCovid->getResponse($pais);
                    if ($i == 0) {
                        $justify = "end";
                    } else {
                        $justify = "start";
                    }

                    $totalConfirmados = 0;
                    $totalMortos = 0;
                    $totalConfirmados1;
                    $totalConfirmados2;
                    $totalMortos1;
                    $totalMortos2;
                    foreach ($response as $estado) {
                        $totalConfirmados += $estado->Confirmados;
                        $totalMortos += $estado->Mortos;
                    }
                    if ($i == 0) {
                        $totalConfirmados1 = $totalConfirmados;
                        $totalMortos1 = $totalMortos;
                    } else {
                        $totalConfirmados2 = $totalConfirmados;
                        $totalMortos2 = $totalMortos;
                    }
                    ?>
                    <div class="col-sm-2 mt-2 mb-3 mx-5 border border-2 rounded pb-4">
                        <div class="container">
                            <div class="mt-2 text-<?= $justify ?>">
                                <h2 class="bold">
                                    <?= $estado->Pais ?>
                                </h2>
                            </div>
                            <div class="mt-3 text-<?= $justify ?>">
                                <label for="confirmados" class="form-label">Casos Confirmados</label>
                                <input type="text" class="form-control mb-3 text-<?= $justify ?>" id="confirmados" disabled
                                    readonly placeholder="Número de Mortes" value="<?= $totalConfirmados ?>">
                                <label for="mortes" class="form-label">Mortes</label>
                                <input type="text" class="form-control text-<?= $justify ?>" id="mortes" disabled readonly
                                    placeholder="Número de Mortes" value="<?= $totalMortos ?>">
                            </div>
                        </div>
                    </div>

                <?php }

                $direfencaConfirmados = ($totalConfirmados1 > $totalConfirmados2) ? ($totalConfirmados1 - $totalConfirmados2) : ($totalConfirmados2 - $totalConfirmados1);
                $diferencaMortos = ($totalMortos1 > $totalMortos2) ? ($totalMortos1 - $totalMortos2) : ($totalMortos2 - $totalMortos1);
                ?>
                <hr class="invisible" style="height: 100px">
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-4 mt-2 mb-3 mx-2 border border-2 rounded pb-4">
                    <div class="container">
                        <div class="mt-2 text-center">
                            <h2 class="bold">
                                Diferença
                            </h2>
                        </div>
                        <div class="mt-3 text-center">
                            <label for="confirmados" class="form-label">Casos Confirmados</label>
                            <input type="text" class="form-control mb-3 text-center" id="confirmados" disabled readonly
                                placeholder="Número de Mortes" value="<?= $direfencaConfirmados ?>">
                            <label for="mortes" class="form-label">Mortes</label>
                            <input type="text" class="form-control text-center" id="mortes" disabled readonly
                                placeholder="Número de Mortes" value="<?= $diferencaMortos ?>">
                        </div>
                    </div>
                </div>
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