---
layout: post
title: "Weighted Quick Union with Path Compression"
date: 2017-03-16
bookmark: algorithm
summary: To solve the dynamic connectivity problem, we need to use an efficient way to find if two nodes are connected, if not, connect them.
---

Keep the tree almost flat. O(logN)

{% highlight python %}
class WeightedQuickUnionPathCompression(object):
    def __init__(self, N):
        self.idArray = [i for i in xrange(N)]
        self.sizeArray = [1] * N

    def root(self, i):
        while self.idArray[i] != i:
            self.idArray[i] = self.idArray[self.idArray[i]]
            i = self.idArray[i]
        return i

    def connected(self, p, q):
        return self.root(p) == self.root(q)

    def union(self, p, q):
        i, j = self.root(p), self.root(q)
        if i == j: return
        if self.sizeArray[i] < self.sizeArray[j]:
            self.idArray[i] = j
            self.sizeArray[j] += self.sizeArray[i]
        else:
            self.idArray[j] = i
            self.sizeArray[i] += self.sizeArray[j]
{% endhighlight %}