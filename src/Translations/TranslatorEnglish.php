<?php

namespace TimeAgo\Translations;

class TranslatorEnglish
{
    public function getAboutOneDayString()
    {
        return "about 1 day ago";
    }

    public function getAboutOneHourString()
    {
        return "about 1 hour ago";
    }

    public function getAboutOneMonthString()
    {
        return "about 1 month ago";
    }

    public function getAboutOneYearString()
    {
        return "about 1 year ago";
    }

    public function getDaysString($days)
    {
        return "$days days ago";
    }

    public function getHoursString($hours)
    {
        return "$hours hours ago";
    }

    public function getLessThanAMinuteString()
    {
        return "less than a minute ago";
    }

    public function getLessThanOneHourString($mintues)
    {
        return "$mintues minutes ago";
    }

    public function getMonthsString($months)
    {
        return "$months months ago";
    }

    public function getOneMinuteString()
    {
        return "1 minute ago";
    }

    public function getYearsString($years)
    {
        return "over $years years ago";
    }
}
