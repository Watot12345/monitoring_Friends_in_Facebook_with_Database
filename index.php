<?php
include('config.php');

// Create or Update user logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create_user'])) {
        $email = $_POST['email'];
        $name = $_POST['name'];
        
        $stmt = $pdo->prepare("INSERT INTO Users (Email, Name) VALUES (:email, :name)");
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":name", $name);
        $stmt->execute();
        echo "<script>alert('Created Succesfully!'); setTimeout(function(){window.location.href = 'index.php';}, 500);</script>";
    }

    // Create daily metrics logic
    if (isset($_POST['create_daily_metrics'])) {
        $user_id = $_POST['user_id'];

        // Collect metrics for all 7 days with default values if not set
        $metrics = [];
        for ($i = 1; $i <= 7; $i++) {
            // Check if each metric is set, otherwise set a default value (e.g., 0 for numbers, "" for text)
            $metrics["day_{$i}_likes"] = isset($_POST["day_{$i}_likes"]) ? $_POST["day_{$i}_likes"] : 0;
            $metrics["day_{$i}_reacts"] = isset($_POST["day_{$i}_reacts"]) ? $_POST["day_{$i}_reacts"] : 0;
            $metrics["day_{$i}_bio"] = isset($_POST["day_{$i}_bio"]) ? $_POST["day_{$i}_bio"] : "";
            $metrics["day_{$i}_post"] = isset($_POST["day_{$i}_post"]) ? $_POST["day_{$i}_post"] : 0;
            $metrics["day_{$i}_views"] = isset($_POST["day_{$i}_views"]) ? $_POST["day_{$i}_views"] : 0;
            $metrics["day_{$i}_following"] = isset($_POST["day_{$i}_following"]) ? $_POST["day_{$i}_following"] : 0;
            $metrics["day_{$i}_followers"] = isset($_POST["day_{$i}_followers"]) ? $_POST["day_{$i}_followers"] : 0;
            $metrics["day_{$i}_friends"] = isset($_POST["day_{$i}_friends"]) ? $_POST["day_{$i}_friends"] : 0;
            $metrics["day_{$i}_trends"] = isset($_POST["day_{$i}_trends"]) ? $_POST["day_{$i}_trends"] : "";
        }

        // SQL statement with named placeholders
        $sql = "INSERT INTO Daily_Metrics (User_Id, 
            Day_1_Likes, Day_1_Reacts, Day_1_Bio, Day_1_Post, Day_1_Views, Day_1_Following, Day_1_Followers, Day_1_Friends, Day_1_Trends,
            Day_2_Likes, Day_2_Reacts, Day_2_Bio, Day_2_Post, Day_2_Views, Day_2_Following, Day_2_Followers, Day_2_Friends, Day_2_Trends,
            Day_3_Likes, Day_3_Reacts, Day_3_Bio, Day_3_Post, Day_3_Views, Day_3_Following, Day_3_Followers, Day_3_Friends, Day_3_Trends,
            Day_4_Likes, Day_4_Reacts, Day_4_Bio, Day_4_Post, Day_4_Views, Day_4_Following, Day_4_Followers, Day_4_Friends, Day_4_Trends,
            Day_5_Likes, Day_5_Reacts, Day_5_Bio, Day_5_Post, Day_5_Views, Day_5_Following, Day_5_Followers, Day_5_Friends, Day_5_Trends,
            Day_6_Likes, Day_6_Reacts, Day_6_Bio, Day_6_Post, Day_6_Views, Day_6_Following, Day_6_Followers, Day_6_Friends, Day_6_Trends,
            Day_7_Likes, Day_7_Reacts, Day_7_Bio, Day_7_Post, Day_7_Views, Day_7_Following, Day_7_Followers, Day_7_Friends, Day_7_Trends)
            VALUES (:user_id,
            :day_1_likes, :day_1_reacts, :day_1_bio, :day_1_post, :day_1_views, :day_1_following, :day_1_followers, :day_1_friends, :day_1_trends,
            :day_2_likes, :day_2_reacts, :day_2_bio, :day_2_post, :day_2_views, :day_2_following, :day_2_followers, :day_2_friends, :day_2_trends,
            :day_3_likes, :day_3_reacts, :day_3_bio, :day_3_post, :day_3_views, :day_3_following, :day_3_followers, :day_3_friends, :day_3_trends,
            :day_4_likes, :day_4_reacts, :day_4_bio, :day_4_post, :day_4_views, :day_4_following, :day_4_followers, :day_4_friends, :day_4_trends,
            :day_5_likes, :day_5_reacts, :day_5_bio, :day_5_post, :day_5_views, :day_5_following, :day_5_followers, :day_5_friends, :day_5_trends,
            :day_6_likes, :day_6_reacts, :day_6_bio, :day_6_post, :day_6_views, :day_6_following, :day_6_followers, :day_6_friends, :day_6_trends,
            :day_7_likes, :day_7_reacts, :day_7_bio, :day_7_post, :day_7_views, :day_7_following, :day_7_followers, :day_7_friends, :day_7_trends)";

        // Prepare the SQL statement
        $stmt = $pdo->prepare($sql);

        // Bind the parameters dynamically using bindParam for each value
        $stmt->bindParam(":user_id", $user_id);
        for ($i = 1; $i <= 7; $i++) {
            $stmt->bindParam(":day_{$i}_likes", $metrics["day_{$i}_likes"]);
            $stmt->bindParam(":day_{$i}_reacts", $metrics["day_{$i}_reacts"]);
            $stmt->bindParam(":day_{$i}_bio", $metrics["day_{$i}_bio"]);
            $stmt->bindParam(":day_{$i}_post", $metrics["day_{$i}_post"]);
            $stmt->bindParam(":day_{$i}_views", $metrics["day_{$i}_views"]);
            $stmt->bindParam(":day_{$i}_following", $metrics["day_{$i}_following"]);
            $stmt->bindParam(":day_{$i}_followers", $metrics["day_{$i}_followers"]);
            $stmt->bindParam(":day_{$i}_friends", $metrics["day_{$i}_friends"]);
            $stmt->bindParam(":day_{$i}_trends", $metrics["day_{$i}_trends"]);
        }

        // Execute the query
        $stmt->execute();

        // Redirect back to the index page
        echo "<script>alert('Added Succesfully!'); setTimeout(function(){window.location.href = 'view_metrics.php';}, 500);</script>";
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Database CRUD</title>
    <style>
         body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 20px;
    background: linear-gradient(135deg, #6a82fb, #fc5c7d);
    color: #f4f4f4;
    background-size: 400% 400%;
    animation: gradientAnimation 6s ease infinite;
}

@keyframes gradientAnimation {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

h1 {
    color: #fff;
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-weight: bold;
}

table {
    width: 100%;
    margin-bottom: 20px;
    border-collapse: collapse;
    background-color: rgba(255, 255, 255, 0.1);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    color: #fff;
    border-radius: 10px;
    backdrop-filter: blur(10px);
}

table th, table td {
    padding: 15px;
    text-align: left;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

table th {
    background-color: rgba(255, 255, 255, 0.2);
    font-size: 1.1rem;
    color: #fff;
    text-transform: uppercase;
}

table td {
    background-color: rgba(255, 255, 255, 0.1);
    font-size: 1rem;
    color: #ddd;
}

table td:hover {
    background-color: rgba(255, 255, 255, 0.3);
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.form-container {
    background: rgba(255, 255, 255, 0.15);
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    backdrop-filter: blur(10px);
}

.form-container input[type="text"],
.form-container input[type="email"],
.form-container textarea,
.form-container input[type="number"] {
    width: 100%;
    padding: 15px;
    margin: 10px 0;
    border-radius: 8px;
    border: 1px solid #ddd;
    background-color: rgba(255, 255, 255, 0.25);
    color: #333;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-container input[type="text"]:focus,
.form-container input[type="email"]:focus,
.form-container textarea:focus,
.form-container input[type="number"]:focus {
    border-color: #fc5c7d;
    background-color: rgba(255, 255, 255, 0.4);
    outline: none;
    box-shadow: 0 0 10px rgba(252, 92, 125, 0.5);
}

.form-container input[type="submit"] {
    background-color: #fc5c7d;
    color: white;
    border: none;
    padding: 15px;
    cursor: pointer;
    border-radius: 8px;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    width: 100%;
}

.form-container input[type="submit"]:hover {
    background-color: #6a82fb;
    transform: scale(1.05);
}

.form-container input[type="submit"]:active {
    background-color: #4e73df;
}

@media (max-width: 768px) {
    h1 {
        font-size: 2rem;
    }

    .form-container {
        padding: 15px;
    }
}
        </style>

    
</head>
<body>

<h1>Monitoring Friends With Database</h1>

<!-- User Form -->
<div class="form-container">
    <h2>Add Friends</h2>
    <form action="index.php" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="name" placeholder="Name" required>
        <input type="submit" name="create_user" value="Create User">
    </form>
</div>

<!-- Daily Metrics Form -->
<div class="form-container">
    <h2>Create Daily Metrics of Friends</h2>
    <form action="index.php" method="POST">
        <select name="user_id" required>
            <option value="">Select Friends</option>
            <?php 
            $stmt = $pdo->query("SELECT * FROM users");
            while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <option value="<?php echo $user['id']; ?>"><?php echo $user['Name']; ?></option>
            <?php endwhile; ?>
        </select>

        <?php
        for ($i = 1; $i <= 7; $i++):
        ?>
            <h3>Day <?php echo $i; ?> Metrics</h3>
            <input type="number" name="day_<?php echo $i; ?>_likes" placeholder="Likes" >
            <input type="number" name="day_<?php echo $i; ?>_reacts" placeholder="Reacts"  >
            <input type="text" name="day_<?php echo $i; ?>_bio" placeholder="Bio">
            <input type="number" name="day_<?php echo $i; ?>_post" placeholder="Post">
            <input type="number" name="day_<?php echo $i; ?>_views" placeholder="Views">
            <input type="number" name="day_<?php echo $i; ?>_following" placeholder="Following">
            <input type="number" name="day_<?php echo $i; ?>_followers" placeholder="Followers">
            <input type="number" name="day_<?php echo $i; ?>_friends" placeholder="Friends">
            <input type="text" name="day_<?php echo $i; ?>_trends" placeholder="Trends">
        <?php endfor; ?>

        <input type="submit" name="create_daily_metrics" value="Create Daily Metrics">
    </form>
</div>

</body>
</html>
