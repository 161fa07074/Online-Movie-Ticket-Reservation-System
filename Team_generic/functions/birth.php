<?php
$monthOptions = '';
$dayOptions = '';
$yearOptions = '';
 
for($month=1; $month<=12; $month++)
{
    $monthName = date("M", mktime(0, 0, 0, $month));
    $monthOptions .= "<option value=$month>{$monthName}</option>\n";
}
for($day=1; $day<=31; $day++)
{
    $dayOptions .= "<option value=\"{$day}\">{$day}</option>\n";
}
for($year=1900; $year<=2010; $year++)
{
    $yearOptions .= "<option value=\"{$year}\">{$year}</option>\n";
}
?>
<html>
<head>
<script type="text/javascript">

function updateDays()
{
    //Create variables needed
    var monthSel = document.getElementById('month');
    var daySel   = document.getElementById('day');
    var yearSel  = document.getElementById('year');
    var monthVal = monthSel.value;
    var yearVal  = yearSel.value;
    
    //Determine the number of days in the month/year
    var daysInMonth = 31;
    if (monthVal==2)
    {
        daysInMonth = (yearVal%4==0 && (yearVal%100!=0 || yearVal%400==0)) ? 29 : 28;
    }
    else if (monthVal==4 || monthVal==6 || monthVal==9 || monthVal==11)
    {
        daysInMonth = 30;
    }
    
    //Add/remove options from days select list as needed
    if(daySel.options.length > daysInMonth)
    {   //Remove excess days, if needed
        daySel.options.length = daysInMonth;
    }
    while (daySel.options.length != daysInMonth)
    {   //Add additional days, if needed
        daySel.options[daySel.length] = new Option(daySel.length+1, daySel.length+1, false);
    }
    
    return;
}

</script>
</head>
<body>
Birthdate:<br />
<select name="month" id="month" onchange="updateDays();">
<?php echo $monthOptions; ?>
</select>

<select name="day" id="day">
<?php echo $dayOptions; ?>
</select>

<select name="year" id="year" onchange="updateDays();">
<?php echo $yearOptions; ?>
</select>

</body>
</html>