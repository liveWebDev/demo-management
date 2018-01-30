<?php

/**
 * Dump the passed variables and end the script.
 *
 * @return void
 */
function d()
{
    array_map(function ($x) {
        (new \Illuminate\Support\Debug\Dumper)->dump($x);
    }, func_get_args());
}

/**
 * Calculate duration of time from seconds
 *
 * @param $seconds
 * @return mixed
 */
function calculateDuration($seconds)
{
    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds / 60) % 60);

    $string = '';
    if ($hours)
        $string .= $hours . ' hour';
    if ($hours > 1)
        $string .= 's';
    if ($minutes)
        $string .= ($string ? ' ' : '') . $minutes . ' minutes';

    return $string;
}

/**
 * Get percentage
 * @param $new
 * @param $total
 * @return float|int
 */
function percentage($new, $total)
{
    if ($total == 0) {
        return 0;
    }
    $per = ($new / $total) * 100;
    return $per;
}

/**
 * Merge date and time
 * @param $date
 * @param $time
 * @return string
 */
function makeDateTime($date, $time)
{
    $date = new DateTime($date);
    $time = new DateTime($time);

    $merge = new DateTime($date->format('Y-m-d') . ' ' . $time->format('H:i:s'));
    return $merge->format('Y-m-d H:i:s');
}

/**
 * @param $images
 *
 * @return string
 */
function getDefaultImage($images){
  
  if (sizeof($images->image)> 0 ){
    foreach ($images->image as $item){
      if ($item->default == 1){
        return $item->image;
      }
    }
    return array_get($images, 'image.0.image');
    
  }else{
    return '/img/img-15.jpg';
  }
  
}

function getRoles($id)
{
    if ($id == 1) {
        return 'administrator';
    }elseif ($id == 2) {
        return 'transport-officer';
    }else{
        return 'forklift-driver';
    }
}