<?php
use App\Controllers\Covid19Controller;

require_once "./vendor/autoload.php";
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

        <div class="row">
            <div class="col-sm text-center mb-5">
                <form action="." method="post">
                    <div class="container text-center mt-5">
                        <h3>Seleção de País</h3>
                    </div>
                    <div class="container">
                        <select class="form-select mt-5 mb-3" id="pais" name="pais" aria-label="Seleção de País">
                            <option selected>Selecionar pais</option>
                            <option value="Australia">Australia</option>
                            <option value="Brazil">Brasil</option>
                            <option value="Canada">Canada</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Selecionar</button>
                    </div>
                </form>
            </div>
        </div>

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
                $apiCovid = new Covid19Controller;
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