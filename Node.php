<?php
/**
 * 创建一个节点类
 *
 * @time 2019-12-30
 */

namespace LeetCodes;

class Node
{
    public $value;
    public $next;

    public function __construct($value = null, $next = null)
    {
        $this->value = $value;
        $this->next = $next;
    }
}
