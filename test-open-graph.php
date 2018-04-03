<?php

use Embed\Embed;

//Load any url:
$info = Embed::create('http://www.elemarjr.com/');

echo $info->title . PHP_EOL;
echo $info->image . PHP_EOL;
