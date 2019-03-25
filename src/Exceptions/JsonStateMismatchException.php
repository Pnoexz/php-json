<?php

namespace Pnoexz\Exceptions;

class JsonStateMismatchException extends JsonException
{
    /**
     * @param \Throwable|null $previous
     */
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct(
            'Invalid or malformed JSON',
            \JSON_ERROR_STATE_MISMATCH,
            $previous
        );
    }
}
