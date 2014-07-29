#!/usr/bin/perl

# 

use warnings;
use strict;

#Get the Search Text
my $search_text_hash_ref = {};  # ref will return HASH
my $problem = 0;
my $search_text_file = $ARGV[0];
open(FILE1, $search_text_file);
my $c=0;
while (<FILE1>) {
my    $line=$_;
    #printf("line %2d: %s", $c++, $line);
  chomp;
my ($name, $problem_text) = split(":");
 #print "Pretext: $name\n";
 ($problem) = $name =~ /(\d+)/;   # 123
 #print "Problem Number: $problem\n";
 #print "Text: $problem_text\n";
my $key_text ="integral-calculus".${problem} ;
$search_text_hash_ref->{ $key_text } = $problem_text;    
 #print "---------\n";
 }
 close (FILE);
$c=0;
#Get the Latex text
my $latex_text_hash_ref = {};  # ref will return HASH
my $latex_text_file = $ARGV[1];
open(FILE1, $latex_text_file);

 while (<FILE1>) {
my    $line=$_;
   # printf("line %2d: %s", $c++, $line);
  chomp;
 my ($name, $problem_text) = split(":");
 #print "Pretext: $name\n";
 ($problem) = $name =~ /(\d+)/;   # 123
 #print "Problem Number: $problem\n";
#print "Text: $problem_text\n";
my  $key_text ="integral-calculus".${problem} ;
$latex_text_hash_ref->{ $key_text } = $problem_text;
 
# print "---------\n";
 }
 close (FILE);

my $root_directory = '/home/calculus/www/www/images/integral-calculus/problems/';
my $logical_root_directory = 'images/integral-calculus/problems/'; 
my $question_directory = '';
my $answer_directory = '';
my $hints_directory = '';
my $logical_hints_directory = '';
my $problem_string = '';
my $sql_id = 31000;
my $asset_id = 82;
my $catid=15;
my $tail_string = '';
my $end_of_problem_comma = ",\n" ;


#my $dos_root_directory = q?c:\kumar\calculus\problems\?;
#my $dos_question_directory = '';
#my $dos_answer_directory = '';
#my $dos_hints_directory = '';

opendir my $DIR, $root_directory or die "Error in opening dir '$root_directory' because: $!";


#Number of problems
my $count_plus2 = grep -d "$root_directory/$_", readdir $DIR;
my $count = $count_plus2 - 2;
#my $count = 25;
#print "problem count = $count \n";

closedir $DIR;

my $opening_string = q?INSERT INTO `math_content` (`id`, `asset_id`, `title`, `alias`, `introtext`, `fulltext`, `state`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`, `featured`, `language`, `xreference`) VALUES? ;

print "$opening_string" ; 

#Single or zero problems - no end of problem comma
if ($count <= 1) {$end_of_problem_comma = "";}


for (my $i = 1; $i <= $count ; $i++)

 {
my $product =  $ARGV[2].$i;
my $latex_insert = $latex_text_hash_ref->{ $product} ;
my $search_txt = $search_text_hash_ref->{ $product} ; 
  $problem_string = q?(?.$sql_id.q?,?.$asset_id.q?, 'Problem?.$i.q?', '?.$product.q?', '<p>&nbsp;?.$search_txt.q?</p>\r\n', '\r\n<p>&nbsp;</p>?; 

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

#  print "$hints_directory \n";
#  print "hints count = $hints_count \n";

  for (my $j = 1; $j <= $hints_count ; $j++) 
	{
  	#print " j =  $j \n" ;
	#print "$hints_directory/hint${j}.txt\n" ;
	#my $hint_file = `cat $hints_directory/hint${j}.txt`;
	#print "$hint_file" ;
	 my $temp_string = q?\r\n<hr class="system-pagebreak" title="Hint?. 
		$j.
		q?" />?.
#Below: When hint was a text file
#		q?\r\n<p>&nbsp;?.$hint_file.q?</p>?.
                q?\r\n<p><img src="?.${logical_hints_directory}.q?/hint?.${i}."_".${j}.".jpg".q?" alt="" /></p>\r\n<p>&nbsp;</p>?. 

		q?\r\n<hr class="system-pagebreak" title="Solution Step?.$j.q?" />?.
		q?\r\n<p>&nbsp;</p>?.
		q?\r\n<p>&nbsp;</p>?.
		q?\r\n<p><img src="?.${answer_directory}.q?/answer?.${i}."_".${j}.".jpg".q?" alt="" /></p>\r\n<p>&nbsp;</p>? ;
	print $temp_string ;

}
# 1. Need to put back slashes in the image file. Although may not neeed it 
$tail_string = q?',1,?.$catid.q?, '2013-09-16 18:54:03', 119, '', '2013-10-01 05:51:20', 119, 0,  '0000-00-00 00:00:00', '2013-09-16 18:54:03', '0000-00-00 00:00:00', '{"image_intro":"?.$question_directory.q?/question?.${i}.q?.jpg?.q?","float_intro":"","image_intro_alt":"Intro Image","image_intro_caption":"","image_fulltext":"?.$question_directory.q?/question?.${i}.q?.jpg?.q?", "float_fulltext":"","image_fulltext_alt":"Full Article Image","image_fulltext_caption":""}', '{"urla":false,"urlatext":"","targeta":"","urlb":false,"urlbtext":"","targetb":"","urlc":false,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 22, 1, '', '', 6, 0, '{"robots":"","author":"","rights":"","xreference":""}', 0, '*', '')?;

#No comma after the last problem
print "${tail_string}${end_of_problem_comma}";
if ($i >= $count - 1) {$end_of_problem_comma = "";}

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
