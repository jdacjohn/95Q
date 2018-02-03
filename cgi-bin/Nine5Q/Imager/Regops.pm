# AUTOMATICALLY GENERATED BY regops.perl
package Imager::Regops;
use strict;
require Exporter;
use vars qw(@ISA @EXPORT @EXPORT_OK %Attr $MaxOperands $PackCode);
@ISA = qw(Exporter);
@EXPORT_OK = qw(%Attr $MaxOperands $PackCode);

use constant RBC_ADD => 0;
use constant RBC_SUBTRACT => 1;
use constant RBC_MULT => 2;
use constant RBC_DIV => 3;
use constant RBC_MOD => 4;
use constant RBC_POW => 5;
use constant RBC_UMINUS => 6;
use constant RBC_MULTP => 7;
use constant RBC_ADDP => 8;
use constant RBC_SUBTRACTP => 9;
use constant RBC_SIN => 10;
use constant RBC_COS => 11;
use constant RBC_ATAN2 => 12;
use constant RBC_SQRT => 13;
use constant RBC_DISTANCE => 14;
use constant RBC_GETP1 => 15;
use constant RBC_GETP2 => 16;
use constant RBC_GETP3 => 17;
use constant RBC_VALUE => 18;
use constant RBC_HUE => 19;
use constant RBC_SAT => 20;
use constant RBC_HSV => 21;
use constant RBC_RED => 22;
use constant RBC_GREEN => 23;
use constant RBC_BLUE => 24;
use constant RBC_RGB => 25;
use constant RBC_INT => 26;
use constant RBC_IF => 27;
use constant RBC_IFP => 28;
use constant RBC_LE => 29;
use constant RBC_LT => 30;
use constant RBC_GE => 31;
use constant RBC_GT => 32;
use constant RBC_EQ => 33;
use constant RBC_NE => 34;
use constant RBC_AND => 35;
use constant RBC_OR => 36;
use constant RBC_NOT => 37;
use constant RBC_ABS => 38;
use constant RBC_RET => 39;
use constant RBC_JUMP => 40;
use constant RBC_JUMPZ => 41;
use constant RBC_JUMPNZ => 42;
use constant RBC_SET => 43;
use constant RBC_SETP => 44;
use constant RBC_PRINT => 45;
use constant RBC_RGBA => 46;
use constant RBC_HSVA => 47;
use constant RBC_ALPHA => 48;
use constant RBC_LOG => 49;
use constant RBC_EXP => 50;
use constant RBC_OP_COUNT => 51;

@EXPORT = qw(RBC_ADD RBC_SUBTRACT RBC_MULT RBC_DIV RBC_MOD RBC_POW RBC_UMINUS RBC_MULTP RBC_ADDP RBC_SUBTRACTP RBC_SIN RBC_COS RBC_ATAN2 RBC_SQRT RBC_DISTANCE RBC_GETP1 RBC_GETP2 RBC_GETP3 RBC_VALUE RBC_HUE RBC_SAT RBC_HSV RBC_RED RBC_GREEN RBC_BLUE RBC_RGB RBC_INT RBC_IF RBC_IFP RBC_LE RBC_LT RBC_GE RBC_GT RBC_EQ RBC_NE RBC_AND RBC_OR RBC_NOT RBC_ABS RBC_RET RBC_JUMP RBC_JUMPZ RBC_JUMPNZ RBC_SET RBC_SETP RBC_PRINT RBC_RGBA RBC_HSVA RBC_ALPHA RBC_LOG RBC_EXP RBC_OP_COUNT);

%Attr = (
          'abs' => {
                     'func' => 1,
                     'opcode' => 38,
                     'parms' => 1,
                     'result' => 'r',
                     'types' => 'r'
                   },
          'add' => {
                     'func' => 0,
                     'opcode' => 0,
                     'parms' => 2,
                     'result' => 'r',
                     'types' => 'rr'
                   },
          'addp' => {
                      'func' => 0,
                      'opcode' => 8,
                      'parms' => 2,
                      'result' => 'p',
                      'types' => 'pp'
                    },
          'alpha' => {
                       'func' => 1,
                       'opcode' => 48,
                       'parms' => 1,
                       'result' => 'r',
                       'types' => 'p'
                     },
          'and' => {
                     'func' => 0,
                     'opcode' => 35,
                     'parms' => 2,
                     'result' => 'r',
                     'types' => 'rr'
                   },
          'atan2' => {
                       'func' => 1,
                       'opcode' => 12,
                       'parms' => 2,
                       'result' => 'r',
                       'types' => 'rr'
                     },
          'blue' => {
                      'func' => 1,
                      'opcode' => 24,
                      'parms' => 1,
                      'result' => 'r',
                      'types' => 'p'
                    },
          'cos' => {
                     'func' => 1,
                     'opcode' => 11,
                     'parms' => 1,
                     'result' => 'r',
                     'types' => 'r'
                   },
          'distance' => {
                          'func' => 1,
                          'opcode' => 14,
                          'parms' => 4,
                          'result' => 'r',
                          'types' => 'rrrr'
                        },
          'div' => {
                     'func' => 0,
                     'opcode' => 3,
                     'parms' => 2,
                     'result' => 'r',
                     'types' => 'rr'
                   },
          'eq' => {
                    'func' => 0,
                    'opcode' => 33,
                    'parms' => 2,
                    'result' => 'r',
                    'types' => 'rr'
                  },
          'exp' => {
                     'func' => 1,
                     'opcode' => 50,
                     'parms' => 1,
                     'result' => 'r',
                     'types' => 'r'
                   },
          'ge' => {
                    'func' => 0,
                    'opcode' => 31,
                    'parms' => 2,
                    'result' => 'r',
                    'types' => 'rr'
                  },
          'getp1' => {
                       'func' => 1,
                       'opcode' => 15,
                       'parms' => 2,
                       'result' => 'p',
                       'types' => 'rr'
                     },
          'getp2' => {
                       'func' => 1,
                       'opcode' => 16,
                       'parms' => 2,
                       'result' => 'p',
                       'types' => 'rr'
                     },
          'getp3' => {
                       'func' => 1,
                       'opcode' => 17,
                       'parms' => 2,
                       'result' => 'p',
                       'types' => 'rr'
                     },
          'green' => {
                       'func' => 1,
                       'opcode' => 23,
                       'parms' => 1,
                       'result' => 'r',
                       'types' => 'p'
                     },
          'gt' => {
                    'func' => 0,
                    'opcode' => 32,
                    'parms' => 2,
                    'result' => 'r',
                    'types' => 'rr'
                  },
          'hsv' => {
                     'func' => 1,
                     'opcode' => 21,
                     'parms' => 3,
                     'result' => 'p',
                     'types' => 'rrr'
                   },
          'hsva' => {
                      'func' => 1,
                      'opcode' => 47,
                      'parms' => 4,
                      'result' => 'p',
                      'types' => 'rrrr'
                    },
          'hue' => {
                     'func' => 1,
                     'opcode' => 19,
                     'parms' => 1,
                     'result' => 'r',
                     'types' => 'p'
                   },
          'if' => {
                    'func' => 1,
                    'opcode' => 27,
                    'parms' => 3,
                    'result' => 'r',
                    'types' => 'rrr'
                  },
          'ifp' => {
                     'func' => 1,
                     'opcode' => 28,
                     'parms' => 3,
                     'result' => 'p',
                     'types' => 'rpp'
                   },
          'int' => {
                     'func' => 1,
                     'opcode' => 26,
                     'parms' => 1,
                     'result' => 'r',
                     'types' => 'r'
                   },
          'jump' => {
                      'func' => 0,
                      'opcode' => 40,
                      'parms' => 0,
                      'result' => undef,
                      'types' => ''
                    },
          'jumpnz' => {
                        'func' => 0,
                        'opcode' => 42,
                        'parms' => 1,
                        'result' => undef,
                        'types' => 'r'
                      },
          'jumpz' => {
                       'func' => 0,
                       'opcode' => 41,
                       'parms' => 1,
                       'result' => undef,
                       'types' => 'r'
                     },
          'le' => {
                    'func' => 0,
                    'opcode' => 29,
                    'parms' => 2,
                    'result' => 'r',
                    'types' => 'rr'
                  },
          'log' => {
                     'func' => 1,
                     'opcode' => 49,
                     'parms' => 1,
                     'result' => 'r',
                     'types' => 'r'
                   },
          'lt' => {
                    'func' => 0,
                    'opcode' => 30,
                    'parms' => 2,
                    'result' => 'r',
                    'types' => 'rr'
                  },
          'mod' => {
                     'func' => 0,
                     'opcode' => 4,
                     'parms' => 2,
                     'result' => 'r',
                     'types' => 'rr'
                   },
          'mult' => {
                      'func' => 0,
                      'opcode' => 2,
                      'parms' => 2,
                      'result' => 'r',
                      'types' => 'rr'
                    },
          'multp' => {
                       'func' => 0,
                       'opcode' => 7,
                       'parms' => 2,
                       'result' => 'p',
                       'types' => 'pr'
                     },
          'ne' => {
                    'func' => 0,
                    'opcode' => 34,
                    'parms' => 2,
                    'result' => 'r',
                    'types' => 'rr'
                  },
          'not' => {
                     'func' => 0,
                     'opcode' => 37,
                     'parms' => 1,
                     'result' => 'r',
                     'types' => 'r'
                   },
          'op_count' => {
                          'func' => 0,
                          'opcode' => 51,
                          'parms' => 0,
                          'result' => undef,
                          'types' => ''
                        },
          'or' => {
                    'func' => 0,
                    'opcode' => 36,
                    'parms' => 2,
                    'result' => 'r',
                    'types' => 'rr'
                  },
          'pow' => {
                     'func' => 0,
                     'opcode' => 5,
                     'parms' => 2,
                     'result' => 'r',
                     'types' => 'rr'
                   },
          'print' => {
                       'func' => 0,
                       'opcode' => 45,
                       'parms' => 1,
                       'result' => undef,
                       'types' => 'r'
                     },
          'red' => {
                     'func' => 1,
                     'opcode' => 22,
                     'parms' => 1,
                     'result' => 'r',
                     'types' => 'p'
                   },
          'ret' => {
                     'func' => 0,
                     'opcode' => 39,
                     'parms' => 1,
                     'result' => undef,
                     'types' => 'p'
                   },
          'rgb' => {
                     'func' => 1,
                     'opcode' => 25,
                     'parms' => 3,
                     'result' => 'p',
                     'types' => 'rrr'
                   },
          'rgba' => {
                      'func' => 1,
                      'opcode' => 46,
                      'parms' => 4,
                      'result' => 'p',
                      'types' => 'rrrr'
                    },
          'sat' => {
                     'func' => 1,
                     'opcode' => 20,
                     'parms' => 1,
                     'result' => 'r',
                     'types' => 'p'
                   },
          'set' => {
                     'func' => 0,
                     'opcode' => 43,
                     'parms' => 1,
                     'result' => 'r',
                     'types' => 'r'
                   },
          'setp' => {
                      'func' => 0,
                      'opcode' => 44,
                      'parms' => 1,
                      'result' => 'p',
                      'types' => 'p'
                    },
          'sin' => {
                     'func' => 1,
                     'opcode' => 10,
                     'parms' => 1,
                     'result' => 'r',
                     'types' => 'r'
                   },
          'sqrt' => {
                      'func' => 1,
                      'opcode' => 13,
                      'parms' => 1,
                      'result' => 'r',
                      'types' => 'r'
                    },
          'subtract' => {
                          'func' => 0,
                          'opcode' => 1,
                          'parms' => 2,
                          'result' => 'r',
                          'types' => 'rr'
                        },
          'subtractp' => {
                           'func' => 0,
                           'opcode' => 9,
                           'parms' => 2,
                           'result' => 'p',
                           'types' => 'pp'
                         },
          'uminus' => {
                        'func' => 0,
                        'opcode' => 6,
                        'parms' => 1,
                        'result' => 'r',
                        'types' => 'r'
                      },
          'value' => {
                       'func' => 1,
                       'opcode' => 18,
                       'parms' => 1,
                       'result' => 'r',
                       'types' => 'p'
                     }
        );
$MaxOperands = 4;
$PackCode = "i";
1;

__END__

=head1 NAME

Imager::Regops - generated information about the register based VM

=head1 SYNOPSIS

  use Imager::Regops;
  $Imager::Regops::Attr{$opname}->{opcode} # opcode for given operator
  $Imager::Regops::Attr{$opname}->{parms} # number of parameters
  $Imager::Regops::Attr{$opname}->{types} # types of parameters
  $Imager::Regops::Attr{$opname}->{func} # operator is a function
  $Imager::Regops::Attr{$opname}->{result} # r for numeric, p for pixel result
  $Imager::Regops::MaxOperands; # maximum number of operands

=head1 DESCRIPTION

This module is generated automatically from regmach.h so we don't need to
maintain the same information in at least one extra place.

At least that's the idea.

=head1 AUTHOR

Tony Cook, tony@develop-help.com

=head1 SEE ALSO

perl(1), Imager(3), http://imager.perl.org/

=cut

