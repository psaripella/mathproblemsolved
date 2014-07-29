#!/usr/bin/perl

# 

use warnings;
use strict;

#Get the Search Text
my $search_text_hash_ref = {};  # ref will return HASH
my $latex_text_hash_ref={} ; # ref will return HASH
my $problem_number = 0;

my $search_text_file = $ARGV[0];

my $search_text="";
my $latex_text="";
my $group_txt= "";

my $FILE1;
open($FILE1, $search_text_file);

my $c=0;
while (<$FILE1>) {
my    $line=$_;
    #printf("line %2d: %s", $c++, $line);
  chomp;
my ($name, $search_text, $latex_text, $group_txt) = split(",");
 #print "Pretext: $name\n";
 ($problem_number) = $name =~ /(\d+)/;   # 123
 #print "Problem Number: $problem_number\n";
 #print "search text : $search_text\n";
 #print "Latex text : $latex_text\n";
 #print "Group: $group_txt\n";


$search_text_hash_ref->{ $problem_number } = $search_text;
$latex_text_hash_ref->{ $problem_number} = $latex_text;
 #print "---------\n";
 }
 close ($FILE1);





# Defailts for attrbute_hash_ref
my %attribute_hash_ref ;  # ref will return HASH
my $product = $ARGV[1];
if (!$product) { $product = "integral-calculus";};
 $attribute_hash_ref{"product"} = $product;
 $attribute_hash_ref{"root_directory"} = "/home/calculus/www/www/images/${product}/problems/";
 $attribute_hash_ref{"logical_root_directory"} = "images/${product}/problems/";
 $attribute_hash_ref{"question_directory"} = '';
 $attribute_hash_ref{"answer_directory"} = '';
 $attribute_hash_ref{"hints_directory"} = '';
 $attribute_hash_ref{"logical_hints_directory"} = '';
 $attribute_hash_ref{"problem_string"} = '';
 my $tail_string='';
 my $end_of_problem_comma = ",\n" ;
 $attribute_hash_ref{"start_problems"} = $ARGV[2];
 $attribute_hash_ref{"end_problems"} = $ARGV[3];

#my $FILE2;
#open($FILE2, $attribute_file);


#while (<$FILE2>) {
#my    $line=$_;
    #printf("line %2d: %s", $c++, $line);
#  chomp;
#my ($attribute_name, $attribute_value) = split("=");
 #print "${attribute_name},${attribute_value}\n";

#$attribute_hash_ref { $attribute_name} = $attribute_value;
 #print "---------\n";
# }
# close ($FILE2);

$product =  $attribute_hash_ref{"product"} ;
my $root_directory = $attribute_hash_ref{"root_directory"} ;
my $logical_root_directory = $attribute_hash_ref{"logical_root_directory"} ;
my $question_directory = $attribute_hash_ref{"question_directory"};
my $answer_directory = $attribute_hash_ref{"answer_directory"};
my $hints_directory = $attribute_hash_ref{"hints_directory"};
my $options_directory = $attribute_hash_ref{"options_directory"};
my $logical_hints_directory = $attribute_hash_ref{"logical_hints_directory"};
my $problem_string = $attribute_hash_ref{"problem_string"};

my $real_question_directory;
my $real_answer_directory;
my $real_hints_directory;
my $real_options_directory;

#print " sql_id = $sql_id ,  $attribute_hash_ref->{"sql_id"};\n";


my $start_problems = $attribute_hash_ref{"start_problems"};
my $end_problems = $attribute_hash_ref{"end_problems"};

opendir my $DIR, $root_directory or die "Error in opening dir '$root_directory' because: $!";


#Number of problems
#my $count_plus2 = grep -d "$root_directory/$_", readdir $DIR;
#my $count = $count_plus2 - 2;
#my $count = 25;
#print "problem count = $count \n";

closedir $DIR;

my $opening_string = q?group,problem_text,correct_answers,incorrect_options,level,point_value,result_text,status?;

print "$opening_string\n" ; 

#Single or zero problems - no end of problem comma
my $count = $end_problems - $start_problems ;
#print "problem count = $count \n";

if ($count <= 1) {$end_of_problem_comma = "";};

my $group_string = "1";
my $option1_string = "";
my $option2_string = "";
my $option3_string = "";
my $option4_string = "";
my $option234_string ="";
my $level = "1";
my $point_value = "1" ;
my $result_text = "";
my $status = "1";
  my $QUESTION_DIR;
  my $OPTIONS_DIR;


PROBLEM: for (my $i = $start_problems; $i <= $end_problems; $i++) {
#print "start_problems = ${start_problems}";
#print "end problems = ${end_problems}";
#Printing group strng

my $product_index = "${product}.${i}";
#<p><img src="images/integral-calculus/problems/problem1/question/question1.jpg" alt="" /></p>
  $real_question_directory = ${root_directory}."problem${i}"."/question" ;
  $real_answer_directory = ${root_directory}."problem${i}"."/answer" ;
  $real_hints_directory = ${root_directory}."problem${i}"."/hints";
  $real_options_directory =${root_directory}."problem${i}"."/options";
  $question_directory = ${logical_root_directory}."problem${i}"."/question" ;
  $answer_directory = ${logical_root_directory}."problem${i}"."/answer" ;
  $hints_directory = ${logical_root_directory}."problem${i}"."/hints";
  $options_directory =${logical_root_directory}."problem${i}"."/options";

opendir  $QUESTION_DIR, $real_question_directory or next PROBLEM;
opendir  $OPTIONS_DIR, $real_options_directory or next PROBLEM;

  opendir ($QUESTION_DIR, $real_question_directory) ;
  opendir ($OPTIONS_DIR, $real_options_directory) ;

  if ($QUESTION_DIR && $OPTIONS_DIR) {

  $problem_string = q?<p>Solve the following: </p>?.q?<p><img src="?.$question_directory.q?/question?.${i}.q?.jpg" alt="" /></p>,?;
  $option1_string =  q?<p><img src="?.$options_directory.q?/option?.${i}.q?_1.jpg" alt="" /></p>,?;
  $option2_string =  q?<p><img src="?.$options_directory.q?/option?.${i}.q?_2.jpg" alt="" /></p>?;
  $option3_string =  q?<p><img src="?.$options_directory.q?/option?.${i}.q?_3.jpg" alt="" /></p>?;
  $option4_string =  q?<p><img src="?.$options_directory.q?/option?.${i}.q?_4.jpg" alt="" /></p>,?;
  $option234_string =  $option2_string.q?|?.$option3_string.q?|?.$option4_string;



#  $problem_string = q?(?.$sql_id.q?,?.$asset_id.q?, 'Problem?.$i.q?', '?.$product_index.q?', '<p>&nbsp;?.$search_txt.q?</p>\r\n', '\r\n<p>&nbsp;</p>?; 
#  $problem_string = q?(?.$sql_id.q?,?.$asset_id.q?, '?. $search_txt.q?', '?.$latex_txt.q?', '<p>&nbsp;?.$search_txt.q?</p>\r\n', '\r\n<p>&nbsp;</p>?;


  print "${group_string}," ;

  print "$problem_string" ;

  print "$option1_string" ;
  print "$option234_string" ;
  print "$level,"."$point_value,".$result_text.","."$status" ;


 
  #print "$hints_directory \n";
  #print "hints count = $hints_count \n";

# 1. Need to put back slashes in the image file. Although may not neeed it 

#No comma after the last problem
print "\n";
closedir $QUESTION_DIR;
 closedir $OPTIONS_DIR;
}
  
}
