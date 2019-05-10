<?php
$API = new PerchAPI(1.0, 'cognetif_apimail');
$API->on('email.send', 'Cognetif\ApiMail\Manager::email_send');