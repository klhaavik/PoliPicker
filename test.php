<?php
if (isset($_GET['name'])) {
    $name = htmlspecialchars($_GET['name']); // Get the name value
    echo "Hello, " . $name . "!"; // Output the name
}
?>