<?php
include('config.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the metrics id and user id
    $metrics_id = $_POST['metrics_id'];
    $user_id = $_POST['user_id'];

    // Collect the metrics for all 7 days
    $metrics = [];
    for ($i = 1; $i <= 7; $i++) {
        $metrics["day_{$i}_likes"] = $_POST["day_{$i}_likes"];
        $metrics["day_{$i}_reacts"] = $_POST["day_{$i}_reacts"];
        $metrics["day_{$i}_bio"] = $_POST["day_{$i}_bio"];
        $metrics["day_{$i}_post"] = $_POST["day_{$i}_post"];
        $metrics["day_{$i}_views"] = $_POST["day_{$i}_views"];
        $metrics["day_{$i}_following"] = $_POST["day_{$i}_following"];
        $metrics["day_{$i}_followers"] = $_POST["day_{$i}_followers"];
        $metrics["day_{$i}_friends"] = $_POST["day_{$i}_friends"];
        $metrics["day_{$i}_trends"] = $_POST["day_{$i}_trends"];
    }

    // Prepare the SQL statement for updating the metrics in the database
    $stmt = $pdo->prepare("UPDATE Daily_Metrics SET 
        Day_1_Likes = ?, Day_1_Reacts = ?, Day_1_Bio = ?, Day_1_Post = ?, Day_1_Views = ?, Day_1_Following = ?, Day_1_Followers = ?, Day_1_Friends = ?, Day_1_Trends = ?,
        Day_2_Likes = ?, Day_2_Reacts = ?, Day_2_Bio = ?, Day_2_Post = ?, Day_2_Views = ?, Day_2_Following = ?, Day_2_Followers = ?, Day_2_Friends = ?, Day_2_Trends = ?,
        Day_3_Likes = ?, Day_3_Reacts = ?, Day_3_Bio = ?, Day_3_Post = ?, Day_3_Views = ?, Day_3_Following = ?, Day_3_Followers = ?, Day_3_Friends = ?, Day_3_Trends = ?,
        Day_4_Likes = ?, Day_4_Reacts = ?, Day_4_Bio = ?, Day_4_Post = ?, Day_4_Views = ?, Day_4_Following = ?, Day_4_Followers = ?, Day_4_Friends = ?, Day_4_Trends = ?,
        Day_5_Likes = ?, Day_5_Reacts = ?, Day_5_Bio = ?, Day_5_Post = ?, Day_5_Views = ?, Day_5_Following = ?, Day_5_Followers = ?, Day_5_Friends = ?, Day_5_Trends = ?,
        Day_6_Likes = ?, Day_6_Reacts = ?, Day_6_Bio = ?, Day_6_Post = ?, Day_6_Views = ?, Day_6_Following = ?, Day_6_Followers = ?, Day_6_Friends = ?, Day_6_Trends = ?,
        Day_7_Likes = ?, Day_7_Reacts = ?, Day_7_Bio = ?, Day_7_Post = ?, Day_7_Views = ?, Day_7_Following = ?, Day_7_Followers = ?, Day_7_Friends = ?, Day_7_Trends = ?
        WHERE Id = ?");

    // Execute the statement with the data from the form
    $stmt->execute([
        $metrics['day_1_likes'], $metrics['day_1_reacts'], $metrics['day_1_bio'], $metrics['day_1_post'], $metrics['day_1_views'], $metrics['day_1_following'],
        $metrics['day_1_followers'], $metrics['day_1_friends'], $metrics['day_1_trends'],
        $metrics['day_2_likes'], $metrics['day_2_reacts'], $metrics['day_2_bio'], $metrics['day_2_post'], $metrics['day_2_views'], $metrics['day_2_following'],
        $metrics['day_2_followers'], $metrics['day_2_friends'], $metrics['day_2_trends'],
        $metrics['day_3_likes'], $metrics['day_3_reacts'], $metrics['day_3_bio'], $metrics['day_3_post'], $metrics['day_3_views'], $metrics['day_3_following'],
        $metrics['day_3_followers'], $metrics['day_3_friends'], $metrics['day_3_trends'],
        $metrics['day_4_likes'], $metrics['day_4_reacts'], $metrics['day_4_bio'], $metrics['day_4_post'], $metrics['day_4_views'], $metrics['day_4_following'],
        $metrics['day_4_followers'], $metrics['day_4_friends'], $metrics['day_4_trends'],
        $metrics['day_5_likes'], $metrics['day_5_reacts'], $metrics['day_5_bio'], $metrics['day_5_post'], $metrics['day_5_views'], $metrics['day_5_following'],
        $metrics['day_5_followers'], $metrics['day_5_friends'], $metrics['day_5_trends'],
        $metrics['day_6_likes'], $metrics['day_6_reacts'], $metrics['day_6_bio'], $metrics['day_6_post'], $metrics['day_6_views'], $metrics['day_6_following'],
        $metrics['day_6_followers'], $metrics['day_6_friends'], $metrics['day_6_trends'],
        $metrics['day_7_likes'], $metrics['day_7_reacts'], $metrics['day_7_bio'], $metrics['day_7_post'], $metrics['day_7_views'], $metrics['day_7_following'],
        $metrics['day_7_followers'], $metrics['day_7_friends'], $metrics['day_7_trends'],
        $metrics_id
    ]);

    // After updating, redirect back to the index page or any other page
    header("Location: index.php");
    exit();
}
?>
