<?php

namespace App\Transport;

/**
 * Class Plane
 *
 * @package \App\Transport
 */
class Plane
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
}
