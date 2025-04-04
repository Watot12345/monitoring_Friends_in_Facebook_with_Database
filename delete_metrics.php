<?php
include('config.php');

if (isset($_GET['id']) && isset($_GET['day'])) {
    $metrics_id = $_GET['id'];
    $day = $_GET['day'];

    // Delete specific day's metrics
    $stmt = $pdo->prepare("DELETE FROM Daily_Metrics WHERE Id = ?");
    $stmt->execute([$metrics_id]);

    header("Location: index.php");
}
?>
