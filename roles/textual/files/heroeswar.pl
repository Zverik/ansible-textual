#!/usr/bin/perl
use strict;
use LWP::Simple;
use CGI qw/param/;
my $warid = param('warid') || 329094467;
die "Incorrect warid" if $warid !~ /^\d+$/;
my $table = 'analyze';#param('table');
my $url = $table eq 'analyze' ? "http://bizzle.ru/hwm/gv/index.php?warid=$warid" : "http://www.heroeswm.ru/battle.php?warid=$warid&lastturn=-1";
my $battle = get $url;
#my $header = "Content-type: text/csv; charset=windows-1251; header=absent\n\n";
my $header = "Content-type: text/plain; charset=windows-1251\n\n";
if( !$table ) {
	$battle =~ s/\|/\n/g;
	$battle =~ s/;/\n\n\n/g;
	print $battle;
} elsif( $table eq 'turns' ) {
	$battle =~ s/<font.+?\|#//;
	my @turns = grep {s/:/,/} ($battle =~ />(\d+:.*?)[;<]/g);
	print $header;
	print "$_\r\n" foreach @turns;
} elsif( $table eq 'sides' ) {
	$battle =~ s/<font.+?\|#//;
	my @sides = grep {s/([\d.]{50,})(@.+?~)?([a-z])/'"'.$1.'",'.str_replace(',','|',$2).','.$3/e} grep {s/[:|]/,/g} ($battle =~ /(M\d\d\d:.*?)\^/g);
	print $header;
	print "$_\r\n" foreach @sides;
} elsif( $table eq 'analyze' ) {
	my ($nickname, $level, $wonmark, $carname) = ($battle =~ />([\w\d-_]+)\[(\d+)\].+? vs <i>(<b>)?([^<]+)/);
	my ($expexp, $expskill, $recexp, $recskill, $cartype) = ($battle =~ /<td.+?<b>(\d+)<\/b>[^<]+<b>([\d.]+)<\/b>.+?<tr>.+?<b>(\d+)<\/b>[^<]+<b>([\d.]+)<\/b>.+?\*<\/td><td><b>([^<]+)/);
	my $won = $wonmark ? 0 : 1;
	print "Content-type: text/plain; charset=utf-8\n\n";
	print "Nickname,Level,Won,Expected,ExpBySkill,Received,RecBySkill,CaravanName,CaravanType\r\n";
	print "$nickname,$level,$won,$expexp,$expskill,$recexp,$recskill,$carname,$cartype\r\n";
}

sub str_replace {
	my ($from, $to, $string, $global) = @_;

	my $l = length($from);
	my $p = 0 ; # current position

	while ( ($p = index($string, $from, $p)) >= 0 ) {
		substr($string, $p, $l) = $to ;
		$global and last ;
	}
	return $string ;
}