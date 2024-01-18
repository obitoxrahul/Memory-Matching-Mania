<?php
require('mysql.php');

if (is_ajax()) {
    if (isset($_POST["action"]) && !empty($_POST["action"])) {
        $hostname = "localhost";
        $username = "root";
        $password = "Rahul@6412";
        $database = "demo"; // Replace with your actual database name

        // Create a connection
        $conn = new mysqli($hostname, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Sanitize input data
        $fullname = $conn->real_escape_string($_POST["fullname"]);
        $email = $conn->real_escape_string($_POST["email"]);
        $score = intval($_POST["score"]);
        $appid = $conn->real_escape_string($_POST["appid"]);

        // Prepare and execute the insert query
        $quer = "INSERT INTO score (name, email, score, appid) VALUES ('$fullname', '$email', $score, '$appid')";
        $conn->query($quer);

        // Get user's rank
        $rankQ = "SELECT id, name, score, FIND_IN_SET(score, (SELECT GROUP_CONCAT(score ORDER BY score DESC) FROM score)) AS `rank` FROM score WHERE score = $score AND email = '$email' LIMIT 0,1";
        $rankRes = $conn->query($rankQ);
        $rankResRow = $rankRes->fetch_assoc();

        echo "Thanks for submitting your score!<br>Your position in the leaderboard is " . $rankResRow['rank'] . "!<br>";

        // Display leaderboard
        echo "<h2>Leaderboard</h2>";
        $leaderboardQ = "SELECT name, score FROM score ORDER BY score DESC LIMIT 5"; // Change the limit to 5
        $leaderboardRes = $conn->query($leaderboardQ);

        if ($leaderboardRes->num_rows > 0) {
            echo "<table><tr><th>Rank</th><th>Name</th><th>Score</th></tr>";

            $rank = 1;
            while ($row = $leaderboardRes->fetch_assoc()) {
                echo "<tr><td>";
                if ($rank == 1) {
                    echo "1st";
                } elseif ($rank == 2) {
                    echo "2nd";
                } elseif ($rank == 3) {
                    echo "3rd";
                } else {
                    echo $rank . "th";
                }
                echo "</td><td>" . $row["name"] . "</td><td>" . $row["score"] . "</td></tr>";
                $rank++;
            }

            echo "</table>";
        } else {
            echo "No scores available yet.";
        }

        // Close the connection
        $conn->close();
    }
}

function is_ajax()
{
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
?>
