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

my $new_base_path = "$real_question_directory/new_question${i}.jpg";
my $old_base_path = "$real_question_directory/question${i}.jpg";

my $correct_string;
my $incorrect_string;
my $path_to_solution;

#In case the path to the solution changes - use the command line option to modify the path
if ( $solution_directory eq "") {
	$path_to_solution = "<a href=".q?"https://www.mathproblemsolved.com/index.php/?.$product."/".$product_index."-".$product.q?"  target="_blank"/>Click for Complete solution</a>? ;
} else {
        $path_to_solution = "<a href=".q?"https://www.mathproblemsolved.com/index.php/?.$solution_directory."/".$product_index."-".$product.q?"  target="_blank"/>Click for Complete solution</a>? ;

}


# some questions have been rewritten to deal with multiple choice questions (esp in trig - where the question contains the identity to prove, while
# multiple choice questions require the Right Hand Side to be in the options.
#It is called new_question1.jpg (or whatever)
#If it exists use that - else use the original question

# Check if our Quiz option directory exists if not create it.
if (-e $new_base_path) {

    #file exists - set variable and other things
        $problem_string = q?"?.$product.q?","mchoice","",?.q?<p>Solve the following: </p>?.q?<p><img src="?.$question_directory.q?/new_question?.${i}.q?.jpg" alt="" /></p>?.q?,"10","1","1","TRUE",?.$path_to_solution.q?,?.$path_to_solution;

} elsif (-e $old_base_path) {
        $problem_string = q?"?.$product.q?","mchoice","",?.q?<p>Solve the following: </p>?.q?<p><img src="?.$question_directory.q?/question?.${i}.q?.jpg" alt="" /></p>?.q?,"10","1","1","TRUE",?.$path_to_solution.q?,?.$path_to_solution;

} else {
next PROBLEM;
};

#Check if option files exist - otherwise not suited for multiple choice quiz
my $option_string_check = $real_options_directory.q?/option?.${i}.q?_1.jpg? ;
  if (! -e $option_string_check) {
# Options do not exist - move on to next problem
next PROBLEM;
};

# Check if our Quiz option directory exists if not create it.
if (-e $real_options_directory_forQuiz ) {
#print "Directory  $real_options_directory_forQuiz  already exists \n";

} else {
#Create
mkdir(  $real_options_directory_forQuiz  ) or die "Couldn't create  $real_options_directory_forQuiz  directory, $!";
#print "Directory  $real_options_directory_forQuiz  created successfully\n";
};



my $first;
my $second;
my $third;
my $fourth;
my $first_correct;
my $second_correct;
my $third_correct;
my $fourth_correct;
my $random0thru3 = int(rand(4));
#print "RANDOM number is $random0thru3 \n" ;


switch($random0thru3){
   case 0    { $first = 1; $second = 2; $third = 3; $fourth = 4;  $first_correct = "TRUE"; $second_correct = "FALSE"; $third_correct = "FALSE" ; $fourth_correct="FALSE";}
   case 1    { $first = 4; $second = 1; $third = 2; $fourth = 3;  $first_correct = "FALSE"; $second_correct = "TRUE"; $third_correct = "FALSE" ; $fourth_correct="FALSE";}
   case 2    { $first = 3; $second = 4; $third = 1; $fourth = 2;  $first_correct = "FALSE"; $second_correct = "FALSE"; $third_correct = "TRUE" ; $fourth_correct="FALSE";}
   case 3    { $first = 2; $second = 3; $third = 4; $fourth = 1;  $first_correct = "FALSE"; $second_correct = "FALSE"; $third_correct = "FALSE" ; $fourth_correct="TRUE";}
   else      { print "Bad random number which is not 0 or 1 or 2 or 3" }
} ;

# Copy files to Options directory

copy("$real_options_directory/option${i}_1.jpg","$real_options_directory_forQuiz/option${i}_$first.jpg");
copy("$real_options_directory/option${i}_2.jpg","$real_options_directory_forQuiz/option${i}_$second.jpg");
copy("$real_options_directory/option${i}_3.jpg","$real_options_directory_forQuiz/option${i}_$third.jpg");
copy("$real_options_directory/option${i}_4.jpg","$real_options_directory_forQuiz/option${i}_$fourth.jpg");



#Now set the solutions
  
  $option1_string =  q?"","","?.$first_correct.q?",<p><img src="?.$options_directory_forQuiz.q?/option?.${i}.q?_1.jpg" alt="" /></p>,"0","","","","Correct. Check the solution if needed",""?;
  $option2_string =  q?"","","?.$second_correct.q?",<p><img src="?.$options_directory_forQuiz.q?/option?.${i}.q?_2.jpg" alt="" /></p>,"0","","","","Incorrect: Check solution",""?;
  $option3_string =  q?"","","?.$third_correct .q?",<p><img src="?.$options_directory_forQuiz.q?/option?.${i}.q?_3.jpg" alt="" /></p>,"0","","","","Incorrect: Check solution",""?;
  $option4_string =  q?"","","?.$fourth_correct.q?",<p><img src="?.$options_directory_forQuiz.q?/option?.${i}.q?_4.jpg" alt="" /></p>,"0","","","","Incorrect: Check solution",""?;


  print "$problem_string\r\n"."$option1_string\r\n"."$option2_string\r\n"."$option3_string\r\n"."$option4_string\r\n";


closedir $QUESTION_DIR;
 closedir $OPTIONS_DIR;
}
  
}
