<h1>Rating Title</h1>

<?php
    
    // Created an associotive array storing the values
    $movies = [
        "Need for Speed" => 6,
        "Wakanda forever" => 9,
        "Megan" => 9,
        "Infinity pool" => 7
    ];

    // sorts the value of key index of the array to desending order
    function sortArrayValueDesending($array) {
        arsort($array);
        return $array;
    }

    // sorts the keys to assending order
    function sortArrayAssending($array) {
        ksort($array);
        return $array;
    }

    $nameSortedArray = sortArrayAssending($movies);
    $ratingSortedArray = sortArrayValueDesending($movies);

    ?>
        <strong><h3>In their original orders</h3></strong>
    <?php

    foreach ($movies as $key => $value) {
        echo '<h4>'.$value.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$key.'</h4>';
    }


    ?>
        <strong><h3>Sorted by title</h3></strong>
    <?php

    foreach ($nameSortedArray as $key => $value) {
        echo '<h4>'.$value.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$key.'</h4>';
    }

    ?>
        <strong><h3>Sorted by rating</h3></strong>
    <?php

    foreach ($ratingSortedArray as $key => $value) {
        echo '<h4>'.$value.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$key.'</h4>';
    }

?>