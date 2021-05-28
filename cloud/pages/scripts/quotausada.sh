#!/bin/bash
usada=$(repquota -u /dev/md0 | egrep "$1" | cut -d "-" -f3 | cut -d" " -f2)
total=$(repquota -u /dev/md0 | egrep "$1" | cut -d "-" -f3 | cut -d" " -f3)
echo $((($usada*100)/$total))

