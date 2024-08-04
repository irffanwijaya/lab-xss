<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOM XSS Lab</title>
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

        select {
            width: 100%;
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

        .result {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>DOM XSS Lab</h1>
    <form id="searchForm">
        <label for="option">Pilih Bahasa:</label>
        <select id="option" name="option">
            <option value="Indonesia">Indonesia</option>
            <option value="Inggris">Inggris</option>
            <option value="Jerman">Jerman</option>
        </select>
        <button type="submit">Submit</button>
    </form>

    <div id="result" class="result"></div>

    <script>
        document.getElementById('searchForm').addEventListener('submit', function (event) {
            event.preventDefault();
            var selectedOption = document.getElementById('option').value;
            document.getElementById('result').innerHTML = 'You selected: ' + selectedOption;
            //Aman
            // document.getElementById('result').textContent = 'You selected: ' + selectedOption;
        });
    </script>
</body>

</html>