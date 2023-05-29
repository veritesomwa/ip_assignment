<?php 

// Create a for loop looping backwards from the intial value in our example 5

for ($i = 5; $i > 0; $i--){
    // The value of the variable $i which is 5. is decrease to become 1 then the loop will break acording to my condition
    $hold = "";
    $count = 0;
    while ($count < $i){
        $hold = $hold."*";
        $count++;
    }
    // Every thing above, I created to append the star or astrict to the string variable $hold.
    // The number of astricts appended is equevalent to $i; the value of the for loop.
    echo $hold."<br>";
}



?>