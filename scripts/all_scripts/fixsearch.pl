#!/usr/bin/perl

# 

use warnings;
use strict;

#Get the Search Text

for (my $i = 10; $i < 66; $i++)
{
my $j=$i+31;

print q? UPDATE `math_content` SET `created_by_alias` = 'src\=\"images/integral-calculus/problems/problem?.$j.q?/question/question?.$j.q?.jpg\"'?."\n";
print q?WHERE `id`=320?.$i.q?;?."\n";

}
