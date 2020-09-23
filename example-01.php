<?php
    $fp = fopen($_SERVER['argv'][1], 'r');

    fscanf($fp, "%d", $n);
    $names = [];
    for($i = 0; $i < $n; $i++) {
        $name = [];
        fscanf($fp, "%s %s", $name['first'], $name['last']);
        $names[] = $name;
    }
    fclose($fp);

    // normal comparison
    // usort($names, function($pre, $next) {
    //     $preFirst = strtolower($pre['first']);
    //     $nextFist = strtolower($next['first']);
    //     if($preFirst < $nextFirst) return -1;
    //     if($preFirst > $nextFirst) return 1;

    //     $preLast = strtolower($pre['last']);
    //     $nextLast = strtolower($next['last']);
    //     if($preLast < $nextLast) return -1;
    //     if($preLast > $nextLast) return 1;
    //     return 0;
    // });

    // <=> operator
    // usort($names, function($pre, $next) {
    //     $preFirst = strtolower($pre['first']);
    //     $nextFist = strtolower($next['first']);
    //     $result = $preFirst <=> $nextFirst;
    //     if($result !== 0) return $result;

    //     $preLast = strtolower($pre['last']);
    //     $nextLast = strtolower($next['last']);
    //     return $preLast <=> $nextLast;
    // });

    // strcasecmp() function
    usort($names, function($pre, $next) {
        $result = strcasecmp($pre['first'], $next['first']);
        if($result !== 0) return $result;

        return strcasecmp($pre['last'], $next['last']);
    });

    array_walk($names, function($name) {
        printf("%-15s %s\n", $name['first'], $name['last']);
    });