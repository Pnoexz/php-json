<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Pnoexz\Json;

class DecodeTest extends TestCase
{
    /**
     * @test
     */
    public function decodes()
    {
        $toDecode = '{"id": 7139, "booleans": true}';

        $decoded = Json::decode($toDecode);

        $this->assertInstanceOf(\stdClass::class, $decoded);
        $this->assertSame($decoded->id, 7139);
        $this->assertTrue($decoded->booleans);
    }

    /**
     * @test
     */
    public function decodesAsArray()
    {
        $toDecode = '{"id": 7139, "booleans": true}';

        $decoded = Json::decodeAsArray($toDecode);

        $this->assertIsArray($decoded);
        $this->assertSame($decoded['id'], 7139);
        $this->assertTrue($decoded['booleans']);
    }
}
