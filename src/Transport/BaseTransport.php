<?php

namespace App\Transport;

use App\Interfaces\ITransportation;

/**
 * Class BaseTransport
 *
 * @package \App\Transport
 */
abstract class BaseTransport implements ITransportation
{
    /**
     * @var string
     */
    protected $departure;

    /**
     * @var string
     */
    protected $arrival;

    const MESSAGE_FINAL_DESTINATION = 'You have arrived at your final destination.';

    /**
     * BaseTransport constructor.
     *
     * @param array $trip
     */
    public function __construct(array $trip)
    {
        foreach ($trip as $key => $value) {
            // Make attribute's first character lowercase
            $property = lcfirst($key);

            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }
}
