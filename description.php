<?php
$summary = ''; // Initialize summary variable
$error = ''; // Initialize error variable

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    $politicianName = escapeshellarg($_POST['name']); // Escape the input for safety

    // Command to run the Python script
    $command = "POLITICIAN_NAME=$politicianName python3 genwiki.py";

    // Execute the command and capture the output and error output
    exec($command . ' 2>&1', $output, $return_var);

    // Check if the command executed successfully
    if ($return_var === 0) {
        $summary = implode("\n", $output); // Join the output array into a string
    } else {
        $error = "An error occurred while running the Python script: " . implode("\n", $output);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: rgba(160, 80, 190, 0.5);
            margin: 20px;
        }
        .top-navbar {
            display: flex;
            justify-content: flex-end;
            padding: 10px;
        }
        .profile-container {
            display: inline-block;
            text-align: center;
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 10px;
            background-color: white;
            color: black;
        }
        img {
            height: 250px; 
            width: 250px;   
            object-fit: cover;
            border-radius: 10px;
            display: block;
            margin: 0 auto; 
        }
        button {
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #fda92c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #e8b471;
        }
    </style>
</head>
<body>
    <div class="top-navbar"> 
        <button onclick="window.location.href='index.html'">Home</button> 
    </div>
    <div class="profile-container">
        <?php if ($summary): ?>
            <h1><?= htmlspecialchars($politicianName) ?></h1>
            <img id="profile" src="" alt="Picture of <?= htmlspecialchars($politicianName) ?>">
            <p><?= nl2br(htmlspecialchars($summary)) ?></p>
            <button onclick="window.location.href='compare.html'">Compare with another politician</button>
        <?php elseif ($error): ?>
            <p><?= htmlspecialchars($error) ?></p>
        <?php else: ?>
            <h1>Enter Politician's Name</h1>
            <form method="POST">
                <input type="text" id="name" name="name" required>
                <button type="submit">Get Summary</button>
            </form>
        <?php endif; ?>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }

        const apiKey = 'AIzaSyAgNrmfbMobAQfBOmKxhU2rosEwuYZwLdQ';
        const cxId = '968f3968bfa4746f4';
        const query = '<?= isset($politicianName) ? htmlspecialchars($politicianName) : '' ?>'; // Replace with variable name of politician

        if (query) {
            fetch(`https://www.googleapis.com/customsearch/v1?key=${apiKey}&cx=${cxId}&q=${query}&searchType=image`)
            .then(response => response.json())
            .then(data => {
                const imageUrl = data.items[0].link; // Get the URL of the first image result
                document.getElementById('profile').src = imageUrl; // Set the image source
            })
            .catch(error => console.error('Error fetching image:', error));
        }
    </script>
</body>
</html>
