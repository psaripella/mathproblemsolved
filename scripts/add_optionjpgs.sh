#!/bin/bash
args=("$@")
echo $# arguments passed
echo ${args[0]} 

if [ $# -lt  2 ]; then 

echo "Usage:"
echo " ../add_optionjpgs.sh <category> <no_of_problems>"
echo "category is one of trig-precalc, integral-calculus, differential-calculus,apcalculus"
exit 1

fi

cd /home/calculus/www/www/images/options/${args[0]}
# for i in {1..${args[1]}}
for ((i = 1; i <= $2; i++)); do

if [ -d /home/calculus/www/www/images/${args[0]}/problems/problem${i}/question ]; then
echo "Question dir exists"
if [[ ! -d /home/calculus/www/www/images/${args[0]}/problems/problem${i}/options ]]; then
echo "Options dir does not exist"
mkdir problems/problem${i}/options
fi
cp -f option${i}_*.gif  /home/calculus/www/www/images/${args[0]}/problems/problem${i}/options
cp -f JPEG/option${i}_*.jpg  /home/calculus/www/www/images/${args[0]}/problems/problem${i}/options
echo "Copied gif and jpg files"
fi
echo "Onto to next problem $i"


done
