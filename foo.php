<?php

/**
 * Cette fonction tente de fusionner des intervalles qui se recouvrent.
 * 
 * @param array $intervals
 * @return array
 */
function foo($intervals) {

    // On trie les intervalles par ordre croissant par 
    // rapport à la première valeur
    sort($intervals);

    $array_final = []; $current_interval = null;

    foreach ($intervals as $interval) {
        // on vérifie si la fin de l'intervalle est inférieure 
        // au début de l'intervalle suivant
        if ($current_interval === null || $current_interval[1] < $interval[0]) {
            $current_interval = $interval;
            array_push($array_final, $current_interval);
        }
        else {
            $current_interval[1] = max($current_interval[1], $interval[1]);
            $array_final[count($array_final) - 1] = $current_interval;
        }
    }

    return $array_final;
}

$intervals = [[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]];

$array_final = foo($intervals);

print_r($array_final);
?>
