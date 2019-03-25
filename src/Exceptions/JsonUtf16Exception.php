<?php

namespace Pnoexz\Exceptions;

/**
 * @see https://bugs.php.net/bug.php?id=62010
 */
class JsonUtf16Exception extends JsonException
{
    /**
     * @param \Throwable|null $previous
     */
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct(
            'Malformed UTF-16 characters, possibly incorrectly encoded',
            \JSON_ERROR_UTF16,
            $previous
        );
    }
}
