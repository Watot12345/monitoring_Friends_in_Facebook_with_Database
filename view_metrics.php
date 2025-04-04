<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Metrics</title>
    <style>
        /* Basic layout */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .user-container {
            background-color: #fff;
            border-radius: 8px;
            margin: 20px auto;
            padding: 20px;
            width: 80%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h3 {
            color: #333;
            margin-bottom: 15px;
        }

        /* Table styling */
        table.metrics-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table.metrics-table th, table.metrics-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table.metrics-table th {
            background-color: #4CAF50;
            color: white;
        }

        table.metrics-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table.metrics-table tr:hover {
            background-color: #ddd;
        }

        /* Action buttons */
        a.edit-btn, a.delete-btn {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 4px;
            margin-right: 20px;
            display: inline-block;
        }

        a.edit-btn {
            background-color: #4CAF50;
            color: white;
        }

        a.delete-btn {
            background-color: #f44336;
            color: white;
        }

        a.edit-btn:hover {
            background-color: #45a049;
        }

        a.delete-btn:hover {
            background-color: #e53935;
        }

        td {
            text-align: center;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .user-container {
                width: 90%;
            }

            table.metrics-table th, table.metrics-table td {
                font-size: 14px;
            }

            a.edit-btn, a.delete-btn {
                padding: 5px 10px;
            }
        }
    </style>
</head>
<body>
<h2>To View Data of Friends Select The Name First</h2>
<?php
// Handle form submission and display the selected user's metrics
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id']) && !empty($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Fetch the selected user's details
    $user_stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $user_stmt->execute([$user_id]);
    $user = $user_stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Display the user details
        echo "<div class='user-container'>";
        echo "<h3>" . $user['Name'] . " (" . $user['Email'] . ")</h3>";

        // Fetch daily metrics for the selected user
        $metrics_stmt = $pdo->prepare("SELECT * FROM Daily_Metrics WHERE User_Id = ?");
        $metrics_stmt->execute([$user['id']]);
        $metrics = $metrics_stmt->fetch(PDO::FETCH_ASSOC);

        if ($metrics) {
            // Display the metrics table
            echo "<table class='metrics-table'>";
            echo "<thead>
                    <tr>
                        <th>Day</th>
                        <th>Likes</th>
                        <th>Reacts</th>
                        <th>Bio</th>
                        <th>Post</th>
                        <th>Views</th>
                        <th>Following</th>
                        <th>Followers</th>
                        <th>Friends</th>
                        <th>Trends</th>
                        <th>Actions</th>
                    </tr>
                  </thead>";
            echo "<tbody>";

            // Loop through each day and display the metrics
            for ($i = 1; $i <= 7; $i++) {
                echo "<tr>
                        <td>Day $i</td>
                        <td>" . $metrics["Day_{$i}_Likes"] . "</td>
                        <td>" . $metrics["Day_{$i}_Reacts"] . "</td>
                        <td>" . $metrics["Day_{$i}_Bio"] . "</td>
                        <td>" . $metrics["Day_{$i}_Post"] . "</td>
                        <td>" . $metrics["Day_{$i}_Views"] . "</td>
                        <td>" . $metrics["Day_{$i}_Following"] . "</td>
                        <td>" . $metrics["Day_{$i}_Followers"] . "</td>
                        <td>" . $metrics["Day_{$i}_Friends"] . "</td>
                        <td>" . $metrics["Day_{$i}_Trends"] . "</td>
                        <td>
                            <a class='edit-btn' href='edit_metrics.php?id=" . $metrics['id'] . "&day=$i'>Edit</a>
                            <a class='delete-btn' href='delete_metrics.php?id=" . $metrics['id'] . "&day=$i'>Delete</a>
                        </td>
                    </tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p>No metrics found for this user.</p>";
        }

        echo "</div>"; // Close user-container
    }
} else {
    // Display the user selection dropdown
    echo '<form method="POST" action="">';
    echo '<select name="user_id" required>';
    echo '<option value="">Select Friends</option>';
    $stmt = $pdo->query("SELECT * FROM users");
    while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<option value="' . $user['id'] . '">' . $user['Name'] . '</option>';
    }
    echo '</select>';
    echo '<button type="submit">Submit</button>';
    echo '</form>';
}
?>
<p><a href="view_metrics.php">previos page</a></p>
</body>
</html>
