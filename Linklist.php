<?php
/**
 * 链表类
 *
 * @time 2019-12-30
*/

namespace LeetCodes;

class Linklist
{
    public $head;//头结点
    public $size;//链表长度

    public function __construct()
    {
        $this->head = new Node();//默认给定一个虚拟头结点
        $this->size = 0;
    }
    /**
     * 验证位置是否大于链表长度
     *
     * @params integer $index
     * @throws \Exception
     *
     * @time 2019-12-30
    */
    public function check($index)
    {
        if ($index > $this->size) {
            throw new \Exception('插入位置超出链表长度');
        }
    }

    /**
     * 向链表中指定位置插入节点
     *
     * @params integer index
     * @params mixed $value
     * @throws \Exception
     *
     * @time 2019-12-30
    */
    public function add($index, $value)
    {
        $this->check($index);
        //判断节点是否要插入到头部
        if ($index == 0) {
            $this->head->next = new Node($value, $this->head);

        } else {
            $pre = $this->head;
            for ($i = 0; $i < $index; $i++) {
                $pre = $pre->next;
            }
            $pre->next = new Node($value, $pre->next);
        }

        $this->size++;
    }

    /**
     * 编辑节点
     *
     * @params integer $index
     * @params mixed $valude
     * @throws \Exception
     *
     * @time 2019-12-30
    */
    public function edit($index, $value)
    {
        $this->check($index);

        $pre = $this->head->next;
        for ($i = 1; $i <= $index; $i++) {
            if ($i == $index) {
                $pre->$value = $value;
            }

            $pre = $pre->next;
        }
    }

    /**
     * 查询指定位置的节点
     *
     * @params integer index
     * @throws \Exception
     * @return Linklist
     *
     * @time 2019-12-30
    */
    public function findByIndex($index)
    {
        $this->check($index);
        $pre = $this->head->next;
        for ($i = 1; $i <= $index; $i++) {
            if ($i == $index) {
                return $pre;
            }

            $pre = $pre->next;
        }
    }

    /**
     * 查询等于指定值的节点
     *
     * @params mixed $value
     * @return Linklist
     *
     * @time 2019-12-30
     */
    public function findByValue($value)
    {
        $pre = $this->head->next;
        while($pre) {
            if ($pre->value == $value) {
                return $pre;
            }

            $pre = $pre->next;
        }
    }

    /**
     * 删除指定位置的节点
     *
     * @params integer $index
     * @throws \Exception
     *
     * @time 2019-12-30
    */
    public function deleteByIndex($index)
    {
        $this->check($index);
        $pre = $this->head;
        for ($i = 0; $i <= $index; $i++) {
            if ($i == $index) {
                $pre->next = $pre->next->next;
            }

            $pre = $pre->next;
        }

        $this->size--;
    }

    /**
     * 删除指定值的节点
    */
    public function deleteByValue($value)
    {
        $pre = $this->head;
        while ($pre->next) {
            if ($pre->value == $value) {
                $pre->next = $pre->next->next;
            }
            $pre = $pre->next;
        }
    }

    /**
     * 将链表中节点的值以字符串的方式输出
     *
     * @return string
     *
     * @time 2019-12-30
     */
    public function LinklistToString()
    {
        $pre = $this->head->next;
        while ($pre) {
            $list[] = $pre->value;
            $pre = $pre->next;
        }

        return implode('->', $list);
    }
}