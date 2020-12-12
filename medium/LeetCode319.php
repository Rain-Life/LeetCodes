<?php

class LeetCode319
{
    public function bulbSwitch($n) {
        return floor(sqrt($n));
    }
}

$obj = new LeetCode319();
$res = $obj->bulbSwitch(5);

var_dump($res);