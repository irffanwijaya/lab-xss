<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOM XSS Lab</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
        }
        select {
            width: 220px;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
            font-size: 16px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .note {
            margin-top: 20px;
            color: #999;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>DOM XSS Vulnerability Lab</h1>
    <p>Please choose a language:</p>
    <form name="XSS" method="GET">
        <select name="Language">
            <script>
                if (document.location.href.indexOf("Language=") >= 0) {
                    var lang = document.location.href.substring(document.location.href.indexOf("Language=") + 9);
                    document.write("<option value='" + lang + "'>" + decodeURI(lang) + "</option>");
                    document.write("<option value='' disabled>----</option>");
                }

                document.write("<option value='English'>English</option>");
                document.write("<option value='French'>French</option>");
                document.write("<option value='Spanish'>Spanish</option>");
                document.write("<option value='German'>German</option>");
            </script>
        </select>
        <input type="submit" value="Select" />
    </form>
</div>

</body>
</html>
