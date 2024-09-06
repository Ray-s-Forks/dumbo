<?php

namespace App;

/**
 * Class that receives an injected class to display a message.
 */
class InjectedMessage
{
    /**
     * Constructor to initialize message components.
     *
     * @param SimpleMessage $message The SimpleMessage instance to be injected.
     */
    public function __construct(public SimpleMessage $message)
    {
        //
    }

    /**
     * Returns the message from the injected class.
     *
     * @return string The combined message from SimpleMessage.
     */
    public function getInjectedMessage(): string
    {
        return "{$this->message->getMessage()} This is an injected class.";
    }
}
