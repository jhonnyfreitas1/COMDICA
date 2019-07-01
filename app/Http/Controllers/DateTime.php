<?php
namespace App\Http\Controllers\DateTime;

class DateTime implements DateTimeInterface {
/* Constantes */
const string ATOM = "Y-m-d\TH:i:sP" ;
const string COOKIE = "l, d-M-Y H:i:s T" ;
const string ISO8601 = "Y-m-d\TH:i:sO" ;
const string RFC822 = "D, d M y H:i:s O" ;
const string RFC850 = "l, d-M-y H:i:s T" ;
const string RFC1036 = "D, d M y H:i:s O" ;
const string RFC1123 = "D, d M Y H:i:s O" ;
const string RFC2822 = "D, d M Y H:i:s O" ;
const string RFC3339 = "Y-m-d\TH:i:sP" ;
const string RSS = "D, d M Y H:i:s O" ;
const string W3C = "Y-m-d\TH:i:sP" ;
/* Métodos */
public __construct ([ string $time = "now" [, DateTimeZone $timezone = NULL ]] )
public add ( DateInterval $interval ) : DateTime
public static createFromFormat ( string $format , string $time [, DateTimeZone $timezone = date_default_timezone_get() ] ) : DateTime
public static createFromImmutable ( DateTimeImmutable $datetime ) : DateTime
public static getLastErrors ( void ) : array
public modify ( string $modify ) : DateTime
public static __set_state ( array $array ) : DateTime
public setDate ( int $year , int $month , int $day ) : DateTime
public setISODate ( int $year , int $week [, int $day = 1 ] ) : DateTime
public setTime ( int $hour , int $minute [, int $second = 0 ] ) : DateTime
public setTimestamp ( int $unixtimestamp ) : DateTime
public setTimezone ( DateTimeZone $timezone ) : DateTime
public sub ( DateInterval $interval ) : DateTime
public diff ( DateTimeInterface $datetime2 [, bool $absolute = false ] ) : DateInterval
public format ( string $format ) : string
public getOffset ( void ) : int
public getTimestamp ( void ) : int
public getTimezone ( void ) : DateTimeZone
public __wakeup ( void )
}