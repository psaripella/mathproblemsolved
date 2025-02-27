#!/bin/bash
if [ $# -ne 3 ]
then

echo "Error: "
echo "Usage: create_structure.sh category low_index high_index"
echo "./create_structure.sh trig-precalc 1 92"
exit 1

fi 
low_index=$2
high_index=$3
category_dir=$1
cd  /home/calculus/www/www/images/${category_dir}

echo "$category_dir   $low_index  $high_index"

if [-d problems]
then

mkdir problems
fi
exit 0
for (( i=$low_index; i<=$high_index; i++ ))
 do
echo creating/dealing with problem${i}
mkdir problems/problem${i}
mkdir problems/problem${i}/question
mkdir problems/problem${i}/answer
mkdir problems/problem${i}/hints
mkdir problems/problem${i}/options
cp gif_images/question${i}.gif problems/problem${i}/question
cp gif_images/new_question${i}.gif problems/problem${i}/question
cp gif_images/answer${i}_*.gif problems/problem${i}/answer
cp gif_images/hint${i}_*.gif problems/problem${i}/hints
cp gif_images/option${i}_*.gif problems/problem${i}/options

cp jpg_images/question${i}.jpg problems/problem${i}/question
cp jpg_images/new_question${i}.jpg problems/problem${i}/question
cp jpg_images/answer${i}_*.jpg problems/problem${i}/answer
cp jpg_images/hint${i}_*.jpg problems/problem${i}/hints
cp jpg_images/option${i}_*.jpg problems/problem${i}/options

done

exit 0
