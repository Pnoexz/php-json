<?php

namespace Pnoexz\Exceptions;

class JsonCtrlCharException extends JsonException
{
    /**
     * @param \Throwable|null $previous
     */
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct(
            'Control character error, possibly incorrectly encoded',
            \JSON_ERROR_CTRL_CHAR,
            $previous
        );
    }
}
