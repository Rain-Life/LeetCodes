<?php


class ListNode
{
    public $val = 0;
    public $next = null;
    public function __construct($val)
    {
        $this->val = $val;
    }
}

class LeetCode0002
{
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public function addTwoNumbers($l1, $l2)
    {
        if ($l1 == null && $l2 == null) {
            return null;
        }

        $dummy = new ListNode(0);
        $head = $dummy;
        $addOne = 0;//进位
        while ($l1 != null || $l2 != null || $addOne != 0) {
            $val1 = $l1 == null ? 0 : $l1->val;
            $val2 = $l2 == null ? 0 : $l2->val;
            $sum = $val1 + $val2 + $addOne;
            $head->next = new ListNode($sum % 10);
            $head = $head->next;
            $addOne = intval($sum / 10);//坑
            if ($l1 != null) {
                $l1 = $l1->next;
            }
            if ($l2 != null) {
                $l2 = $l2->next;
            }
        }
        return $dummy->next;
    }
}

$leetCode = new LeetCode0002();
$l1 = new ListNode(2);
$l1->next = new ListNode(5);
$l2 = new ListNode(4);
$l2->next = new ListNode(6);

$newList = $leetCode->addTwoNumbers($l1, $l2);
$str = '';
while ($newList != null) {
    $str .= $newList->val.'->';
    $newList = $newList->next;
}

echo $str;