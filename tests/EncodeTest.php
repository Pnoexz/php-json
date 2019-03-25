<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Pnoexz\Json;

class EncodeTest extends TestCase
{
    /**
     * @test
     */
    public function encodes()
    {
        $toEncode = [
            "id" => 7139,
        ];

        $encoded = Json::encode($toEncode);

        $this->assertIsString($encoded);
    }
}
