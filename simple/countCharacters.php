<?php
class Solution {

    /**
     * 题号：1160
     * @param String[] $words
     * @param String $chars
     * @return Integer
     */
    function countCharacters($words, $chars) {
        $charsMap = $this->charCount($chars);
        $totalLen = 0;
        foreach ($words as $item) {
            $wordMap = $this->charCount($item);
            $keys = array_keys($wordMap);
            $flag = true;
            for ($i=0; $i < count($keys);$i++) {
                $charValue = $charsMap[$keys[$i]] ?? 0;
                if ($charValue < $wordMap[$keys[$i]]) {
                    $flag = false;
                }
            }

            if ($flag === true) {
                $totalLen += strlen($item);
            }
        }

        return $totalLen;
    }

    public function charCount($str) {
        $strArr = str_split($str);
        $strMap = array_count_values($strArr);

        return $strMap;
    }
}

$obj = new Solution();
$data = $obj->countCharacters(["abcd", "eedss"], "efswerqwrqwecgsdfagsfd");
var_dump($data);