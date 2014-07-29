#/usr/bin/perl

my $problem = 0;
open(FILE1, $ARGV[0]);
$c=0;
while (<FILE1>) {
    $line=$_;
    printf("line %2d: %s", $c++, $line);
  chomp;
 ($name, $problem_text) = split(":");
 print "Pretext: $name\n";
 ($problem) = $name =~ /(\d+)/;   # 123
 print "Problem Number: $problem\n";
 print "Text: $problem_text\n";
 print "---------\n";
 }
 close (FILE);
 exit;
