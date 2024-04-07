<?php
use Database\DbConnection;

$conn = DbConnection::getConnection();

$query = "SELECT * FROM consultaApi ORDER BY id DESC LIMIT 1";

$stmt = $conn->prepare($query);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<footer class="footer mt-auto py-2 bg-body-tertiary fixed-bottom">
    <div class="container text-center">
        <span class="text-body-secondary">Ultima pesquisa (
            <?= $result["pais"] . " - " . $result["data"] ?>)
        </span>
    </div>
</footer>

<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>