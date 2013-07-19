#!/usr/local/bin/php5
<?php
$pwuid = posix_getpwuid(posix_geteuid());
if (is_file($_SERVER['PATH_TRANSLATED']) &&
      ($pwuid['name'] === 'nobody' ||
       $pwuid['name'] === 'apache' ||
       fileowner($_SERVER['PATH_TRANSLATED']) == posix_geteuid())) {
    chdir(dirname($_SERVER['PATH_TRANSLATED']));
    include(basename($_SERVER['PATH_TRANSLATED']));
}
?>