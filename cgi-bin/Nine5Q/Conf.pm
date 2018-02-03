package Nine5Q::Conf;
##
## Conf.pm - Master configuration module
##
## Copyright (C) Bitstreet Internet
##
## $Author: Jarnold $  $Date: 7/25/07 10:14a $  $Revision: 5 $
## Change History:
## 07.25.2007 - pasted from ClassicWireless.com to use here

use strict;
use HTML::Template;
use DBI;
use Carp;
use HTML::Entities qw(encode_entities);

sub new { return bless {},__PACKAGE__ }

my $DBH  = '';
my $RDBH = '';

## template stuff
sub run_mode { 'production' }

sub home {
  my $home = '';
  if (&run_mode() eq 'production') {
    $home = '/kunden/homepages/9/d167950749/htdocs/95q';
  } else {
    $home = '/home/95q';
  }
  return $home;
}

sub tmpl { 
	my ($self,$tmpl,$opts) = @_;
  $opts = { loop_context_vars => 1, die_on_bad_params => 1 } unless ($opts);
	my $template = HTML::Template->new(filename => &home() . '/tmpl/' . $tmpl . '.tmpl',%$opts); 
	return $template;
}

## configuration variables
## Site Roots
sub site_root {
  my $site_root = "";
  if ( &run_mode() eq 'production' ) {
    $site_root = "http://www.95q.fm";
  } 
	if (&run_mode() eq 'dev') {
    $site_root = "http://10.128.2.44/www.95q.fm";
  }
  return $site_root;
}

sub cgi_root {
  my $cgi_root = "";
  if ( &run_mode() eq 'production' ) {
    $cgi_root = "http://www.95q.fm/cgi-bin";
  } else {
    $cgi_root = "/cgi-bin/95q";
  }
  return $cgi_root;
}

sub db_connect {
  my $dsn = "";
  my $user = '';
  my $pw = 'whirlwind';
  if ( &run_mode() eq 'production') {
    # prod server connect
    $dsn = "DBI:mysql:database=db206136389;host=db969.perfora.net";
    $user = 'dbo206136389';
  } else {
    # dev server connect
    $dsn = "DBI:mysql:database=db206136389;host=localhost";
    $user = 'jarnold';
  }
  return DBI->connect($dsn,$user,$pw)
    or croak "Unable to connect to database: $!\n";
}

sub db_remote_connect {
  my $dsn = '';
  my $user = '';
  my $pw = 'whirlwind';
  if ( &run_mode() eq 'production') {
    # prod server connect
    $dsn = "DBI:mysql:database=db206136389;host=db969.perfora.net";
    $user = 'dbo206136389';
  } else {
    # dev server connect
    $dsn = "DBI:mysql:database=db206136389;host=localhost";
    $user = 'jarnold';
  }
  return DBI->connect($dsn,$user,$pw)
    or croak "Unable to connect to database: $!\n";
}

## added 1/13/06 in support of view_news.cgi
sub db_query_no_parms {
  my ($self,$query) = @_;
  my ($h, $results);
  $DBH = &db_connect() unless ($DBH);
  $h = $DBH->prepare($query) or croak $h->errstr;
  $h->execute() or croak $h->errstr;
  return $h;
}

##
sub db_query {
  my ($self,$query, $vals) = @_;
  my ($h, $results);
  $DBH = &db_connect() unless ($DBH);
  $h = $DBH->prepare($query) or croak $h->errstr;
  $h->execute(@$vals) or croak $h->errstr;
  return $h;
}

##
sub db_cached_query {
  my ($self,$query, $vals) = @_;
  my ($h, $results);
  $DBH = &db_connect() unless ($DBH);
  $h = $DBH->prepare_cached($query) or croak $h->errstr;
  $h->execute(@$vals) or croak $h->errstr;
  return $h;
}

##
sub db_remote_query {
  my ($self,$query, $vals) = @_;
  my ($h, $results);
  $RDBH = &db_remote_connect() unless ($RDBH);
  $h = $RDBH->prepare($query) or croak $h->errstr;
  $h->execute(@$vals) or croak $h->errstr;
  return $h;
}

###
sub db_remote_cached_query {
  my ($self,$query, $vals) = @_;
  my ($h, $results);
  $RDBH = &db_remote_connect() unless ($RDBH);
  $h = $RDBH->prepare_cached($query) or croak $h->errstr;
  $h->execute(@$vals) or croak $h->errstr;
  return $h;
}

## encode form stuff
sub encode_html {
	my ($self,$F) = shift;
	foreach(keys %$F) {
		$F->{$_} = encode_entities($F->{$_});
	}
}

## configuration variables
sub max_thumb_width { 100 }
sub max_thumb_height { 75 }
sub max_link_thumb_width { 120 }
sub max_link_thumb_height { 55 }

sub h_thumb_width { 100 }
sub h_thumb_height { 75 }
sub v_thumb_width { 50 }
sub v_thumb_height { 150 }

sub h_max_constr_width { 250}
sub h_max_constr_height { 250 }
sub v_max_constr_width { 250 }
sub v_max_constr_height { 250 }

# photo items
sub photos_dir { 
  if (&run_mode() eq 'production') {
    return &home() . '/photos';
  } else {
    return &home() . '/webapp/photos';
  }
}
sub photos_dir_URL { "/photos" }

sub rpp_photos { 1 } # results per page - photos

## clean chars from a string -- primarily used for creating files
sub sanitize_string {
	my ($self, $str) = @_;
	$str =~ s#[^a-zA-Z0-9._-]#_#g;
	$str =~ s#_+#_#;
	return $str;
}

## Get file size
sub get_filesize {
	my ($self,$file) = @_;
	my @tmp = stat($file) or die "Couldn't stat $file: $!\n";
	my $size = $tmp[7]; # in bytes
	
	if($size >= 1024) {
		$size = $size / 1024; # K
		if($size >= 1024) {
			$size = $size / 1024; # MB
			$size = sprintf("%.2f MB",$size);
		}
		else {
			$size = sprintf("%.1f K",$size);
		}
	}
	else {
		$size = "$size bytes";
	}
	
	return $size;
}

1;
