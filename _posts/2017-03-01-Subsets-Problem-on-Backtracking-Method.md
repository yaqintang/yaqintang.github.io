---
layout: post
title:  "Subsets-Problem-on-Backtracking-Method"
date:   2017-03-01
bookmark: algorithm
summary: In backtracking algorithms you try to build a solution one step at a time. If at some step it become clear that the current path that you are on cannot lead to a solution you go back to the previous step (backtrack) and choose a different path.
---

Given a set of distinct integers, nums, return all possible subsets.

{% highlight python %}
class Solution(object):
    def subsets(self, nums):
        """
        :type nums: List[int]
        :rtype: List[List[int]]
        """
        if len(nums) == 0:
            return [[]]
        result = []
        self.subset(result, [], 0, nums)
        return result

    def subset(self, result, subList, start, nums):
        if subList not in result:
            result.append(list(subList))
        for indx in xrange(start, len(nums)):
            subList.append(nums[indx])
            self.subset(result, subList, indx + 1, nums)
            subList.pop()
{% endhighlight %}