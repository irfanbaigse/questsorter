<?php

// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

use App\Helpers\Cards;
use App\Main;


// Trip details
$trip = new Main(Cards::getBoardingCards());

// Sort them
$trip->sort();

// Display
$trip->tripString();
