<?php
define("SECOND", 1);
define("MINUTE", 60 * SECOND);
define("HOUR", 60 * MINUTE);
define("DAY", 24 * HOUR);
define("MONTH", 30 * DAY);

function relativeTime($time)
{   
    $delta = time() - strtotime($time);

    if ($delta < 1 * MINUTE)
    {
        return $delta == 1 ? "刚" : $delta . "秒前";
    }
    if ($delta < 2 * MINUTE)
    {
      return "一分钟前";
    }
    if ($delta < 45 * MINUTE)
    {
        return floor($delta / MINUTE) . "分钟前";
    }
    if ($delta < 90 * MINUTE)
    {
      return "一小时前";
    }
    if ($delta < 24 * HOUR)
    {
      return floor($delta / HOUR) . "小时前";
    }
    if ($delta < 48 * HOUR)
    {
      return "昨天";
    }
    if ($delta < 30 * DAY)
    {
        return floor($delta / DAY ) . "天前";
    }
    if ($delta < 12 * MONTH)
    {
      $months = floor($delta / DAY / 30);
      return $months <= 1 ? "一个月前" : $months . "月前";
    }
    else
    {
        $years = floor($delta / DAY / 365);
        return $years <= 1 ? "one year ago" : $years . " years ago";
    }
}
?>