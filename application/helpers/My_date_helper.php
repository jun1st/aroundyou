<?php
define("SECOND", 1);
define("MINUTE", 60 * SECOND);
define("HOUR", 60 * MINUTE);
define("DAY", 24 * HOUR);
define("MONTH", 30 * DAY);

function relative_time($time)
{   
    $delta = time() - strtotime($time);
    $date = new DateTime($time);
    
    if ($delta < 24 * HOUR)
    {
		$date = new DateTime($time);
		
		return $date->format('H:i');
    }
    if ($delta < 30 * DAY)
    {
		return $date->format('m') . '月' . $date->format('d') . '号';
	}
    if ($delta < 12 * MONTH)
    {
	  return $date->format('Y') . '年' . $date->format('m') . '月';
    }
    
}
?>