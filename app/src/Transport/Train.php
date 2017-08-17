<?php

namespace App\Transport;

/**
 * Class Train
 *
 * @package \App\Transport
 */
class Train extends BaseTransport
{

    /**
     * @var string
     */
    protected $transportationNumber;

    /**
     * @var string
     */
    protected $seat;

    const MESSAGE         = 'Take train %s';
    const MESSAGE_FROM_TO = ' from %s to %s. ';
    const MESSAGE_SEAT    = 'Sit in seat %s.';

    /**
     * Return a message for the trip, defined in TransportationInterface
     *
     * @return string
     */
    public function getMessage(): string
    {
        // Add Transportation number to the message
        $message = sprintf(static::MESSAGE, $this->transportationNumber);

        // Add (from => to) to the message
        $message = sprintf(
            $message . static::MESSAGE_FROM_TO,
            $this->departure,
            $this->arrival
        );

        // Add Seat number to the message
        $message = sprintf($message . static::MESSAGE_SEAT, $this->seat);

        return $message;
    }
}
