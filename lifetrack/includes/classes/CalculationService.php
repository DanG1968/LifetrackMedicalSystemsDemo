<?php
require_once "MonthData.php";

/**
 * Class CalculationService singleton service for deriving month data.
 *
 * @author dgrindstaff
 */
class CalculationService {
    private static $INSTANCE = null;
    private static $LOCALE = 'en_US.UTF-8';

    /**
     * Private constructor for preventing external instantiation.
     */
    private function __construct() {

    }

    /**
     * CalculationService singleton accessor.
     *
     * @return CalculationService|null
     */
    public static function getInstance() {
        if (self::$INSTANCE == null) {
            self::$INSTANCE = new CalculationService();
        }

        return self::$INSTANCE;
    }

    public function computeMonthDataList($dailyStudies, $growthPercent, $numberMonths) {
        $timestamp = time();
        $currentMonth = idate('m', $timestamp);
        $currentYear = idate('Y', $timestamp);
        setlocale(LC_MONETARY, self::$LOCALE);

        $monthDataList = array();
        for ($month = 0; $month < $numberMonths; $month++) {
            $currentMonth = ($currentMonth + 1) % 12;
            if ($currentMonth == 0) {
                $currentYear++;
            }

            $currentDate = strtotime("01-$currentMonth-$currentYear 00:00:00");
            $monthText = date('M Y', $currentDate);

            $dailyStudies = (int) ($dailyStudies + $dailyStudies * $growthPercent / 100);
            $dailyStudiesText = number_format($dailyStudies);

            $ramCostPerDay = $dailyStudies / 1000 * 0.5 * 24 * 0.00553;
            $ramCostPerDayText = money_format('%.2n', $ramCostPerDay);

            $monthData = new MonthData($monthText, $dailyStudiesText, $ramCostPerDayText);
            array_push($monthDataList, $monthData);
        }

        return $monthDataList;
    }
}

?>
