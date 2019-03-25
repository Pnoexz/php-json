<?php

namespace Pnoexz\Exceptions;

class JsonUtf8Exception extends JsonException
{
    /**
     * @param \Throwable|null $previous
     */
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct(
            'Malformed UTF-8 characters, possibly incorrectly encoded',
            \JSON_ERROR_UTF8,
            $previous
        );
    }
}
