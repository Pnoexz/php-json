<?php

namespace Pnoexz\Exceptions;

/**
 * Any type in PHP can be Json encoded with the exception of resources, such as
 * streams and database connections.
 *
 * @see http://php.net/json_encode#refsect1-function.json-encode-parameters
 * @see http://php.net/resource
 */
class JsonUnsupportedTypeException extends JsonException
{
    /**
     * @param \Throwable|null $previous
     */
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct(
            'A value of a type that cannot be encoded was given',
            \JSON_ERROR_UNSUPPORTED_TYPE,
            $previous
        );
    }
}
