#!/usr/bin/perl

# 

use warnings;
use strict;

my $numArgs = $#ARGV + 1;

if ($numArgs < 2) {

print "Usage: perl create_all_articles.pl <search_text_file> <attribute_file in profiles directory> \n";

exit 1 ;
};

#Get the Search Text
my $search_text_hash_ref = {};  # ref will return HASH
my $latex_text_hash_ref = {};  # ref will return HASH
my $level_hash_ref = {}; # ref will return HASH
my $meta_key_hash_ref = {}; # ref will return HASH
my $problem_number = 0;
my $search_text_file = $ARGV[0];
my $attribute_file = $ARGV[1];
my $search_text="";
my $latex_text="";
my $level = 1;
my $meta_key = "";

open(FILE1, $search_text_file);
my $c=0;
while (<FILE1>) {
$problem_number++ ;
my    $line=$_;
    #printf("line %2d: %s", $c++, $line);
  chomp;
my ($search_text,$latex_text,$level,$meta_key) = split(",");
 #print "Pretext: $name\n";
 #($problem_number) = $name =~ /(\d+)/;   # 123
 #print "Problem Number: $problem_number\n";
 #print "search text : $search_text\n";
 #print "Latex text : $latex_text\n";
$search_text_hash_ref->{ $problem_number } = $search_text;    
$latex_text_hash_ref->{ $problem_number} = $latex_text;
$level_hash_ref->{$problem_number} = $level;
$meta_key_hash_ref->{$problem_number} = $meta_key;
#print "$line";
#print "$search_text XXXX $latex_text XXXX $level XXXX $meta_key\n " ;
#print "---------\n";
 }
 close (FILE1);


# Defailts for attrbute_hash_ref
my %attribute_hash_ref ;  # ref will return HASH
my $product = "integral-calculus";
 $attribute_hash_ref{"product"} = "integral-calculus"; 
 $attribute_hash_ref{"root_directory"} = "/home/calculus/www/www/images/${product}/problems/";
 $attribute_hash_ref{"logical_root_directory"} = "images/${product}/problems/";
 $attribute_hash_ref{"question_directory"} = '';
 $attribute_hash_ref{"answer_directory"} = '';
 $attribute_hash_ref{"hints_directory"} = '';
 $attribute_hash_ref{"logical_hints_directory"} = '';
 $attribute_hash_ref{"problem_string"} = '';
 $attribute_hash_ref{"sql_id"} = 31000;
 $attribute_hash_ref{"asset_id"} = 78;
 $attribute_hash_ref{"catid"}=15;
 $attribute_hash_ref{"access"} = 6;
 my $tail_string='';
 my $end_of_problem_comma = ",\n" ;
 $attribute_hash_ref{"start_problems"} = 31;
 $attribute_hash_ref{"end_problems"} = 96;

open(FILE2, $attribute_file);


while (<FILE2>) {
my    $line=$_;
    #printf("line %2d: %s", $c++, $line);
  chomp;
my ($attribute_name, $attribute_value) = split("=");
 #print "${attribute_name},${attribute_value}\n";

$attribute_hash_ref { $attribute_name} = $attribute_value;
 #print "---------\n";
 }
 close (FILE2);

my $purchase_message = 0;
$product =  $attribute_hash_ref{"product"} ;
my $root_directory = $attribute_hash_ref{"root_directory"} ;
my $logical_root_directory = $attribute_hash_ref{"logical_root_directory"} ;
my $question_directory = $attribute_hash_ref{"question_directory"};
my $answer_directory = $attribute_hash_ref{"answer_directory"};
my $hints_directory = $attribute_hash_ref{"hints_directory"};
my $logical_hints_directory = $attribute_hash_ref{"logical_hints_directory"};
my $problem_string = $attribute_hash_ref{"problem_string"};
my $sql_id = $attribute_hash_ref{"sql_id"};
#print " sql_id = $sql_id ,  $attribute_hash_ref->{"sql_id"};\n";


my $asset_id = $attribute_hash_ref{"asset_id"};
my $catid = $attribute_hash_ref{"catid"};
my $access = $attribute_hash_ref{"access"};
my $start_problems = $attribute_hash_ref{"start_problems"};
my $end_problems = $attribute_hash_ref{"end_problems"};
   $purchase_message =$attribute_hash_ref{"purchase_message"};

opendir my $DIR, $root_directory or die "Error in opening dir '$root_directory' because: $!";


#Number of problems
#my $count_plus2 = grep -d "$root_directory/$_", readdir $DIR;
#my $count = $count_plus2 - 2;
#my $count = 25;
#print "problem count = $count \n";

closedir $DIR;


my $opening_string = q?INSERT INTO `math_content` (`id`, `asset_id`, `title`, `alias`, `introtext`, `fulltext`, `state`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`, `featured`, `language`, `xreference`) VALUES? ;


#Single or zero problems - no end of problem comma
my $count = $end_problems - $start_problems ;
#print "problem count = $count \n";

if ($count <= 1) {$end_of_problem_comma = "";}

#Delete the articles before adding the articles!
my $delete_articles_string = q?delete from math_content where id >= ?. $sql_id .q? and id <= ?. ($sql_id + $count).q?;? ;
print "$delete_articles_string \n" ;
print "$opening_string \n" ;




for (my $i = $start_problems; $i <= $end_problems; $i++)

 {
#print "start_problems = ${start_problems}";
#print "end problems = ${end_problems}";

my $product_index = "${product}.${i}";
my $latex_txt = $latex_text_hash_ref->{ $i} ;
my $search_txt = $search_text_hash_ref->{ $i} ; 
my $meta_keyword_txt = $meta_key_hash_ref->{ $i} ;
my $created_by_alias = q?'src="images/?.${product}.q?/problems/problem?.$i.q?/question/question?.$i.q?.jpg"'?;


  $problem_string = q?(?.$sql_id.q?,?.$asset_id.q?, 'Problem?.$i.q?', '?.$product_index.q?', '<p>&nbsp;</p>\r\n', '\r\n<p>&nbsp;</p>?;


#  $problem_string = q?(?.$sql_id.q?,?.$asset_id.q?, 'Problem?.$i.q?', '?.$product_index.q?', '<p>&nbsp;?.$search_txt.q?</p>\r\n', '\r\n<p>&nbsp;</p>?; 
#  $problem_string = q?(?.$sql_id.q?,?.$asset_id.q?, '?. $search_txt.q?', '?.$latex_txt.q?', '<p>&nbsp;?.$search_txt.q?</p>\r\n', '\r\n<p>&nbsp;</p>?;


  print "$problem_string" ;

  #For each problem: There is a question, hint, answer directory
  #Assumption: Number of hints = number of answer steps
  $question_directory = ${logical_root_directory}."problem${i}"."/question" ;
  $answer_directory = ${logical_root_directory}."problem${i}"."/answer" ;
  $hints_directory = ${root_directory}."problem${i}"."/hints";
 $logical_hints_directory = ${logical_root_directory}."problem${i}"."/hints";


  my $HINTS_DIR;
  opendir ($HINTS_DIR, $hints_directory) ; 
  if (!$HINTS_DIR) {next;}
 
  my $hints_count =  grep -f "$hints_directory/$_", readdir $HINTS_DIR;
	 $hints_count =  $hints_count/2; #now there is .gif and .jpg files - basically double the number of files

  #print "$hints_directory \n";
  #print "hints count = $hints_count \n";
my $j = 1;
if ($purchase_message == 1) 
{

# '<a href="https://www.mathproblemsolved.com/index.php/purchase2">Click here to purchase the full solution</a></p>'
         my $temp_string = q?\r\n<hr class="system-pagebreak" title="Hint?.
                $j.
                q?" />?.
		q?\r\n<h4 class="hint-title">Hint?.
                $j.
                q? </h4>?.
#Below: When hint was a text file
#               q?\r\n<p>&nbsp;?.$hint_file.q?</p>?.
                q?\r\n<p><img class="img-hintandsolution" src="?.${logical_hints_directory}.q?/hint?.${i}."_".${j}.".jpg".q?" alt="" /></p>\r\n<p>&nbsp;</p>?.

                q?\r\n<hr class="system-pagebreak" title="Solution Step?.$j.q?" />?.
                q?\r\n<p>&nbsp;</p>?.
                q?\r\n<p>&nbsp;</p>?.
                q?<a href="https://www.mathproblemsolved.com/index.php/purchase2">Click here to purchase the full solution</a></p>?;
        print $temp_string ;

}
elsif ($purchase_message == 2) {

# '<a href="https://www.mathproblemsolved.com/index.php/purchase2">Click here to purchase the full solution</a></p>'
         my $temp_string = q?\r\n<hr class="system-pagebreak" title="Hint?.
                $j.
                q?" />?.
                q?\r\n<h4 class="hint-title">Hint?.
                $j.
                q? </h4>?.
#Below: When hint was a text file
#               q?\r\n<p>&nbsp;?.$hint_file.q?</p>?.
                q?\r\n<p><img class="img-hintandsolution" src="?.${logical_hints_directory}.q?/hint?.${i}."_".${j}.".jpg".q?" alt="" /></p>\r\n<p>&nbsp;</p>?.

                q?\r\n<hr class="system-pagebreak" title="Solution Step?.$j.q?" />?.
                q?\r\n<p>&nbsp;</p>?.
                q?\r\n<p>&nbsp;</p>?.
                q?\r\n<p><img class="img-hintandsolution" src="?.${answer_directory}.q?/answer?.${i}."_".${j}.".jpg".q?" alt="" /></p>\r\n<p>&nbsp;</p>? ;
                #q?<a href="https://www.mathproblemsolved.com/index.php/purchase2">Click here to purchase the full solution</a></p>?;
        print $temp_string ;

}

else {
  for ( $j = 1; $j <= $hints_count ; $j++) 
	{
  	#print " j =  $j \n" ;
	#print "$hints_directory/hint${j}.txt\n" ;
	#my $hint_file = `cat $hints_directory/hint${j}.txt`;
	#print "$hint_file" ;
	 my $temp_string = q?\r\n<hr class="system-pagebreak" title="Hint?. 
		$j.
		q?" />?.
                q?\r\n<h4 class="hint-title">Hint?.
                $j.
                q? </h4>?.
#Below: When hint was a text file
#		q?\r\n<p>&nbsp;?.$hint_file.q?</p>?.
                q?\r\n<p><img class="img-hintandsolution" src="?.${logical_hints_directory}.q?/hint?.${i}."_".${j}.".jpg".q?" alt="" /></p>\r\n<p>&nbsp;</p>?. 

		q?\r\n<hr class="system-pagebreak" title="Solution Step?.$j.q?" />?.
                q?\r\n<h4 class="solution-title">Solution Step?.  $j.  q? </h4>?.
		q?\r\n<p>&nbsp;</p>?.
		q?\r\n<p>&nbsp;</p>?.
		q?\r\n<p><img class="img-hintandsolution" src="?.${answer_directory}.q?/answer?.${i}."_".${j}.".jpg".q?" alt="" /></p>\r\n<p>&nbsp;</p>? ;
	print $temp_string ;

}

}
# 1. Need to put back slashes in the image file. Although may not neeed it 
$tail_string = q?',1,?.$catid.q?, '2013-09-16 18:54:03', 119,?.$created_by_alias.q? , '2013-10-01 05:51:20', 119, 0,  '0000-00-00 00:00:00', '2013-09-16 18:54:03', '0000-00-00 00:00:00', '{"image_intro":"?.$question_directory.q?/question?.${i}.q?.jpg?.q?","float_intro":"","image_intro_alt":"Intro Image","image_intro_caption":"","image_fulltext":"?.$question_directory.q?/question?.${i}.q?.jpg?.q?", "float_fulltext":"","image_fulltext_alt":"Full Article Image","image_fulltext_caption":""}', '{"urla":false,"urlatext":"","targeta":"","urlb":false,"urlbtext":"","targetb":"","urlc":false,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 22, 1, '?.$meta_keyword_txt . q?', '?. $search_txt.q?',?. $access . q?, 0, '{"robots":"","author":"","rights":"","xreference":""}', 0, '*', '')?;

#No comma after the last problem
print "${tail_string}${end_of_problem_comma}";
if ($i >= $end_problems - 1) {$end_of_problem_comma = "";}

 $sql_id++ ;
 closedir $HINTS_DIR;

  
}
print ";\n";






#'\r\n<p>Next Step</p>\r\n<hr class="system-pagebreak" title="Hint1" />
#\r\n<p>&nbsp;</p>
#\r\n<p>&nbsp;</p>
#\r\n<p><img src="images/sampledata/fruitshop/tamarind.jpg" alt="" /></p>\r\n<hr class="system-pagebreak" title="Hint2" />
#\r\n<p>&nbsp;</p>
#\r\n<p>&nbsp;</p>
#\r\n<p><img src="images/headers/raindrops.jpg" alt="" /></p>
#\r\n<p>&nbsp;</p>\r\n<hr class="system-pagebreak" title="Hint3" />
#\r\n<p>&nbsp;</p>\r\n<p><img src="images/headers/maple.jpg" alt="" /></p>'
