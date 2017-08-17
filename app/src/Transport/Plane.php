<?php

namespace App\Transport;

/**
 * Class Plane
 *
 * @package \App\Transport
 */
class Plane extends BaseTransport
{
    /**
     * @var string
     */
    protected $transportationNumber;

    /**
     * @var string
     */
    protected $seat;

    /**
     * @var string
     */
    protected $gate;

    /**
     * @var string
     */
    protected $baggage;

    const MESSAGE                   = 'From %s, take flight %s to %s. Gate %s, seat %s.';
    const MESSAGE_BAGGAGE_TICKET    = 'Baggage drop at ticket counter %s.';
    const MESSAGE_NO_BAGGAGE_TICKET = 'Baggage will we automatically transferred from your last leg.';

    /**
     * Return a message for the trip, defined in TransportationInterface
     *
     * @return string
     */
    public function getMessage(): string
    {
        $message = sprintf(
            static::MESSAGE,
            $this->departure,
            $this->transportationNumber,
            $this->arrival,
            $this->gate,
            $this->seat
        );

        // Add Baggage message
        if (!empty($this->baggage)) {
            $message .= sprintf(
                PHP_EOL . '   ' . static::MESSAGE_BAGGAGE_TICKET,
                $this->baggage
            );

            return $message;
        }

        // We don't have baggage
        $message .= PHP_EOL . '   ' . static::MESSAGE_NO_BAGGAGE_TICKET;

        return $message;
    }
}
