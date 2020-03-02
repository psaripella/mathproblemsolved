#/usr/bin/bash

for i in {26..100}
do
ls ~/www/www/images/integral-calculus/problem_dump/question${i}.gif
mkdir ~/www/www/images/integral-calculus/problems/problem${i}
mkdir  ~/www/www/images/integral-calculus/problems/problem${i}/question
mv ~/www/www/images/integral-calculus/problem_dump/question${i}.gif ~/www/www/images/integral-calculus/problems/problem${i}/question
mkdir ~/www/www/images/integral-calculus/problems/problem${i}/hints
mkdir ~/www/www/images/integral-calculus/problems/problem${i}/answer

done
