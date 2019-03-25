<?php

namespace Pnoexz\Exceptions;

class JsonDepthException extends JsonException
{
    /**
     * @param \Throwable|null $previous
     */
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct(
            'The maximum stack depth has been exceeded',
            \JSON_ERROR_DEPTH,
            $previous
        );
    }
}
