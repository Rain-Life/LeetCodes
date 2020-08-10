#include <stdio.h>
#include <stdlib.h>
#include <malloc.h>

typedef struct
{
    char data[20];
    int length;
}SqList;

/**
 * 初始化线性表
*/
void InitList(SqList *&L)
{
    L = (SqList *)malloc(sizeof(SqList));
    L->length = 0;

}

/**
 * 销毁线性表
*/
void DestroyList(SqList *&L)
{
    free(L);
}

/**
 * 判断该顺序表是不是空表
*/
bool ListEmpty(SqList *L)
{
    return (L->length == 0);
}

/**
 * 获取线性表长度
*/
int ListLength(SqList * L)
{
    return (L->length);
}

/**
 * 输出线性表中所有的值
*/
void DispList(SqList *L)
{
    int i;
    if(ListEmpty(L)) return;

    for(i=0;i<L->length;i++)
    {
        printf("%c  ", L->data[i]);
    }
    printf("\n");
}

/**
 * 获取线性表中指定位置的元素的值
*/
bool GetElem(SqList *L, int i, char &e)
{
    if(i<1 || i > L->length) return false;
    e = L->data[i-1];

    return true;
}

/**
 * 查找线性表中是否存在指定的元素
*/
int LocateElem(SqList *L, char e)
{
    int i=0;
    while(i<L->length && L->data[i] != e) i++;

    if(i>=L->length)
    {
        return 0;
    }
    else
    {
        return i+1;
    }

}

/**
 * 向线性表中插入元素
*/
bool ListInsert(SqList *&L, int i, char e)
{
    int j;
    if(i<1 || i>L->length+1) return false;
    i--;
    for(j=L->length;j>i;j--)
    {
        L->data[j] = L->data[j-1];
    }
    L->data[i] = e;
    L->length++;

    return true;
}

/**
 * 删除线性表中指定位置的元素
*/
bool ListDelete(SqList *&L, int i, char &e)
{
    int j;
    if(j<1 || j>L->length) return false;
    i--;
    e = L->data[i];
    for(j=1; j<L->length-1;j++)
    {
        L->data[j] = L->data[j+1];
    }
    L->length--;

    return true;
}

int main()
{

}