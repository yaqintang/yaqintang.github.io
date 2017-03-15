---
layout: post
title:  "-welcome-to-sfo!-welcome-to-sfo!-welcome-to--sfo!"
date:   2017-02-10 00:10:45
categories: jekyll update
summary: this a summary mmary of the content of this post...this a summary of the content of this post...this a summary of the content of this post...summary of the content
---
# Number of Connected Components in an Undirected Graph

> Given n nodes labeled from 0 to n - 1 and a list of undirected edges (each edge is a pair of nodes), write a function to find the number of connected components in an undirected graph.

> Example 1:

> ```
     0          3
     |          |
     1 --- 2    4
Given n = 5 and edges = [[0, 1], [1, 2], [3, 4]], return 2.
```

> Example 2:

> ```
     0           4
     |           |
     1 --- 2 --- 3
Given n = 5 and edges = [[0, 1], [1, 2], [2, 3], [3, 4]], return 1.
```

> Note:

> You can assume that no duplicate edges will appear in edges. Since all edges are undirected, [0, 1] is the same as [1, 0] and thus will not appear together in edges.

```Python
class Solution(object):
    def countComponents(self, n, edges):
        """
        :type n: int
        :type edges: List[List[int]]
        :rtype: int
        """
        UF = UnionFind(n)
        for i, node in enumerate(edges):
            UF.union(node[0], node[1])
        return UF.countHead

class UnionFind(object):
    def __init__(self, N):
        self.idArray = [i for i in xrange(N)]
        self.sizeArray = [1] * N
        self.countHead = N

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
        self.countHead -= 1
```

