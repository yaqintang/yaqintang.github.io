---
layout: post
title:  "Clone Graph"
date:   2017-02-10
bookmark: algorithm
summary: Clone an undirected graph. Each node in the graph contains a label and a list of its neighbors.
---

BFS. Besides general bfs, need to maintain a hash table to map the original node with new node, this is the key to link the node with its neighbors.

{% highlight python %}
# Definition for a undirected graph node
# class UndirectedGraphNode:
#     def __init__(self, x):
#         self.label = x
#         self.neighbors = []

class Solution:
    # @param node, a undirected graph node
    # @return a undirected graph node
    def cloneGraph(self, node):
        if not node: return node
        nodeCopy = UndirectedGraphNode(node.label)
        nodeDict = {node: nodeCopy}
        level = [node]
        while level:
            n = level.pop(0)
            for nb in n.neighbors:
                if nb not in nodeDict:   # nb not visited
                    nbCopy = UndirectedGraphNode(nb.label)
                    nodeDict[nb] = nbCopy
                    nodeDict[n].neighbors.append(nbCopy)
                    level.append(nb)
                else:   # nb visited, no need to create new node copy, append to neighbor list
                    nodeDict[n].neighbors.append(nodeDict[nb])
        return nodeCopy
{% endhighlight %}