
Inspired by the comments at: <http://dk.php.net/time> and
<http://api.rubyonrails.org/classes/ActionView/Helpers/DateHelper.html#M001695>

Using this scheme to determine the �ago� time:
==============================================

      0 <-> 29 secs                                                             # => less than a minute
      30 secs <-> 1 min, 29 secs                                                # => 1 minute
      1 min, 30 secs <-> 44 mins, 29 secs                                       # => [2..44] minutes
      44 mins, 30 secs <-> 89 mins, 29 secs                                     # => about 1 hour
      89 mins, 29 secs <-> 23 hrs, 59 mins, 29 secs                             # => about [2..24] hours
      23 hrs, 59 mins, 29 secs <-> 47 hrs, 59 mins, 29 secs                     # => 1 day
      47 hrs, 59 mins, 29 secs <-> 29 days, 23 hrs, 59 mins, 29 secs            # => [2..29] days
      29 days, 23 hrs, 59 mins, 30 secs <-> 59 days, 23 hrs, 59 mins, 29 secs   # => about 1 month
      59 days, 23 hrs, 59 mins, 30 secs <-> 1 yr minus 1 sec                    # => [2..12] months
      1 yr <-> 2 yrs minus 1 secs                                               # => about 1 year
      2 yrs <-> max time or date                                                # => over [2..X] years

Changes since last version
==========================

Moved the class TimeAgo into its own namespace.

Created a Translator interface which can be implented to create a translator class to translate
sentances to a new language. (Added English and Swedish translations)

It's now possible to get the _inWords_ method to return the string in a encoding specified in the constructor.

Removed the global function _timeAgoInWords()_

About
=====

This class gives you a time ago string eg. 1 hour ago based on the differnece between two datetimes.

This project if forked from https://github.com/jimmiw/php-time-ago.

One method to rule them all!
============================

    $timeAgo = new TimeAgo();
    echo $timeAgo->inWords("2010/1/10 23:05:00");

Translations added
==================

You can now translate the texts returned using the
\$timeAgo-&gt;inWords() or timeAgoInWords() methods.\
The translation is simply a language code string added to the end of the
class contruction

Examples using the Swedish translations:

    $timeZone = NULL; // just use the system timezone

    $timeAgo = new TimeAgo($timeZone, 'sv');
    echo $timeAgo->inWords("2010/1/10 23:05:00");



Encoding added
==============

You can specify your own translation by specifing it in the constructor.

Examples using Windows-1252 translation:

    $timeZone = NULL; // just use the system timezone

    $timeAgo = new TimeAgo($timeZone, 'sv', 'Windows-1252');
    echo $timeAgo->inWords("2010/1/10 23:05:00");



Try pandoc!

pandoc --from textile --to markdown

  from

to

Changes (versions)
==================

* 0.5.1-alpha: TimeAgo is now includes php-unit tests (olanorlander)
* 0.5.0-alpha: Moved to namespace, added encoding and translation interface. (olanorlander)
* 0.4.11: Changes to French translation (`souhailmerroun). Added Russian and Ukranian translations (`akavolkol)
* 0.4.10: Added Korean and Finnish translations (thanks to `easylogic and `tk1sul1)
* 0.4.9: Added Spanish and Hungarian and Brazilian Portuguese (thanks to `khrizt and `technodelight and `gugoan)
* 0.4.8: Added French and Japanese and Taiwanese translations (thanks to `barohatoum and `hotengchang)
* 0.4.7: Changes to fix annoying "floor" bugs.
* 0.4.6: Added Dutch and Chinese translations (thanks to `NielsdeBlaauw and `su-xiaolin)
* 0.4.5: Fix for wrongly named variable - patch from `rimager
* 0.4.4: Changed the previous fix, since it caused a problem with the �Scheme� at the start of this document. �about 1 hour ago� is between 44mins30secs and 89mins29secs.
* 0.4.3: Added a fix for �about 1 hour ago�, which would yield �1 hours ago� if the time was 1hour 30minutes. Giving a pluralization error.
* 0.4.2: Added German translations .
* 0.4.1: Added �ago� to the end of the translations, so the texts now read �about 1 hour ago�.
* 0.4.0: Added translations (Danish and English) to the plugin.

The MIT License
===============

Copyright � 2014 Jimmi Westerberg (http://westsworld.dk)

Permission is hereby granted, free of charge, to any person obtaining a
copy\
of this software and associated documentation files (the �Software�), to
deal\
in the Software without restriction, including without limitation the
rights\
to use, copy, modify, merge, publish, distribute, sublicense, and/or
sell\
copies of the Software, and to permit persons to whom the Software is\
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included
in\
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED �AS IS�, WITHOUT WARRANTY OF ANY KIND, EXPRESS
OR\
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY,\
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
THE\
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER\
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM,\
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
IN\
THE SOFTWARE.

pandoc 1.17.1

� 2013�2015 John MacFarlane
