<?php
// Path to JSON file
$jsonFile = 'data.json';

// Ensure JSON file exists
if (!file_exists($jsonFile)) {
    file_put_contents($jsonFile, json_encode([], JSON_PRETTY_PRINT));
}

// Get form data
$link = trim($_POST['link']);
$description = trim($_POST['description']);
$length = isset($_POST['length']) ? (int)$_POST['length'] : 4;

if (!$link) {
    die("Invalid link.");
}

// Load existing data
$data = json_decode(file_get_contents($jsonFile), true);

// Generate a random folder name
function generateFolderName($length = 4) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $name = '';
    for ($i = 0; $i < $length; $i++) {
        $name .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $name;
}

// Generate unique folder name
do {
    $folderName = generateFolderName($length);
    $folderPath = __DIR__ . '/' . $folderName;
} while (file_exists($folderPath));

// Create the folder
mkdir($folderPath);

// Create index.php redirect inside the folder
$redirectCode = "<?php\nheader('Location: " . addslashes($link) . "');\nexit();";
file_put_contents($folderPath . '/index.php', $redirectCode);

// Save data to JSON
$data[] = [
    'folder' => $folderName,
    'link' => $link,
    'description' => $description,
    'length' => $length,
    'created_at' => date('Y-m-d H:i:s')
];
file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT));

echo "<p>Short link created successfully!</p>";
echo "<p>Short URL: <a href='$folderName/' target='_blank'>$folderName/</a></p>";
echo "<p><a href='index.php'>Create another</a> | <a href='view.php'>View all</a></p>";
?>
