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
