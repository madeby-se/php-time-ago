<?php
namespace TimeAgo;

use TimeAgo\Translations\TranslatorGateway;

/**
 * This class can help you find out just how much time has passed between
 * two dates.
 *
 * It has two functions you can call:
 * inWords() which gives you the "time ago in words" between two dates.
 * dateDifference() which returns an array of years,months,days,hours,minutes and
 * seconds between the two dates.
 *
 * @author jimmiw
 * @since 0.2.0 (2010/05/05)
 * @site http://github.com/jimmiw/php-time-ago
 */
class TimeAgo
{
    // defines the number of seconds per "unit"
    private $secondsPerMinute = 60;
    private $secondsPerHour = 3600;
    private $secondsPerDay = 86400;
    private $secondsPerMonth = 2592000;
    private $secondsPerYear = 31104000;
    private $timezone;
    private $encoding;
    private $language;

    /** @var Translations\TranslatorInterface */
    private $translator;

    public function __construct($timezone = null, $language = 'en', $encoding = 'UTF-8')
    {
        // if the $timezone is null, we take 'Europe/London' as the default
        // this was done, because the parent construct tossed an exception
        if ($timezone == null) {
            $timezone = 'Europe/Copenhagen';
        }
        // storing the current timezone
        $this->timezone = $timezone;

        // loads the translator
        $this->language = $language;
        $this->requireTranslation();

    }

    public function inWords($past, $now = "now")
    {
        // sets the default timezone
        date_default_timezone_set($this->timezone);
        // finds the past in datetime
        $past = strtotime($past);
        // finds the current datetime
        $now = strtotime($now);

        // finds the time difference
        $timeDifference = $now - $past;

        // rule 1
        // less than 29secs
        if ($timeDifference <= 29) {
            $timeAgo = $this->encode($this->translator->getLessThanAMinuteString());
        }
        // rule 2
        // more than 29secs and less than 1min29secss
        else {
            if ($timeDifference >= 30 && $timeDifference <= 89) {
                $timeAgo = $this->encode($this->translator->getOneMinuteString());
            }
            // rule 3
            // between 1min30secs and 44mins29secs
            else {
                if ($timeDifference >= 90 &&
                    $timeDifference <= (($this->secondsPerMinute * 44) + 29)
                ) {
                    $minutes = round($timeDifference / $this->secondsPerMinute);
                    $timeAgo = $this->encode($this->translator->getLessThanOneHourString($minutes));
                }
                // rule 4
                // between 44mins30secs and 1hour29mins59secs
                else {
                    if (
                        $timeDifference >= (($this->secondsPerMinute * 44) + 30)
                        &&
                        $timeDifference <= ($this->secondsPerHour + ($this->secondsPerMinute * 29) + 59)
                    ) {
                        $timeAgo = $this->encode($this->translator->getAboutOneHourString());
                    }
                    // rule 5
                    // between 1hour29mins59secs and 23hours59mins29secs
                    else {
                        if (
                            $timeDifference >= (
                                $this->secondsPerHour +
                                ($this->secondsPerMinute * 30)
                            )
                            &&
                            $timeDifference <= (
                                ($this->secondsPerHour * 23) +
                                ($this->secondsPerMinute * 59) +
                                29
                            )
                        ) {
                            $hours = round($timeDifference / $this->secondsPerHour);
                            $timeAgo = $this->encode($this->translator->getHoursString($hours));
                        }
                        // rule 6
                        // between 23hours59mins30secs and 47hours59mins29secs
                        else {
                            if (
                                $timeDifference >= (
                                    ($this->secondsPerHour * 23) +
                                    ($this->secondsPerMinute * 59) +
                                    30
                                )
                                &&
                                $timeDifference <= (
                                    ($this->secondsPerHour * 47) +
                                    ($this->secondsPerMinute * 59) +
                                    29
                                )
                            ) {
                                $timeAgo = $this->encode($this->translator->getAboutOneDayString());
                            }
                            // rule 7
                            // between 47hours59mins30secs and 29days23hours59mins29secs
                            else {
                                if (
                                    $timeDifference >= (
                                        ($this->secondsPerHour * 47) +
                                        ($this->secondsPerMinute * 59) +
                                        30
                                    )
                                    &&
                                    $timeDifference <= (
                                        ($this->secondsPerDay * 29) +
                                        ($this->secondsPerHour * 23) +
                                        ($this->secondsPerMinute * 59) +
                                        29
                                    )
                                ) {
                                    $days = round($timeDifference / $this->secondsPerDay);
                                    $timeAgo = $this->encode($this->translator->getDaysString($days));
                                }
                                // rule 8
                                // between 29days23hours59mins30secs and 59days23hours59mins29secs
                                else {
                                    if (
                                        $timeDifference >= (
                                            ($this->secondsPerDay * 29) +
                                            ($this->secondsPerHour * 23) +
                                            ($this->secondsPerMinute * 59) +
                                            30
                                        )
                                        &&
                                        $timeDifference <= (
                                            ($this->secondsPerDay * 59) +
                                            ($this->secondsPerHour * 23) +
                                            ($this->secondsPerMinute * 59) +
                                            29
                                        )
                                    ) {
                                        $timeAgo = $this->encode($this->translator->getAboutOneMonthString());
                                    }
                                    // rule 9
                                    // between 59days23hours59mins30secs and 1year (minus 1sec)
                                    else {
                                        if (
                                            $timeDifference >= (
                                                ($this->secondsPerDay * 59) +
                                                ($this->secondsPerHour * 23) +
                                                ($this->secondsPerMinute * 59) +
                                                30
                                            )
                                            &&
                                            $timeDifference < $this->secondsPerYear
                                        ) {
                                            $months = round($timeDifference / $this->secondsPerMonth);
                                            // if months is 1, then set it to 2, because we are "past" 1 month
                                            if ($months == 1) {
                                                $months = 2;
                                            }

                                            $timeAgo = $this->encode($this->translator->getMonthsString($months));
                                        }
                                        // rule 10
                                        // between 1year and 2years (minus 1sec)
                                        else {
                                            if (
                                                $timeDifference >= $this->secondsPerYear
                                                &&
                                                $timeDifference < ($this->secondsPerYear * 2)
                                            ) {
                                                $timeAgo = $this->encode($this->translator->getAboutOneYearString());
                                            }
                                            // rule 11
                                            // 2years or more
                                            else {
                                                $years = floor($timeDifference / $this->secondsPerYear);
                                                $timeAgo = $this->encode($this->translator->getYearsString($years));
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return $timeAgo;
    }

    /**
     * Convert string to new encoding if other then UTF-8 is used
     * @param $string
     * @return string
     */
    private function encode($string)
    {
        if ($this->encoding != 'UTF-8') {
            return iconv('UTF-8', $this->encoding, $string);
        }

        return $string;
    }

    /**
     * Loads the translations into the system.
     */
    private function requireTranslation()
    {
        $gateway = new TranslatorGateway();
        $this->translator = $gateway->requireTranslationByLanguageCode($this->language);
    }
}