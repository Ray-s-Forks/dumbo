<?php

namespace App;

/**
 * Class to display a simple string based on constructor values.
 */
class SimpleMessage
{
    /**
     * Constructor to initialize message components.
     *
     * @param string $messageOne The first part of the message.
     * @param string $messageTwo The second part of the message.
     */
    public function __construct(
        public string $messageOne,
        public string $messageTwo
    ) {
        //
    }

    /**
     * Concatenate and return the full message.
     *
     * @return string The combined message.
     */
    public function getMessage(): string
    {
        return "{$this->messageOne} {$this->messageTwo}";
    }
}
