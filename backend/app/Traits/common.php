<?php
namespace App\Traits;

use App\Models\Schedule;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DatePeriod;
use App\Models\CarDay;

trait Common
{
    /**
     * Make timeslots from start and end time
     * @param array $schedule
     * @return array
     */
    public function makeTimeSlotsArr($schedule)
    {
        $start = Carbon::instance(new \DateTime($schedule['start']));
        $end = Carbon::instance(new \DateTime($schedule['end']));

        $minSlotHours = 1;
        $minSlotMinutes = 0;
        $minInterval = CarbonInterval::hour($minSlotHours)->minutes($minSlotMinutes);

        $reqSlotHours = 1;
        $reqSlotMinutes = 0;
        $reqInterval = CarbonInterval::hour($reqSlotHours)->minutes($reqSlotMinutes);

        $slots = [];
        foreach (new DatePeriod($start, $minInterval, $end) as $slot) {
            $to = $slot->copy()->add($reqInterval);

            array_push($slots, array("start" => $slot->toDateTimeString(), "end" => $to->toDateTimeString()));
        }
        return $slots;
    }

    /**
     * Get all dates to specific day
     * @param $startDate
     * @param $endDate
     * @param $day_number
     * @return array
     */
    public static function getDateForSpecificDayBetweenDates($startDate, $endDate, $day_number)
    {
        $endDate = strtotime($endDate);
        $date_array = [];
        $days = array('1' => 'Monday', '2' => 'Tuesday', '3' => 'Wednesday', '4' => 'Thursday', '5' => 'Friday', '6' => 'Saturday', '7' => 'Sunday');
        for ($i = strtotime($days[$day_number], strtotime($startDate)); $i <= $endDate; $i = strtotime('+1 week', $i)) {
            $date_array[] = date('Y-m-d', $i);
        }
        
        return $date_array;
    }

    /**
     * Get car and day records
     * @param $inputs
     * @return collection
     */
    public function existsCarDay($inputs)
    {
        return Schedule::existsCarDay($inputs);
    }

    /**
     * Get date by week day number
     * @param null $dayId
     * @return static
     */
    public static function getDateByDayName($dayId = null)
    {
        $date = Carbon::now()->startOfWeek();
        if (isset($dayId)) {
          $carDay = CarDay::find($dayId);
          $date = $date->addDay($carDay->day_id-1);
        }
        return $date;
    }

    /**
     * Compare two dates equal or not
     * @param $findDate
     * @return bool
     */
    public function compareDates($findDate)
    {
        $currDate = Carbon::now()->setTime(0, 0, 0);
        $match = $currDate->eq($findDate);
        return $match;
    }

    /**
     * Add month to date
     * @param $date
     * @param $month
     * @return mixed
     */
    public function addMonthToDate($date, $month)
    {
        return $date->addMonths($month);
    }

    public function getDatesFromRange($date_time_from, $date_time_to)
    {
        $start = Carbon::createFromFormat('Y-m-d', substr($date_time_from, 0, 10));
        $end = Carbon::createFromFormat('Y-m-d', substr($date_time_to, 0, 10));

        $dates = [];

        while ($start->lte($end)) {

            $dates[] = $start->copy()->format('Y-m-d');

            $start->addDay();
        }

        return $dates;
    }
    
    public function getDatesFromSchedule($schedules){
    
    }
}