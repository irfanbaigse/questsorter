<?php

namespace App;

use App\Exceptions\RuntimeException;
use App\Helpers\BoardingSorter;
use App\Transport\{
    Bus, Plane, Train
};

/**
 * Class Main
 *
 * @package \App
 */
class Main
{
    /**
     * Boardings
     *
     * @var array
     */
    protected $boardings = [];

    /**
     * Sorted boardings
     *
     * @var array
     */
    protected $sortedBoardings = [];

    /**
     * Default set of transportation
     *
     * @var array
     */
    protected static $transportation = [];
    /**
     * Trip constructor.
     *
     * @param array $boardings
     */
    public function __construct(array $boardings)
    {
        $this->setDefaultTransportation();
        $this->boardings = $boardings;
    }

    /**
     * setDefaultTransportation
     *
     * @return void
     */
    public function setDefaultTransportation()
    {
        static::$transportation = [
            'Train' => Train::class,
            'Bus'   => Bus::class,
            'Plane' => Plane::class,
        ];
    }

    /**
     * add the boarding cards
     *
     * @param $boarding
     */
    public function addBoarding($boarding)
    {
        $this->boardings[] = $boarding;
    }

    /**
     * Sort boardings This function sorts the boardings in order
     *
     * @return void
     */
    public function sort()
    {
        // Create BoardingSorter instance to sort data
        $boardingSorter = new BoardingSorter($this->boardings);
        // Sort boardings and assign them to the sorted boardings array
        $boardingSorter->sort();
        $this->sortedBoardings = $boardingSorter->getBoardings();
    }

    /**
     * Get sorted transportations as an array of objects
     *
     * @return array
     */
    public function getTransportations(): array
    {
        $transportationList = [];

        if (count($this->sortedBoardings) == 0) {
            return $transportationList;
        }

        foreach ($this->sortedBoardings as $boarding) {
            $type = $boarding['Transportation'];

            if (!isset(static::$transportation[$type])) {
                throw new RuntimeException(
                    sprintf(
                        'Unsupported transportation : %s',
                        $type
                    )
                );
            }
            $transportationList[] = new static::$transportation[$type]($boarding);
        }

        return $transportationList;

    }

    /**
     * Display Trip
     *
     * @return void
     */
    public function tripString()
    {
        foreach ($this->getTransportations() as $idx => $transportation) {
            echo ($idx + 1) . ". " . $transportation->getMessage() . PHP_EOL . PHP_EOL;
            // Final destination message
            if ($idx == (count($this->boardings) - 1)) {
                echo ($idx + 2) . ". " . $transportation::MESSAGE_FINAL_DESTINATION . PHP_EOL;
            }
        }

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

    /**
     * Get sorted boardings
     *
     * @return array
     */
    public function getSortedBoardings(): array
    {
        return $this->sortedBoardings;
    }
}
