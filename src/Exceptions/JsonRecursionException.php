<?php

namespace Pnoexz\Exceptions;

class JsonRecursionException extends JsonException
{
    /**
     * @param \Throwable|null $previous
     */
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct(
            'One or more recursive references in the value to be encoded',
            \JSON_ERROR_RECURSION,
            $previous
        );
    }
}
