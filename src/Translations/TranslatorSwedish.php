<?php

namespace TimeAgo\Translations;

class TranslatorSwedish implements TranslatorInterface
{
    public function getAboutOneDayString()
    {
        return "ca en dag sedan";
    }

    public function getAboutOneHourString()
    {
        return "ca en timme sedan";
    }

    public function getAboutOneMonthString()
    {
        return "ca en månad sedan";
    }

    public function getAboutOneYearString()
    {
        return "ca ett år sedan";
    }

    public function getDaysString($days)
    {
        return "$days dagar sedan";
    }

    public function getHoursString($hours)
    {
        return "$hours timmar sedan";
    }

    public function getLessThanAMinuteString()
    {
        return "mindre än en minut sedan";
    }

    public function getLessThanOneHourString($mintues)
    {
        return "%s minuter sedan";
    }

    public function getMonthsString($months)
    {
        return "$months månader sedan";
    }

    public function getOneMinuteString()
    {
        return "en minut sedan";
    }

    public function getYearsString($years)
    {
        return "över $years år sedan";
    }
}
