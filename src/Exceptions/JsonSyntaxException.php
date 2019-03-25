<?php

namespace Pnoexz\Exceptions;

class JsonSyntaxException extends JsonException
{
    /**
     * @param \Throwable|null $previous
     */
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct(
            'Syntax error',
            \JSON_ERROR_SYNTAX,
            $previous
        );
    }
}
