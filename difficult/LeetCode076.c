int maxSum(int *a, int k)
{
    int n=4, max=0;
    int i, j, sum;
    //数组作为参数传递进来时，无法通过：n = sizeof(a)/sizeof(a[0]);获取数组长度
    //所以我这里直接给数组一个长度，仅仅是为了分析本题
    //平时大家可以在主函数中计算出长度之后，将长度作为一个参数传递进来

    for(i = 0; i < n-k+1; i++)
    {
        sum = 0;
        for(j=0; j < k; j++)
        {
            sum+=a[i+j];
        }
        if (sum > max)
        {
            max = sum;
        }
    }

    return max;
}

int maxSumWindow(int *a, int k)
{
    //数组作为参数传递进来时，无法通过：n = sizeof(a)/sizeof(a[0]);获取数组长度
    //所以我这里直接给数组一个长度，仅仅是为了分析本题
    //平时大家可以在主函数中计算出长度之后，将长度作为一个参数传递进来
    int maxSum = 0, n=4;
    int i, j, sum=0;
    for (i=0; i< k; i++)
    {
        maxSum += a[i];
    }

    sum = maxSum;

    for(j=k; j<n; j++)
    {
        sum += a[j] - a[j-k];
        if(sum > maxSum)
        {
            maxSum = sum;
        }
    }

    return maxSum;
}