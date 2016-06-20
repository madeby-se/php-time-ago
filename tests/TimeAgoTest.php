<?php

namespace TimeAgo;

class TimeAgoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TimeAgo
     */
    private $timeAgo;

    public function setUp()
    {
        $this->timeAgo = new TimeAgo(date_default_timezone_get());
    }

    /**
     * @dataProvider expectedStringProvider
     */
    public function test_that_correct_string_is_returned($string, $datetime)
    {
        $this->assertEquals($string, $this->timeAgo->inWords($datetime));
    }

    public function expectedStringProvider()
    {
        return [
            ['about 1 hour ago', date('Y-m-d H:i:s', strtotime('-1 hour -1 second'))],
            ['about 1 day ago', date('Y-m-d H:i:s', strtotime('-1 day -2 hours'))],
            ['about 1 month ago', date('Y-m-d H:i:s', strtotime('-1 month -2 hours'))],
            ['about 1 year ago', date('Y-m-d H:i:s', strtotime('-1 years -2 hours'))],
            ['7 hours ago', date('Y-m-d H:i:s', strtotime('-7 hours'))],
            ['2 days ago', date('Y-m-d H:i:s', strtotime('-2 days -2 hours'))],
            ['3 months ago', date('Y-m-d H:i:s', strtotime('-3 month -2 hours'))],
            ['over 5 years ago', date('Y-m-d H:i:s', strtotime('-60 month'))],
        ];
    }
}
