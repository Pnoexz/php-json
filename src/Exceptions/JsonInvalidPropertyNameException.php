<?php

namespace Pnoexz\Exceptions;

/**
 * This exception gets triggered if the Json that's being decoded has a property
 * which starts with \0. This issue arises from PHP's inability to create the
 * attribute on stdClass (as shown in 3v4l) and only happens when the $assoc
 * parameter is set to false (which is the default value).
 *
 * @see https://bugs.php.net/bug.php?id=68546
 * @see https://3v4l.org/oEMRC
 *
 */
class JsonInvalidPropertyNameException extends JsonException
{
    /**
     * @param \Throwable|null $previous
     */
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct(
            'A property name that cannot be encoded was given',
            \JSON_ERROR_INVALID_PROPERTY_NAME,
            $previous
        );
    }
}
