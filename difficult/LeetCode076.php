<?php

class LeetCode076
{
    public function baoli1($arr, $k)
    {
        $n = count($arr);
        $max = 0;
        for ($i=0; $i < $n-$k+1; $i++) {
            $sum = 0;
            for ($j=0; $j<$k; $j++) {
                $sum+=$arr[$i+$j];
            }
            $max = max($max, $sum);
        }

        return $max;
    }
}

$obj = new LeetCode076();
$res = $obj->baoli1([100,200,300,400], 2);
var_dump($res);