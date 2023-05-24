
<!-- Created a form with a Post method to retrieve data from the text input -->
<form action="" method="POST">

    <!-- Here is the input to be taken in -->
    <input type="text" name="numbers" placeholder="Get Three Dynamic numbers: comma seperate">
    <input type="submit" name="submit">

</form>

<?php

// Performed a check to see if the form was submitted.
if (isset($_POST['submit'])){

    // Use the form method to get information from the form input with the name "numbers"
    $tree_numbers = $_POST["numbers"];

    // Over Here, I split the string with a dilimeter of (,) or comma. stores the scores in an array.
    $tree_numbers_array = explode(',', $tree_numbers);

    // I use the array_map function to convert all the string text in that array into integers.
    // This will allow for the array items to be iterable.
    $tree_numbers_array = array_map("intval", $tree_numbers_array);

    // Get the array length
    $count = count($tree_numbers_array);


    // Sum up all the array items. store the value in the $sum variable.
    $sum = 0;
    for($i = 0; $i < $count; $i++){
        $sum += $tree_numbers_array[$i];
    }

    // Fumulate the average
    $average = $sum / $count;

    // Perform my if statement Conditions
    if ($average == 50){
        echo "The average is equals to 50";
    }elseif ($average < 50){
        echo "The average is below 50";
    }elseif ($average > 50){
        echo "The average is above 50";
    }

}

// 1.2 How can you use the "if-else" statement in PHP to calculate the average of three
// dynamic numbers, entered by the user, and determine if it is above, below or equal to
// the value of 50 and print the corresponding message to the screen? 





?>