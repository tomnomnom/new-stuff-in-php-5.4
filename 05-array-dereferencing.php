<?php
$path = "/etc/init.d/httpd";
$rootDir = explode('/', $path)[1];

echo $rootDir."\n"; // etc


$headings = '"Name", "Email", "Mobile"';
$secondHeading = str_getcsv($headings)[1];

echo $secondHeading."\n"; // Email

