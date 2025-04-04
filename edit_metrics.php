<?php
include('config.php');

// Check if the ID is provided and fetch the current metrics data
if (isset($_GET['id'])) {
    $metrics_id = $_GET['id'];

    // Fetch the metrics for this specific ID
    $stmt = $pdo->prepare("SELECT * FROM Daily_Metrics WHERE Id = ?");
    $stmt->execute([$metrics_id]);
    $metrics = $stmt->fetch(PDO::FETCH_ASSOC);

    // If the metrics don't exist, redirect back to the index page
    if (!$metrics) {
        header("Location: index.php");
        exit;
    }
} else {
    // If no ID is provided, redirect back to the index page
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Metrics</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .form-container {
            background-color: #fff;
            border-radius: 8px;
            margin: 20px auto;
            padding: 20px;
            width: 80%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        label {
            font-size: 14px;
            margin: 5px 0;
            display: block;
        }

        input[type="number"], input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 10px 0;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        input[type="submit"] {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Edit Metrics for Friends</h2>

    <!-- Form to update metrics -->
    <form action="update_metrics.php" method="POST">
        <input type="hidden" name="metrics_id" value="<?php echo $metrics['id']; ?>">
        <input type="hidden" name="user_id" value="<?php echo $metrics['User_Id']; ?>">

        <!-- Loop through each day to display input fields for editing -->
        <?php for ($i = 1; $i <= 7; $i++): ?>
            <h3>Day <?php echo $i; ?></h3>
            <label for="day_<?php echo $i; ?>_likes">Likes</label>
            <input type="number" name="day_<?php echo $i; ?>_likes" value="<?php echo $metrics["Day_{$i}_Likes"]; ?>">

            <label for="day_<?php echo $i; ?>_reacts">Reacts</label>
            <input type="number" name="day_<?php echo $i; ?>_reacts" value="<?php echo $metrics["Day_{$i}_Reacts"]; ?>">

            <label for="day_<?php echo $i; ?>_bio">Bio</label>
            <input type="text" name="day_<?php echo $i; ?>_bio" value="<?php echo $metrics["Day_{$i}_Bio"]; ?>">

            <label for="day_<?php echo $i; ?>_post">Post</label>
            <input type="number" name="day_<?php echo $i; ?>_post" value="<?php echo $metrics["Day_{$i}_Post"]; ?>">

            <label for="day_<?php echo $i; ?>_views">Views</label>
            <input type="number" name="day_<?php echo $i; ?>_views" value="<?php echo $metrics["Day_{$i}_Views"]; ?>">

            <label for="day_<?php echo $i; ?>_following">Following</label>
            <input type="number" name="day_<?php echo $i; ?>_following" value="<?php echo $metrics["Day_{$i}_Following"]; ?>">

            <label for="day_<?php echo $i; ?>_followers">Followers</label>
            <input type="number" name="day_<?php echo $i; ?>_followers" value="<?php echo $metrics["Day_{$i}_Followers"]; ?>">

            <label for="day_<?php echo $i; ?>_friends">Friends</label>
            <input type="number" name="day_<?php echo $i; ?>_friends" value="<?php echo $metrics["Day_{$i}_Friends"]; ?>">

            <label for="day_<?php echo $i; ?>_trends">Trends</label>
            <input type="text" name="day_<?php echo $i; ?>_trends" value="<?php echo $metrics["Day_{$i}_Trends"]; ?>">

            <hr>
        <?php endfor; ?>

        <input type="submit" value="Update Metrics">
    </form>
</div>

</body>
</html>
