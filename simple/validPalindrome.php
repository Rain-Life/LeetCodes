<?php
class Solution {

    /**
     * 题号：680
     * @param String $s
     * @return Boolean
     */
    public function validPalindrome($s) {
        $len = strlen($s);
        for ($i=0, $j=$len-1; $i < $j; $i++, $j--) {
            if ($s[$i] == $s[$j]) continue;
            $flag1 = $flag2 = true;
            for ($k = $i+1, $t=$j; $k < $t; $k++, $t--) {
                if ($s[$k] != $s[$t]) {

                    $flag1 = false;
                    break;
                }
            }
            for ($k = $i, $t=$j-1; $k < $t; $k++, $t--) {
                if ($s[$k] != $s[$t]) {
                    $flag2 = false;
                    break;
                }
            }

            return $flag1 || $flag2;
        }

        return true;
    }
}

//$obj = new Solution();
//$bool = $obj->validPalindrome("abcdcbaa");
//var_dump($bool);