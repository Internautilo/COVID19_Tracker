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
        <form action="." method="post">
            <div class="row justify-content-center">
                <div class="col-sm-2 text-center mb-5">
                    <div class="container">
                        <select class="form-select mt-5 mb-3" id="pais1" name="pais1" aria-label="Seleção de País">
                            <option selected>Selecionar pais</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2 text-center mb-5">
                    <div class="container">
                        <select class="form-select mt-5 mb-3" id="pais2" name="pais2" aria-label="Seleção de País">
                            <option selected>Selecionar pais</option>
                        </select>
                    </div>
                </div>
                <div class="container text-center">
                    <button type="submit" class="btn btn-primary">Comparar Paises</button>
                </div>
            </div>
        </form>

        <?php if (isset($_POST['pais'])) { ?>
            <div class="row justify-content-center">
                <div class="col-sm-2 my-5 bg-success text-center rounded rounded-2">
                    <h1>
                        <?= $_POST['pais'] ?>
                    </h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                $response = $apiCovid->getResponse($_POST['pais']);

                foreach ($response as $estado) {
                    ?>
                    <div class="col-sm-2 mt-2 mb-3 mx-2 border border-2 rounded pb-4">
                        <div class="container">
                            <div class="mt-2">
                                <h5 class="bold">
                                    <?= $estado->ProvinciaEstado ?>
                                </h5>
                            </div>
                            <div class="mt-3">
                                <label for="confirmados" class="form-label">Casos Confirmados</label>
                                <input type="text" class="form-control mb-3" id="confirmados" disabled readonly
                                    placeholder="Número de Mortes" value="<?= $estado->Confirmados ?>">
                                <label for="mortes" class="form-label">Mortes</label>
                                <input type="text" class="form-control" id="mortes" disabled readonly
                                    placeholder="Número de Mortes" value="<?= $estado->Mortos ?>">
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <hr class="invisible" style="height: 100px">

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