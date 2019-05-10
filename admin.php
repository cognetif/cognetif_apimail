<?php
$api            = new \PerchAPI(1.0, 'cognetif_apimail');

if ($CurrentUser->logged_in()) {

    $this->register_app('cognetif_apimail', 'ApiMail', 1, 'External Email API', '1.0', true);
    $this->require_version('cognetif_apimail', '3.0');

    require_once('util/autoloader.php');
    include('util/events.php');

}


