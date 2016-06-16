<?php

namespace TimeAgo\Translations;

interface TranslatorInterface
{
    /**
     * @return string
     */
    public function getAboutOneDayString();

    /**
     * @return string
     */
    public function getAboutOneHourString();

    /**
     * @return string
     */
    public function getAboutOneMonthString();

    /**
     * @return string
     */
    public function getAboutOneYearString();

    /**
     * @param int $days
     * @return string
     */
    public function getDaysString($days);

    /**
     * @param int $hours
     * @return string
     */
    public function getHoursString($hours);

    /**
     * @return string
     */
    public function getLessThanAMinuteString();

    /**
     * @param int $minutes
     * @return string
     */
    public function getLessThanOneHourString($minutes);

    /**
     * @param int $months
     * @return string
     */
    public function getMonthsString($months);

    /**
     * @return string
     */
    public function getOneMinuteString();

    /**
     * @param int $years
     * @return string
     */
    public function getYearsString($years);
}