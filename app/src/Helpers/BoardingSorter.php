<?php

namespace App\Helpers;

/**
 * Class BoardingSorter
 *
 * @package \App\Helpers
 */
class BoardingSorter
{
    /**
     * Boardings
     *
     * @var array
     */
    protected $boardings = [];

    /**
     * BoardingSorter constructor.
     *
     * @param array $boardings
     */
    function __construct(array $boardings)
    {
        $this->boardings = $boardings;
    }

    /**
     * Sort boardings This function sorts the boardings in order
     *
     * @return void
     */
    public function sort()
    {
        // Get first and last trip
        $this->setFirstLastBoarding();

        // Now we pair boardings
        for ($counter = 0, $max = count($this->boardings) - 1; $counter < $max; $counter++) {
            // Foreach trip we test for the arrival city and the departure city
            foreach ($this->boardings as $idx => $trip) {
                // echo $this->boardings[$i]['Arrival'];
                // echo $trip['Departure'];
                if (strcasecmp($this->boardings[$counter]['Arrival'], $trip['Departure']) == 0) {
                    $nextIdx                   = $counter + 1;
                    $tempBoarding              = $this->boardings[$nextIdx];
                    $this->boardings[$nextIdx] = $trip;
                    $this->boardings[$idx]     = $tempBoarding;
                }
            }
        }
    }

    /**
     * Set the first and last boarding cards
     *
     * @return void
     */
    private function setFirstLastBoarding()
    {
        $isLastBoarding  = true;
        $hasPrevBoarding = false;

        for ($counter = 0, $max = count($this->boardings); $counter < $max; $counter++) {
            // Foreach trip we test for the arrival city and the departure city
            foreach ($this->boardings as $trip) {
                // If current trip's departure is another trip arrivel, then we have a previous trip
                if (strcasecmp($this->boardings[$counter]['Departure'], $trip['Arrival']) == 0) {
                    $hasPrevBoarding = true;
                } // If current trip's arrival is another trip departure, then it is not the last trip
                elseif (strcasecmp($this->boardings[$counter]['Arrival'], $trip['Departure']) == 0) {
                    $isLastBoarding = false;
                }
            }

            // Assign the last and the first trip
            if (!$hasPrevBoarding) {
                // It is the first trip so we put it on the top
                array_unshift($this->boardings, $this->boardings[$counter]);
                unset($this->boardings[$counter]);
            } elseif ($isLastBoarding) {
                // It is the last trip so we put it at the bottom
                array_push($this->boardings, $this->boardings[$counter]);
                unset($this->boardings[$counter]);
            }
        }

        // We regenerate indexes
        $this->boardings = array_merge($this->boardings);
    }

    /**
     * Get boardings
     *
     * @return array
     */
    public function getBoardings(): array
    {
        return $this->boardings;
    }
}
