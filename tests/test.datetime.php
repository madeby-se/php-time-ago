<?php

use TimeAgo\TimeAgo;

echo "<h1>TimeAgo class tests!</h1>";
echo "<p>";
  echo "<h2>testing TimeAgo class</h2>";
  echo "<strong>rule 1</strong> (0 <-> 29 secs # => less than a minute)<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 22:03:29","2010/4/26 22:03:58");
  echo "<br/>";
  
  echo "<br/><strong>rule 2</strong> (30 secs <-> 1 min, 29 secs # => 1 minute)<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 22:03:30","2010/4/26 22:04:58");
  echo "<br/>";
  
  echo "<br/><strong>rule 3</strong> (1 min, 30 secs <-> 44 mins, 29 secs # => [2..44] minutes)<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 22:03:28","2010/4/26 22:04:58");
  echo "<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 22:03:28","2010/4/26 22:15:58");
  echo "<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 22:03:28","2010/4/26 22:47:57");
  echo "<br/>";
  
  echo "<br/><strong>rule 4</strong> (44 mins, 30 secs <-> 89 mins, 29 secs # => about 1 hour)<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 22:03:28","2010/4/26 22:47:58");
  echo "<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 22:03:28","2010/4/26 23:32:57");
  echo "<br/>";
  
  echo "<br/><strong>rule 5</strong>(89 mins, 29 secs <-> 23 hrs, 59 mins, 29 secs # => about [2..24] hours)<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 00:00:00","2010/4/26 01:30:00");
  echo "<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 00:00:00","2010/4/26 13:49:00");
  echo "<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 00:00:00","2010/4/26 23:59:29");
  echo "<br/>";
  
  echo "<br/><strong>rule 6</strong> (23 hrs, 59 mins, 29 secs <-> 47 hrs, 59 mins, 29 secs # => 1 day)<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 00:00:00","2010/4/26 23:59:30");
  echo "<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 00:00:00","2010/4/27 13:10:00");
  echo "<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 00:00:00","2010/4/27 23:59:29");
  echo "<br/>";
  
  echo "<br/><strong>rule 7</strong> (47 hrs, 59 mins, 30 secs <-> 29 days, 23 hrs, 59 mins, 29 secs # => [2..29] days)<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 00:00:00","2010/4/27 23:59:30");
  echo "<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 00:00:00","2010/5/10 00:00:00");
  echo "<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 00:00:00","2010/5/25 23:59:29");
  echo "<br/>";
  
  echo "<br/><strong>rule 8</strong> (29 days, 23 hrs, 59 mins, 30 secs <-> 59 days, 23 hrs, 59 mins, 29 secs   # => about 1 month)<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 00:00:00","2010/5/25 23:59:30");
  echo "<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 00:00:00","2010/5/28 10:05:30");
  echo "<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 00:00:00","2010/6/24 23:59:29");
  echo "<br/>";
  
  echo "<br/><strong>rule 9</strong> (59 days, 23 hrs, 59 mins, 30 secs <-> 1 yr minus 1 sec # => [2..12] months)<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 00:00:00","2010/6/24 23:59:30");
  echo "<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2009/10/01 00:00:00","2010/5/28 10:05:30");
  echo "<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2009/4/26 00:00:00","2010/4/20 00:00:00");
  echo "<br/>";
  
  echo "<br/><strong>rule 10</strong> (1 yr <-> 2 yrs minus 1 secs # => about 1 year)<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2009/4/26 00:00:00","2010/4/26 00:00:00");
  echo "<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2009/01/01 00:00:00","2010/5/01 00:00:00");
  echo "<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2010/4/26 00:00:00","2011/4/26 23:59:59");
  echo "<br/>";
  
  echo "<br/><strong>rule 11</strong> (2 yrs <-> max time or date # => over [2..X] years)<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2009/4/26 00:00:00","2011/4/26 00:00:00");
  echo "<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2005/4/26 00:00:00","2011/4/26 00:00:00");
  echo "<br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("1999/4/26 00:00:00","2011/4/26 00:00:00");
  echo "<br/>";
echo "</p>";

echo "<h2>TimeAgo class tests (dateDifference)</h2>";
echo "<p>";
  $timeAgo = new TimeAgo();
  echo "<pre>";
  print_r($timeAgo->dateDifference("2010/4/01 00:00:00","2010/5/12 03:05:30"));
  echo "</pre>";
echo "</p>";

echo "<h2>Language testing</h2>";
echo "<p>";
  echo "<br/><strong>English</strong><br/>";
  $timeAgo = new TimeAgo();
  echo $timeAgo->inWords("2015/5/26 10:00:10","2015/5/26 10:00:20");
  echo "<br/>";
  echo "<br/><strong>Danish</strong><br/>";
  $timeAgo = new TimeAgo(NULL, 'da');
  echo $timeAgo->inWords("2015/5/26 10:00:10","2015/5/26 10:00:20");
  echo "<br/>";
echo "</p>";

?>
