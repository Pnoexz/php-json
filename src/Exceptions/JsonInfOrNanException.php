<?php

namespace Pnoexz\Exceptions;

class JsonInfOrNanException extends JsonException
{
    /**
     * @param \Throwable|null $previous
     */
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct(
            'One or more NAN or INF values in the value to be encoded',
            \JSON_ERROR_INF_OR_NAN,
            $previous
        );
    }
}
