<?php
$data = json_decode(file_get_contents('data.json'), true);
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Short Links</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 30px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .search-box {
            text-align: center;
            margin-bottom: 20px;
        }
        .search-box input {
            width: 300px;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 10px 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .btn {
            display: inline-block;
            margin-top: 15px;
            background: #007bff;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <h2>All Short Links</h2>

    <div class="search-box">
        <input type="text" id="searchInput" placeholder="Search by link, folder, or description..." onkeyup="searchTable()">
    </div>

    <table id="linkTable">
        <thead>
            <tr>
                <th>Description</th>
                <th>Created At</th>
                <th>Short URL</th>
                <th>Original Link</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['description']) ?></td>
                <td><?= htmlspecialchars($item['created_at']) ?></td>
                <td><a href="<?= htmlspecialchars($item['folder']) ?>/" target="_blank"><?= htmlspecialchars($item['folder']) ?>/</a></td>
                <td><a href="<?= htmlspecialchars($item['link']) ?>" target="_blank"><?= htmlspecialchars($item['link']) ?></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="text-align:center;">
        <a class="btn" href="index.php">Create New Link</a>
    </div>

    <script>
        function searchTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const rows = document.querySelectorAll('#linkTable tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        }
    </script>
</body>
</html>
