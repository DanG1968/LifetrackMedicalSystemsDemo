<?php

/**
 * Class MonthData is a lightweight bean used to represent a month record of Lifetrack
 * data, which supports JSON serialization.
 *
 * @author dgrindstaff
 */
class MonthData implements JsonSerializable {
    private $month;
    private $dailyStudies;
    private $ramCostPerDay;

    public function __construct($month, $dailyStudies, $ramCostPerDay) {
        $this->month = $month;
        $this->dailyStudies = $dailyStudies;
        $this->ramCostPerDay = $ramCostPerDay;
    }

    public function getMonth() {
        return $this->month;
    }

    public function setMonth($month) {
        $this->month = $month;
    }

    public function getDailyStudies() {
        return $this->dailyStudies;
    }

    public function setDailyStudies($dailyStudies) {
        $this->dailyStudies = $dailyStudies;
    }

    public function getRamCostPerDay() {
        return $this->ramCostPerDay;
    }

    public function setRamCostPerDay($ramCostPerDay) {
        $this->ramCostPerDay = $ramCostPerDay;
    }

    public function __toString() {
        return "month: $this->month; dailyStudies: $this->dailyStudies; ramCostPerDay: $this->ramCostPerDay";
    }

    public function jsonSerialize() {
        return [
            'month' => $this->getMonth(),
            'dailyStudies' => $this->getDailyStudies(),
            'ramCostPerDay' => $this->getRamCostPerDay()
        ];
    }
}
?>
