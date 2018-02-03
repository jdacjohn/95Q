package Imager::Font::BBox;
use strict;
use vars qw($VERSION);

$VERSION = "1.005";

=head1 NAME

Imager::Font::BBox - objects representing the bounding box of a string.

=head1 SYNOPSIS

  use Imager::Font;

  # get the object
  my $font = Imager::Font->new(...);
  my $bbox = $font->bounding_box(string=>$text, size=>$size);

  # methods
  my $start = $bbox->start_offset;
  my $left_bearing = $bbox->left_bearing;
  my $right_bearing = $bbox->right_bearing;
  my $end = $bbox->end_offset;
  my $gdescent = $box->global_descent;
  my $gascent = $bbox->global_ascent;
  my $ascent = $bbox->ascent;
  my $decent = $bbox->descent;
  my $total_width = $bbox->total_width;
  my $fheight = $bbox->font_height;
  my $theight = $bbox->text_height;
  my $display_width = $bbox->display_width;

=head1 DESCRIPTION

Objects of this class are returned by the Imager::Font bounding_box()
method when it is called in scalar context.

This will hopefully make the information from this method more
accessible.

=head1 METHODS

=over

=item start_offset()

Returns the horizonatal offset from the selected drawing location to
the left edge of the first character drawn.  If this is positive, the
first glyph is to the right of the drawing location.

The alias neg_width() is present to match the bounding_box()
documentation for list context.

The alias left_bearing() is present to match font terminology.

=cut

sub start_offset {
  return $_[0][0];
}

sub neg_width {
  return $_[0][0];
}

sub left_bearing {
  return $_[0][0];
}

=item end_offset()

The offset from the selected drawing location to the right edge of the
last character drawn.  Should always be positive.

You can use the alias pos_width() if you are used to the
bounding_box() documentation for list context.

=cut

sub end_offset {
  return $_[0][2];
}

sub pos_width {
  return $_[0][2];
}

=item global_descent()

The lowest position relative to the font baseline that any character
in the font reaches in the character cell.  Normally negative.

At least one font we've seen has reported a positive number for this.

=cut

sub global_descent {
  return $_[0][1];
}

=item global_ascent()

The highest position relative to the font baseline that any character
in the font reaches in the character cell.  Normally positive.

=cut

sub global_ascent {
  return $_[0][3];
}

=item descent()

The lowest position relative to the font baseline that any character
in the supplied string reaches.  Negative when any character's glyph
reaches below the baseline.

=cut

sub descent {
  return $_[0][4];
}

=item ascent()

The highest position relative to the font baseline that any character
in the supplied string reaches.  Positive if any character's glyph
reaches above the baseline.

=cut

sub ascent {
  return $_[0][5];
}

=item advance_width()

The advance width of the string, if the driver supports that,
otherwise the same as end_offset.

=cut

sub advance_width {
  my $self = shift;

  @$self > 6 ? $self->[6] : $self->[2];
}

=item total_width()

The total displayed width of the string.

=cut

sub total_width {
  my $self = shift;

  $self->end_offset - $self->start_offset;
}

=item font_height()

The maximum displayed height of any string using this font.

=cut

sub font_height {
  my $self = shift;
  $self->global_ascent - $self->global_descent;
}

=item text_height()

The displayed height of the supplied string.

=cut

sub text_height {
  my $self = shift;

  $self->ascent - $self->descent;
}

=item right_bearing

The distance from the right of the last glyph to the end of the advance
point.

If the glyph overflows the right side of the advance width this value
is negative.

=cut

sub right_bearing {
  my $self = shift;

  @$self >= 8 && return $self->[7]; # driver gives it to us

  # otherwise the closest we have is the difference between the 
  # end_pos and advance_width
  return $self->advance_width - $self->pos_width;
}

=item display_width

The distance from the left-most pixel of the left-most glyph to the
right-most pixel of the right-most glyph.

Equals advance_width - left_bearing - right_bearing (and implemented
that way.)

=cut

sub display_width {
  my ($self) = @_;

  $self->advance_width - $self->left_bearing - $self->right_bearing;
}

=back

=head1 INTERNAL FUNCTIONS

=over

=item new(...)

Called by Imager::Font->bounding_box() to create the object.

=cut

sub new {
  my $class = shift;
  return bless [ @_ ], $class;
}

=back

=head1 BUGS

Doesn't reproduce the functionality that you get using the x and y
parameters to Imager::Font->bounding_box().  I considered:

  my ($left, $top, $right, $bottom) = $box->offset(x=>$x, y=>$y)

but this is about as clumsy as the original.

=head1 AUTHOR

Tony Cook <tony@develop-help.com>

=head1 SEE ALSO

Imager(3), Imager::Font(3)

=cut

1;

