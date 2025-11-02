<!DOCTYPE html>
<html>
<head>
    <title>PHP URL Shortener</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f8fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 25px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
            width: 350px;
        }
        input[type="url"], input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create a Short Link</h2>
        <form action="create.php" method="POST">
            <label>Link (URL):</label><br>
            <input type="url" name="link" required><br>

            <label>Description:</label><br>
            <input type="text" name="description" required><br>

            <label>Folder Name Length:</label><br>
            <input type="number" name="length" value="4" min="2" max="10" required><br>

            <button type="submit">Create Short Link</button>
        </form>
        <p><a href="view.php">View All Links</a></p>
    </div>
</body>
</html>
