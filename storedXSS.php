<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "xss_lab";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete'])) {
        $sql = "DELETE FROM comments";
        if ($conn->query($sql) === TRUE) {
            echo "Komentar berhasil dihapus.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $username = $_POST['username'];
        $comment = $_POST['comment'];

        $sql = "INSERT INTO comments (username, comment) VALUES ('$username', '$comment')";
        if ($conn->query($sql) === TRUE) {
            echo "Komentar berhasil ditambahkan.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$sql = "SELECT * FROM comments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stored XSS Lab</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #5a5a5a;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #5a67d8;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #4c51bf;
        }

        .comments {
            width: 300px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .comment {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h1>Stored XSS Lab</h1>
    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" id="username" name="username" required>

        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment" rows="4" required></textarea>

        <button type="submit">Submit</button>
    </form>

    <form method="POST" action="">
        <button type="submit" name="delete">Delete Comment</button>
    </form>

    <div class="comments">
        <h2>Comments</h2>
        <?php if ($result->num_rows > 0):
            while ($row = $result->fetch_assoc()): ?>
                <div class="comment">
                    <strong><?php echo $row['username']; ?>:</strong>
                    <p><?php echo $row['comment']; ?></p>
                    <!-- <strong><?php echo htmlspecialchars($row['username']); ?>:</strong>
                    <p><?php echo htmlspecialchars($row['comment']); ?></p> -->
                </div>
            <?php endwhile;
        else: ?>
            <p>No comments.</p>
        <?php endif; ?>
    </div>
</body>

</html>