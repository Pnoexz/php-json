<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Pnoexz\Json;

class DecodeNullableTest extends TestCase
{
    /**
     * @test
     */
    public function decodesNonNull()
    {
        $toDecode = '{"id": 7139, "booleans": true}';

        $decoded = Json::decodeNullable($toDecode);

        $this->assertInstanceOf(\stdClass::class, $decoded);
        $this->assertSame($decoded->id, 7139);
        $this->assertTrue($decoded->booleans);
    }

    /**
     * @test
     */
    public function doesntFailOnNull()
    {
        $decoded = Json::decodeNullable(null);

        $this->assertNull($decoded);
    }

    /**
     * @test
     */
    public function asArrayDecodesNonNull()
    {
        $toDecode = '{"id": 7139, "booleans": true}';

        $decoded = Json::decodeNullableAsArray($toDecode);

        $this->assertIsArray($decoded);
        $this->assertSame($decoded['id'], 7139);
        $this->assertTrue($decoded['booleans']);
    }

    /**
     * @test
     */
    public function asArrayDoesntFailOnNull()
    {
        $decoded = Json::decodeNullableAsArray(null);

        $this->assertNull($decoded);
    }
}
