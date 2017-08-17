<?php

namespace App\Helpers;

/**
 * Class Cards
 *
 * @package \App\Helpers
 */
class Cards
{
    /**
     * getBoardingCards
     *
     * @return array
     *
     */
    public static function getBoardingCards(): array
    {
        return $boardingCollection = [
            [
                "Departure"            => "Stockholm",
                "Arrival"              => "New York",
                "Transportation"       => "Plane",
                "TransportationNumber" => "SK22",
                "Seat"                 => "7B",
                "Gate"                 => "22",
            ],
            [
                "Departure"            => "Madrid",
                "Arrival"              => "Barcelona",
                "Transportation"       => "Train",
                "TransportationNumber" => "78A",
                "Seat"                 => "45B",
            ],
            [
                "Departure"            => "Gerona Airport",
                "Arrival"              => "Stockholm",
                "Transportation"       => "Plane",
                "TransportationNumber" => "SK455",
                "Seat"                 => "3A",
                "Gate"                 => "45B",
                "Baggage"              => "334",
            ],
            [
                "Departure"      => "Barcelona",
                "Arrival"        => "Gerona Airport",
                "Transportation" => "Bus",
            ],
        ];
    }
}
