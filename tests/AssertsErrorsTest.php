<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Pnoexz\Exceptions\JsonCtrlCharException;
use Pnoexz\Exceptions\JsonDepthException;
use Pnoexz\Exceptions\JsonException;
use Pnoexz\Exceptions\JsonInfOrNanException;
use Pnoexz\Exceptions\JsonInvalidPropertyNameException;
use Pnoexz\Exceptions\JsonStateMismatchException;
use Pnoexz\Exceptions\JsonSyntaxException;
use Pnoexz\Exceptions\JsonUnsupportedTypeException;
use Pnoexz\Exceptions\JsonUtf16Exception;
use Pnoexz\Exceptions\JsonUtf8Exception;
use Pnoexz\Json;

class AssertsErrorsTest extends TestCase
{
    /**
     * @test
     */
    public function throwsOnMaxDepth()
    {
        $toDecode = str_repeat('{"depth":', 999) . str_repeat('}', 999);

        $this->expectException(\Exception::class);
        $this->expectException(JsonException::class);
        $this->expectException(JsonDepthException::class);

        Json::decode($toDecode);
    }

    /**
     * @test
     */
    public function throwsOnStateMismatch()
    {
        $toDecode = '{"id": 7139, "booleans": true]';

        $this->expectException(\Exception::class);
        $this->expectException(JsonException::class);
        $this->expectException(JsonStateMismatchException::class);

        Json::decode($toDecode);
    }

    /**
     * @test
     */
    public function throwsOnSyntaxError()
    {
        $toDecode = '{id: 7139}';

        $this->expectException(\Exception::class);
        $this->expectException(JsonException::class);
        $this->expectException(JsonSyntaxException::class);

        Json::decode($toDecode);
    }

    /**
     * @test
     */
    public function throwsOnUtf8Error()
    {
        $toDecode = '{"id": 7139, "name":"ñ"}';
        $iso88591Encoded = iconv('UTF-8', 'ISO-8859-1', $toDecode);

        $this->expectException(\Exception::class);
        $this->expectException(JsonException::class);
        $this->expectException(JsonUtf8Exception::class);

        Json::decode($iso88591Encoded);
    }

    /**
     * @test
     */
    public function throwsOnPositiveInfError()
    {
        $toEncode = [
            'infinity' => +\INF,
        ];

        $this->expectException(\Exception::class);
        $this->expectException(JsonException::class);
        $this->expectException(JsonInfOrNanException::class);

        Json::encode($toEncode);
    }

    /**
     * @test
     */
    public function throwsOnNegativeInfError()
    {
        $toEncode = [
            'infinity' => -\INF,
        ];

        $this->expectException(\Exception::class);
        $this->expectException(JsonException::class);
        $this->expectException(JsonInfOrNanException::class);

        Json::encode($toEncode);
    }

    /**
     * @test
     */
    public function throwsOnNanError()
    {
        $toEncode = [
            'not a number' => \NAN,
        ];

        $this->expectException(\Exception::class);
        $this->expectException(JsonException::class);
        $this->expectException(JsonInfOrNanException::class);

        Json::encode($toEncode);
    }

    /**
     * @test
     */
    public function throwsOnUnsupportedType()
    {
        $toEncode = [
            'resource' => fopen('php://stdin', 'r'),
        ];

        $this->expectException(\Exception::class);
        $this->expectException(JsonException::class);
        $this->expectException(JsonUnsupportedTypeException::class);

        Json::encode($toEncode);
    }

    /**
     * @test
     */
    public function throwsOnInvalidPropertyName()
    {
        $this->expectException(\Exception::class);
        $this->expectException(JsonException::class);
        $this->expectException(JsonInvalidPropertyNameException::class);

        Json::decode('[{"key1": 0, "\u0000": 1}]');
    }

    /**
     * @test
     */
    public function throwsOnUtf16Error()
    {
        $this->expectException(\Exception::class);
        $this->expectException(JsonException::class);
        $this->expectException(JsonUtf16Exception::class);

        Json::decode('"\ud834"');
    }
}
