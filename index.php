<?php

require("vendor/autoload.php");

use VixCarSdk\Client;


$client = new Client(2, 'asfionioa', 'http://carplace.ru/api/v1');

echo "<pre>";
print_r();