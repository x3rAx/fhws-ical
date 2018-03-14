<?php

$url = 'https://fiw.fhws.de/fileadmin/share/vlplan/iCal' . $request;
$content = file_get_contents($url);

if ($content === false) {
    show404('The requested ical could not be found on the FHWS servers.');
}

header('Content-Type: text/calendar');

echo iconv('iso-8859-1', 'utf-8', $content);

