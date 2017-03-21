---
layout: post
title:  "K Sum Problem"
date:   2016-12-30
bookmark: algorithm
summary: The base idea is to use hash table in 2sum to make it O(N) complexity. If need to find unique solution, need to use sort() and set() sometimes.
---

Two Sum Problem
{% highlight python %}
class Solution(object):
    def twoSum(self, nums, target):
        """
        :type nums: List[int]
        :type target: int
        :rtype: List[int]
        """
        dict = {}
        for indx in xrange(len(nums)):
            if dict.has_key(target - nums[indx]):
                return [dict[target - nums[indx]], indx]
            else:
                dict[nums[indx]] = indx
        return []
{% endhighlight %}

Four Sum Problem
{% highlight python %}
class Solution(object):
    def fourSum(self, nums, target):
        """
        :type nums: List[int]
        :type target: int
        :rtype: List[List[int]]
        """
        if len(nums) <= 3:
            return []
        nums.sort()
        result = set()
        for indx, val in enumerate(nums[:-3]):
            for secIndx in xrange(indx + 1, len(nums) - 2):  # at this point, becomes 2sum problem
                dic = {}  # need to find 2sum goal = target -val - nums[secIndx]
                for innerIndx in xrange(secIndx+1, len(nums)):
                    if target - val - nums[secIndx] - nums[innerIndx] not in dic:
                        dic[nums[innerIndx]] = 1
                    else:
                        result.add((target - val - nums[secIndx] - nums[innerIndx], val, nums[secIndx], nums[innerIndx]))
        return map(list, result)
{% endhighlight %}