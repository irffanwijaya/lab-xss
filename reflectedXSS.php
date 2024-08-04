<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS Reflected Lab</title>
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
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"] {
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

        .results {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
    </style>
</head>

<body>
    <h1>XSS Reflected Lab</h1>
    <form method="GET">
        <label for="query">Search:</label>
        <input type="text" id="query" name="query" placeholder="Enter your search">
        <button type="submit">Submit</button>
    </form>

    <?php
    if (isset($_GET['query'])) {
        $query = $_GET['query'];
        echo "<div class='results'>";
        echo "<h2>Search Results</h2>";
        echo "<p>Your search query: " . $query . "</p>";
        // Aman
        // echo "<p>Your search query: " . htmlspecialchars($query, ENT_QUOTES, 'UTF-8') . "</p>";
        echo "</div>";
    }
    ?>
</body>

</html>