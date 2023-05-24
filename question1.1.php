<form action="" method="POST">
    <input type="text" placeholder="Enter Scores. Comma separate" name="scores">
    <input type="submit" name="submit">
</form>

<?php
// Function to sort an array in ascending order
function sortArray($array) {
    sort($array);
    return $array;
}

// Function to find the maximum value in an array
function GetMax($array) {
    return max($array);
}

// Function to find the minimum value in an array
function GetMin($array) {
    return min($array);
}

// check if form submited
if (isset($_POST['submit'])){
    // Input scores separated by comma (,)
    // Getting user input
    $scores = $_POST['scores'];

    // Explode the input into an array
    $scoreArray = explode(",", $scores);

    // Convert the string elements to integers
    $scoreArray = array_map('intval', $scoreArray);

    // Output the maximum, minimum, and sorted array
    echo "Maximum: " . GetMax($scoreArray) . "<br>";
    echo "Minimum: " . GetMin($scoreArray) . "<br>";
    echo "Sorted Array: " . implode(", ", sortArray($scoreArray)) . "\n";
}






?>

