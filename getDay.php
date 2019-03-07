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

// Count leap years from 1900 to X year
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

// Week day array to convert week number to string format.
$weekDays = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

// Starting point - 0 / Monday
$DayOfTheWeek = 0;

// Months to days
$MonthsToDays = daysInXMonths($month-1); // dont count current month.

// total days 'rotation' since last monday minus the leap years
$totalDays = $MonthsToDays + $day - countLeapYears($year);

// spin total days numb through the week (0-6)
for($i = 0; $i < $totalDays; $i++) {
  $DayOfTheWeek++;

  if($DayOfTheWeek > 6) {
    $DayOfTheWeek = 0;
  }
}

return $weekDays[$DayOfTheWeek];

}

echo(getDayFromDate(2013, 11, 17)); // Monday

?>
