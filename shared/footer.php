<?php
use Database\DbConnection;

try {
    $conn = DbConnection::getConnection();

    $query = "SELECT * FROM consultaapi ORDER BY id DESC LIMIT 1";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
    throw $th;
}

?>
<footer class="footer mt-auto py-2 bg-body-tertiary fixed-bottom">
    <div class="container text-center">
        <span class="text-body-secondary">Ultima pesquisa (
            <?php if (is_array($result)) {
                echo $result["pais"] . " - " . $result["data"];
            } else {
                echo " - ";
            } ?> )
        </span>
    </div>
</footer>