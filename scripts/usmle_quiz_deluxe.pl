#!/usr/bin/perl

# 

use warnings;
use strict;
use Switch;
use File::Find;
use File::Copy;

my $numArgs = $#ARGV + 1;

if ($numArgs < 4) {

print "Usage: perl quiz_deluxe.pl <product> <start_probem> <end_problem> <start of DB ID> <optional solution path>\n";

exit 1 ;
};
my $problem_number = 0;


my %attribute_hash_ref ;  # ref will return HASH
my $product = $ARGV[0];
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
 $attribute_hash_ref{"start_problems"} = $ARGV[1];
 $attribute_hash_ref{"end_problems"} = $ARGV[2];
 $attribute_hash_ref{"start_DB_id"} = $ARGV[3];


my $root_directory = $attribute_hash_ref{"root_directory"} ;
my $logical_root_directory = $attribute_hash_ref{"logical_root_directory"} ;
my $question_directory = $attribute_hash_ref{"question_directory"};
my $answer_directory = $attribute_hash_ref{"answer_directory"};
my $hints_directory = $attribute_hash_ref{"hints_directory"};
my $options_directory = $attribute_hash_ref{"options_directory"};
my $options_directory_forQuiz;
my $logical_hints_directory = $attribute_hash_ref{"logical_hints_directory"};
my $problem_string = $attribute_hash_ref{"problem_string"};
my $real_question_directory;
my $real_answer_directory;
my $real_hints_directory;
my $real_options_directory;
my $real_options_directory_forQuiz;


#print " sql_id = $sql_id ,  $attribute_hash_ref->{"sql_id"};\n";


my $start_problems = $attribute_hash_ref{"start_problems"};
my $end_problems = $attribute_hash_ref{"end_problems"};
my $start_DB_id =  $attribute_hash_ref{"start_DB_id"};

opendir my $DIR, $root_directory or die "Error in opening dir '$root_directory' because: $!";


closedir $DIR;
my $first_line = q?"question category","question type","is correct","question/answer text","points","attempts","random","is feedback","correct feedback text","incorrect feedback text"?;
  print "${first_line}\r\n" ;



#Single or zero problems - no end of problem comma
my $count = $end_problems - $start_problems ;
#print "problem count = $count \n";

if ($count <= 1) {$end_of_problem_comma = "";};

my $solution_directory = "";
if ($ARGV[4])  {
	$solution_directory = $ARGV[4];
}

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

my $product_index = $start_DB_id + $i - 1 ;
#<p><img src="images/integral-calculus/problems/problem1/question/question1.jpg" alt="" /></p>
#https://www.mathproblemsolved.com/index.php/trig-precalc/12002-trig-precalc.3
  $real_question_directory = ${root_directory}."problem${i}"."/question" ;
  $real_answer_directory = ${root_directory}."problem${i}"."/answer" ;
  $real_hints_directory = ${root_directory}."problem${i}"."/hints";
  $real_options_directory =${root_directory}."problem${i}"."/options";
  $real_options_directory_forQuiz = ${root_directory}."problem${i}"."/options/forQuiz";
  $question_directory = ${logical_root_directory}."problem${i}"."/question" ;
  $answer_directory = ${logical_root_directory}."problem${i}"."/answer" ;
  $hints_directory = ${logical_root_directory}."problem${i}"."/hints";
  $options_directory ="https://mathproblemsolved.com/".${logical_root_directory}."problem${i}"."/options";
  $options_directory_forQuiz ="https://mathproblemsolved.com/".${logical_root_directory}."problem${i}"."/options/forQuiz";
 
opendir  $QUESTION_DIR, $real_question_directory or next PROBLEM;
opendir  $OPTIONS_DIR, $real_options_directory or next PROBLEM;

  opendir ($QUESTION_DIR, $real_question_directory) ;
  opendir ($OPTIONS_DIR, $real_options_directory) ;

  if ($QUESTION_DIR && $OPTIONS_DIR) {

if (! -e "$real_question_directory/question${i}.txt") {
# Question does not exist - move on to next problem
next PROBLEM;
};


#In case the path to the solution changes - use the command line option to modify the path
my $path_to_solution;
if ( $solution_directory eq "") {
	$path_to_solution = "<a href=".q?"https://www.mathproblemsolved.com/index.php/?.$product."/".$product_index."-".$product.q?"  target="_blank"/>Click for Complete solution</a>? ;
} else {
        $path_to_solution = "<a href=".q?"https://www.mathproblemsolved.com/index.php/?.$solution_directory."/".$product_index."-".$product.q?"  target="_blank"/>Click for Complete solution</a>? ;

}

my $question_content ;
    open(my $fh, '<', "$real_question_directory/question${i}.txt") or die "cannot open file "."$question_directory/question${i}.txt";
    {
        local $/;
        $question_content = <$fh>;
    }
    close($fh);
$question_content = clean ($question_content);
$problem_string =  q?"?.$product.q?","mchoice","",?.q?<p>?.$question_content.q? </p>?.q?<p></p>?.q?,"10","1","1","TRUE",?.$path_to_solution.q?,?.$path_to_solution;

print "$problem_string \r\n";



my $option_string_check = $real_options_directory.q?/option?.${i}.q?_1.txt? ;
  if (! -e $option_string_check) {
# Options do not exist - move on to next problem
next PROBLEM;
};

my $first_option_string = "";
my $correct_option_string = "" ;
my $incorrect_option_string = "";


    open( $fh, '<', "$real_options_directory/option${i}_1.txt") or die "cannot open file "."$real_options_directory/option${i}_1.txt" ;
    {
        local $/;
        $first_option_string = <$fh>;
    }
    close($fh);
$first_option_string = clean ($first_option_string);
$correct_option_string =  q?"","","?."TRUE".q?",<p>?.$first_option_string.q?</p>,"0","","","","Correct. Check the solution if needed",""?;
print "$correct_option_string\r\n";

my $j = 2;
my $next_option_string_check;
my $next_option_string;
while () {

  $next_option_string_check = $real_options_directory.q?/option?.${i}.q?_?.${j}.q?.txt? ;

#print "I is $i , J is ${j}, option string is $next_option_string_check is " ;

# No more problems
 if (! -e $next_option_string_check)  { last }; 

 open(my $fh, '<', $next_option_string_check) or die "cannot open file ".$next_option_string_check ;
    {
        local $/;
        $next_option_string = <$fh>;
    }
 close($fh);

$next_option_string_check = clean ($next_option_string);

  $incorrect_option_string =  q?"","","?."FALSE".q?",<p>?.$next_option_string_check.q?</p>,"0","","","","Incorrect: Check solution",""?;
$j++ ;
print "$incorrect_option_string\r\n";
}


closedir $QUESTION_DIR;
closedir $OPTIONS_DIR;
}
  
}

sub clean {

    my $text = shift;

    $text =~ s/\n//g;
    $text =~ s/\r//g;
    $text =~ s/,/;/g;

    return $text;
}
