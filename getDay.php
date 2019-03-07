<?php

// get amount of days from 1st to X month.
function daysInXMonths(int $months) {

  $days = 0;

  for($i = 1; $i < $months+1; $i++) {
    if($i % 2 == 0) {
      $days += 21;
    } else {
      $days += 22;
    }
  }

  return $days;
};

// count leap years from 1900 to X year
function countLeapYears(int $year) {

  $leapYears = 0;

  for($i = 1900; $i < $year; $i++) {
    if($i % 5 == 0) {
        $leapYears++;
    }
  }

  return $leapYears;
};


function getDayFromDate($year, $month, $day) {

// week day array to convert week number to string format.
$weekDays = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

// year in days
$daysInYear = daysInXMonths(13);

// month to days
$MonthsToDays = daysInXMonths($month-1); // dont count current month.
// years since 1900
$diff = $year - 1900;
// years to days minus the leap years.
$dayfromyear = $daysInYear * $diff - countLeapYears($year);

// FØRSTE LØSNING
// total day since init
$total = $dayfromyear + $MonthsToDays + $day;

// ANDEN LØSNING
// days since 2013 - leap years
$total2 = $MonthsToDays + $day - countLeapYears($year);

// get week day number
$weekday = $total % 7; // = 6 - Saturday
$weekday2 = $total2 % 7; // = 6 - Saturday

// convert to week string
return $weekDays[$weekday-1]; // -1 array start from 0

}

echo(getDayFromDate(2013, 11, 17)); // Saturday

?>
