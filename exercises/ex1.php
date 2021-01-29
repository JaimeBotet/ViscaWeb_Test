<?php

// EXERCISE 1

echo "EXERCISE 1! <br><br>";
function similar_percentage($first, $second)
{
    $percentage = NULL;
    similar_text($first, $second, $percentage);
    return $percentage;
}

$orange_words = array(
    'orange',
    'naranja',
    'oranssi',
    'narancs',
    'arancione',
    'laranja',
    'turuncu',
);
$max_comp = 0;
$max_comp_arr = array();

for ($i = 0; $i < count($orange_words); $i++) {
    for ($j = $i + 1; $j < count($orange_words); $j++) {
        if (similar_percentage($orange_words[$i], $orange_words[$j]) > $max_comp) {
            $max_comp = round(similar_percentage($orange_words[$i], $orange_words[$j]), 2);
            $max_comp_arr[0] = $orange_words[$i];
            $max_comp_arr[1] = $orange_words[$j];
        }
    }
}
echo 'Max compatibility between words `' . $max_comp_arr[0] . '` and `' . $max_comp_arr[1] . '` which is: ' . $max_comp . '<br><br>';
