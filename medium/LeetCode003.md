>题目：给定一个字符串，请你找出其中不含有重复字符的最长**子串**的长度

示例1：
```
输入: "abcabcbb"
输出: 3 
解释: 因为无重复字符的最长子串是 "abc"，所以其长度为 3
```

示例2：
```
输入: "bbbbb"
输出: 1
解释: 因为无重复字符的最长子串是 "b"，所以其长度为 1
```

示例3：
```
输入: "pwwkew"
输出: 3
解释: 因为无重复字符的最长子串是 "wke"，所以其长度为 3
```

>请注意，你的答案必须是**子串**的长度，"pwke" 是一个子序列，不是子串

#### 暴力解法
>思路：
暴力解法很简单，就是找出所有的不含重复字符的子串，计算每个子串的长度，取出最长的那个，就是本题的答案

PHP代码实现：
```
public function lengthOfLongestSubstringForce($s)
    {
        $len = strlen($s);
        if ($len <=1) {
            return $len;
        }
        $max = 0;

        for ($i=0; $i<$len; $i++) {
            $str = '';
            for ($j=$i; $j<$len; $j++) {
                if (strpos($str, $s[$j]) === false) {
                    $str .= $s[$j];
                    continue;
                }
                break;
            }
            $max = max($max, strlen($str));
        }

        return $max;
    }
```


#### 滑动窗口解法
滑动窗口算法通常都是用来解决找数组或者字符串的子元素问题，能把一个嵌套的循环转换成一个单循环，从而降低时间复杂度，如果对时间复杂度不是很熟悉的，可以看我的这篇文章：一文吃透滑动窗口算法

所以本题通过滑动窗口算法，是一个不错的选择，可以降低暴力解法的时间复杂度

思路：
>以示例3给的字符串**pwwkew**为例来分析本题。既然是使用滑动窗口的解法，通常借助双指针或者通过map来维护窗口，我这里使用双指针来维护这个窗口，具体如下：
>
>1、首先有一个左指针和一个又指针，开始时，都指向字符串的第一个字符。此时窗口中只有字符串中的第一个元素
>2、右指针向右移动一位，如果窗口中没有右指针所指向的字符，则将该元素放入窗口中，右指针继续向右移动
>3、如果右指针当前所指向的元素在窗口中，则将窗口中，**该字符以及该字符之前的元素均移出窗口**，此时左指针指向该字符的下一个字符的位置
>4、在每一次移动的过程中，都计算出窗口的长度，当整个过程结束之后，也就取到了过程中窗口的最大值

文字描述比较抽象，下边是图例：

![](https://imgkr.cn-bj.ufileos.com/b1717c35-497d-494b-ba4f-fa4477923b79.png)

最后一步没有画，因为最后一个元素w在窗口中，所以将窗口中w及之前的元素从窗口中移除

C代码实现：
```
int lengthOfLongestSubstringWindow(char *s)
{
    int index[128] = {0};//记录s中每一个字符在s中的位置
    int left =0, max=0, count=0;
    int i;
    for (i=0; s[i]!='\0'; i++)
    {
        if(index[s[i]] > left)
        {
            count = i-left;
            left = index[s[i]];
            if(count > max)
            {
                max = count;
            }
        }
        index[s[i]] = i+1;
    }

    count = i-left;
    if(count > max)
    {
        max = count;
    }

    return max;
}
```


PHP代码实现：
```
public function lengthOfLongestSubstringWindow($s)
    {
        $len = strlen($s);
        if ($len <= 1) {
            return $len;
        }
        $max = 0;
        $hash = [];
        $left = 0;
        for ($right = 0; $right < $len; $right++) {
            $char = substr($s, $right, 1);
            if (isset($hash[$char])) {
                $left = max($left, $hash[$char] + 1);
            }
            $hash[$char] = $right;
            $max = max($max, $right - $left + 1);
        }
        return $max;
    }
```
