<?php

require("ical.php");

// Check if date is holiday
function isHoliday($date)
{

    $file = 'https://calendar.zoznam.sk/icalendar/create-vcard-multiple.php?fName=sk&hy=2021';
    $iCal = new iCal($file);

    $events = $iCal->eventsByDate();

    foreach ($events as $holiday => $events) {
        $holidays[] =  $holiday;
    }

    if (in_array(date("Y-m-d", strtotime($date)), $holidays)) {
        return true;
    } else {
        return false;
    }
}

// Check if date is valid
function isValidDate($date, $format = 'd.m.Y')
{
    return $date == date($format, strtotime($date));
}


if (isset($_POST["form-submit"])) {

    $error = array();
    
    // Check if inputs are valid
    if (!empty($_POST["email"])) {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        } else {
            $error[] = "wrong_email";
        }
    } else {
        $error[] = "empty_email";
    }

    if (!empty($_POST["date"])) {
        if (preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1]).(0[1-9]|1[0-2]).[0-9]{4}$/", $_POST["date"])) {
            if(isValidDate($_POST["date"])){
                $date = $_POST["date"];
            } else {
                $error[] = "wrong_date";
            }
            
        } else {
            $error[] = "empty_date";
        }
    } else {
        $error[] = "empty_date";
    }

    // Add + 1 weekday to date to get next working day
    $next_workday = date('d.m.Y', strtotime($date . ' +1 Weekday'));
    
    // Check if selected date is holiday if yes than + 1 weekday
    if(isHoliday($next_workday)){
        $next_workday = date('d.m.Y', strtotime($next_workday . ' +1 Weekday'));
    }

    if(empty($error)){
        $result = "Najbližší pracovný deň je: {$next_workday}";
    }
}
