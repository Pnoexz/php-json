<?php

namespace Pnoexz;

use Pnoexz\Exceptions\JsonCtrlCharException;
use Pnoexz\Exceptions\JsonDepthException;
use Pnoexz\Exceptions\JsonInfOrNanException;
use Pnoexz\Exceptions\JsonInvalidPropertyNameException;
use Pnoexz\Exceptions\JsonRecursionException;
use Pnoexz\Exceptions\JsonStateMismatchException;
use Pnoexz\Exceptions\JsonSyntaxException;
use Pnoexz\Exceptions\JsonUnsupportedTypeException;
use Pnoexz\Exceptions\JsonUtf16Exception;
use Pnoexz\Exceptions\JsonUtf8Exception;

class Json
{
    /**
     * @param mixed $input
     * @param int   $options
     * @param int   $depth
     * @return string
     */
    public static function encode(
        $input,
        int $options = 0,
        int $depth = 512
    ): string {
        /** @var string $encoded */
        $encoded = \json_encode($input, $options, $depth);
        self::assertNoErrors();

        return $encoded;
    }

    /**
     * @param string $json
     * @param bool   $assoc
     * @param int    $depth
     * @param int    $options
     * @return mixed
     */
    public static function decode(
        string $json,
        bool $assoc = false,
        int $depth = 512,
        int $options = 0
    ) {
        $decoded = \json_decode($json, $assoc, $depth, $options);

        self::assertNoErrors();

        return $decoded;
    }

    /**
     * @param string|null $json
     * @param bool        $assoc
     * @param int         $depth
     * @param int         $options
     * @return mixed|null
     */
    public static function decodeNullable(
        ?string $json,
        bool $assoc = false,
        int $depth = 512,
        int $options = 0
    ) {
        if (is_null($json)) {
            return null;
        }

        return self::decode($json, $assoc, $depth, $options);
    }

    /**
     * @return bool
     * @throws JsonDepthException
     * @throws JsonStateMismatchException
     * @throws JsonCtrlCharException
     * @throws JsonSyntaxException
     * @throws JsonUtf8Exception
     * @throws JsonRecursionException
     * @throws JsonInfOrNanException
     * @throws JsonUnsupportedTypeException
     * @throws JsonInvalidPropertyNameException
     * @throws JsonUtf16Exception
     */
    private static function assertNoErrors(): bool
    {
        $lastError = \json_last_error();
        if (!empty($lastError)) {
            switch ($lastError) {
                case \JSON_ERROR_DEPTH:
                    throw new JsonDepthException();
                case \JSON_ERROR_STATE_MISMATCH:
                    throw new JsonStateMismatchException();
                case \JSON_ERROR_CTRL_CHAR:
                    throw new JsonCtrlCharException();
                case \JSON_ERROR_SYNTAX:
                    throw new JsonSyntaxException();
                case \JSON_ERROR_UTF8:
                    throw new JsonUtf8Exception();
                case \JSON_ERROR_RECURSION:
                    throw new JsonRecursionException();
                case \JSON_ERROR_INF_OR_NAN:
                    throw new JsonInfOrNanException();
                case \JSON_ERROR_UNSUPPORTED_TYPE:
                    throw new JsonUnsupportedTypeException();
                case \JSON_ERROR_INVALID_PROPERTY_NAME:
                    throw new JsonInvalidPropertyNameException();
                case \JSON_ERROR_UTF16:
                    throw new JsonUtf16Exception();
            }
        }

        return true;
    }
}
