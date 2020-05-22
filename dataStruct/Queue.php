<?php

class MyCircularQueue {
    /**
     * Initialize your data structure here. Set the size of the queue to be k.
     * @param Integer $k
     */
    private $size;
    private $queue;
    private $head;
    private $tail;
    function __construct($k) {
        $this->size = $k;
        $this->queue = [];
        $this->head = -1;
        $this->tail = -1;
    }

    /**
     * Insert an element into the circular queue. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function enQueue($value) {
        if ($this->isFull()) {
            return false;
        }

        if ($this->isEmpty()) {
            $this->head = 0;
        }
        $this->tail = ($this->tail+1) % $this->size;

        return true;
    }

    /**
     * Delete an element from the circular queue. Return true if the operation is successful.
     * @return Boolean
     */
    function deQueue() {
        if ($this->isEmpty()) {
            return false;
        }

        if ($this->head == $this->tail) {
            $this->head = -1;
            $this->tail = -1;

            return true;
        }

        $this->head = ($this->head+1) % $this->size;

        return true;
    }

    /**
     * Get the front item from the queue.
     * @return Integer
     */
    function Front() {
        if ($this->isEmpty()) {
            return -1;
        }

        return $this->queue[$this->head];
    }

    /**
     * Get the last item from the queue.
     * @return Integer
     */
    function Rear() {
        if ($this->isEmpty()) {
            return -1;
        }

        return $this->queue[$this->tail];
    }

    /**
     * Checks whether the circular queue is empty or not.
     * @return Boolean
     */
    function isEmpty() {
        return $this->head == -1;
    }

    /**
     * Checks whether the circular queue is full or not.
     * @return Boolean
     */
    function isFull() {
        return (($this->tail + 1) % $this->size) == $this->head;
    }
}

/**
 * Your MyCircularQueue object will be instantiated and called as such:
 * $obj = MyCircularQueue($k);
 * $ret_1 = $obj->enQueue($value);
 * $ret_2 = $obj->deQueue();
 * $ret_3 = $obj->Front();
 * $ret_4 = $obj->Rear();
 * $ret_5 = $obj->isEmpty();
 * $ret_6 = $obj->isFull();
 */
$obj = new MyCircularQueue(5);
$ret_1 = $obj->enQueue(1);
var_dump($ret_1);

