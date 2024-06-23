#!/usr/bin/perl

# Parse replication files and find last node id.
# Written by Ilya Zverev, licensed WTFPL.

use strict;
use LWP::Simple;
use IO::Uncompress::Gunzip;

my $wget = `/usr/bin/which wget` || 'wget';
$wget =~ s/\s//s;
my $verbose = 0;
my $state_url = 'https://planet.openstreetmap.org/replication/minute';
my $output = '/var/www/sites/textual.ru/www/64/lastid';

my $ua = LWP::UserAgent->new();
$ua->env_proxy;

    my $resp = $ua->get($state_url.'/state.txt');
    die "Cannot download $state_url/state.txt: ".$resp->status_line unless $resp->is_success;
    print STDERR "Reading state from $state_url/state.txt\n" if $verbose;
    $resp->content =~ /sequenceNumber=(\d+)/;
    die "No sequence number in downloaded state.txt" unless $1;
    my $state = $1;
    my $lastid = 0;

    while( $lastid <= 0 ) {
        my $osc_url = $state_url.sprintf("/%03d/%03d/%03d.osc.gz", int($state/1000000), int($state/1000)%1000, $state%1000);
        print STDERR $osc_url.': ' if $verbose;
        open FH, "$wget -q -O- $osc_url|" or die "Failed to open: $!";
        $lastid = get_last_id(new IO::Uncompress::Gunzip(*FH));
        close FH;
        $state--;
    }
    open STATE, ">$output" or die "Cannot write to $output";
    print STATE $lastid;
    close STATE;

sub get_last_id {
    my $handle = shift;
    my $lastid = 0;
    while(<$handle>) {
        if( /^\s*<node.*? id="(\d+)"/ ) {
            $lastid = $1 if $1 > $lastid;
        }
    }
    return $lastid;
}
