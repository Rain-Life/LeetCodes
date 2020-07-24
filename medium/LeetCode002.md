>题目：给出两个**非空**的链表用来表示两个**非负**的整数。其中，它们各自的位数是按照**逆序**的方式存储的，并且它们的每个节点只能存储一位数字。如果，我们将这两个数相加起来，则会返回一个新的链表来表示它们的和。您可以假设除了数字**0**之外，这两个数都不会以**0**开头


示例:
```
输入：(2 -> 4 -> 3) + (5 -> 6 -> 4)
输出：7 -> 0 -> 8
原因：342 + 465 = 807
```

解题思路：
题中说各自的位数是按照逆序的方式存储到链表中，其实这降低了难度，因为刚好进行加法运算时，从个位开始加，而链表中从前到后是从低位开始的，刚好符合了加法的运算顺序（以题中给的数据为例）
![](https://imgkr.cn-bj.ufileos.com/71ccf0f4-1a04-410d-9af2-85fd1c8c83f7.png)



既然是求和，那不难知道，取出两个链表中的每一个节点，然后进行求和(sum)，如果大于10则记一个进位1，然后拿sum对10进行求余，得的到结果就是目标链表的第一个有效节点，具体过程如图：
![](https://imgkr.cn-bj.ufileos.com/d9efdf78-4374-4464-8f6f-fe72660d2c7e.png)


实现过程：
1、核心方法就是对两个链表进行遍历，然后逐个节点求和

* 因为不知道这两个要求和的链表的节点个数(也就是不知道循环次数)，所以选择while循环。只要任何一个链表的节点不为null，都需要继续进行循环
* 但是因为有进位的情况，所以，当进位不是0时，也不能停止循环（比如9999+1）

2、然后就是生成新的链表存储求和的结果

* 对于链表的问题，通常都会创建一个标志节点，它不存具体的值，它的next负责指向第一个有效节点（始终指向第一个，不移动），主要是为了方便我们返回得到的目标链表
* 同时需要创建一个头head节点，他负责生成每一个节点，它是移动的，每生成一个节点，它都需要向后移动一个节点，从而实现构建新的链表

语言表达能力有点差，可能描述的不是很清楚，代码中有必要的注释，希望可以帮助理解

代码实现
```
class ListNode
{
    public $val = 0;
    public $next = null;
    public function __construct($val)
    {
        $this->val = $val;
    }
}

class LeetCode002
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

        $tag = new ListNode(0);//创建空节点
        $head = $tag;
        $addOne = 0;//进位
        while ($l1 != null || $l2 != null || $addOne != 0) {
            $val1 = $l1 == null ? 0 : $l1->val;
            $val2 = $l2 == null ? 0 : $l2->val;
            $sum = $val1 + $val2 + $addOne;
            $head->next = new ListNode($sum % 10);
            $head = $head->next;
            $addOne = intval($sum / 10);//坑，强类型语言不存在此问题
            if ($l1 != null) {
                $l1 = $l1->next;
            }
            if ($l2 != null) {
                $l2 = $l2->next;
            }
        }
        return $tag->next;
    }
}

//Test Case
$leetCode = new LeetCode002();
$l1 = new ListNode(2);
$l1->next = new ListNode(4);


$l2 = new ListNode(5);
$l2->next = new ListNode(6);

$newList = $leetCode->addTwoNumbers($l1, $l2);
$str = '';
while ($newList != null) {
    $str .= $newList->val.'->';
    $newList = $newList->next;
}

echo $str;
```

执行结果
![](https://imgkr.cn-bj.ufileos.com/8c8d5d2c-3a95-4ac9-9790-d276a0cbe11c.png)

