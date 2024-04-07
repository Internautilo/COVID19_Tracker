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
                <form action="" method="post">
                    <div class="container text-center mt-5">
                        <h3>Seleção de País</h3>
                    </div>
                    <div class="container">
                        <select class="form-select mt-5 mb-3" aria-label="Seleção de País">
                            <option selected>Selecionar pais</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Brazil">Brasil</option>
                            <option value="Canada">Canada</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Selecionar</button>
                    </div>
                </form>
            </div>
        </div>
        <?php if (isset($_POST['pais'])) { ?>
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