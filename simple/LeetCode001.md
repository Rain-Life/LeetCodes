>题目：给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标

你可以假设每种输入只会对应一个答案。但是，数组中同一个元素不能使用两遍

 
示例:
```
给定 nums = [2, 7, 11, 15], target = 9

因为 nums[0] + nums[1] = 2 + 7 = 9
所以返回 [0, 1]
```

方法一：暴力解法

>思路：
>将数组中的所有可能的两两组合进行相加，然后和目标数字比较，如果相等，那么这两个元素所对应的下标就是我们想要的结果。相信聪明的你已经想到通过双层for循环来解决

```
class LeetCode0001
{
    public function twoSum($nums, $target)
    {
        $len = count($nums);
        for($i = 0; $i< $len; $i++) {
            for ($j=$i+1; $j<$len;$j++) {
                if ($nums[$i] + $nums[$j] == $target) {
                    return [$i, $j];
                }
            }
        }
    }
}
```
时间复杂度为：O(n^2)
空间复杂度：O(1)

方法二：数组翻转

思路：
```
A + B = target
A和B是数组中的元素，targer为目标值
```
换种思路，既然数组中两个元素的和为目标数，也就是说

1. 拿目标值targer减去一个数组中的元素A/B，得到的值A/B，也一定是在数组中的一个元素
2. 这种方式可以方便的找到这两个值，问题是，题目要求拿到对应的值的下标
3. 那如果，每当我拿目标数target减数组中的一个元素A/B时，都把这个**被减的元素A/B**，当作**下标**放入到一个新的数组中，将**该元素的下标当作新数组对应的值**
4. 此时就可以巧妙的应用php中的array_key_exists函数，判断目标值target减A/B的结果是否是新数组中的某一个元素的下标，则这个下标对应的值，就是我们要找的原数组中该元素对应的下标

描述有点抽象，代码一看就明白，直接上代码
```
class LeetCode0001{
    public function twoSume2($nums, $target)
    {
        $len = count($nums);
        $flip = [];
        for ($i=0; $i<$len; $i++) {
            $findValue = $target-$nums[$i];
            if (array_key_exists($findValue, $flip)) {
                return [$flip[$findValue], $i];
            }

            $flip[$nums[$i]] = $i;
        }
    }
}
```
时间复杂度：O(n)
空间复杂度：O(n)
拿空间换时间的一种做法

