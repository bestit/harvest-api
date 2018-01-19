<?php

namespace BestIt\Harvest\Tests\Unit\Transformer;

use BestIt\Harvest\Model;
use BestIt\Harvest\Transformer;
use BestIt\Harvest\Tests\Unit\BaseTestCase;

class ClientTest extends BaseTestCase
{
    /** @test */
    function can_transform_json_data_into_model()
    {
        $transformer = new Transformer\Client();
        $data = \GuzzleHttp\json_decode(
            $this->getFixtureContent('single_client'),
            true
        );

        $client = $transformer->transform(collect($data));

        $this->assertInstanceOf(Model\Client::class, $client);

        $this->assertSame(5735776, $client->getId());
        $this->assertSame('123 Industries', $client->getName());
        $this->assertTrue($client->isActive());
        $this->assertSame("123 Main St.\r\nAnytown, LA 71223", $client->getAddress());
        $this->assertSame('EUR', $client->getCurrency());
        $this->assertSame('2017-06-26 21:02:12', $client->getCreatedAt()->format('Y-m-d H:i:s'));
        $this->assertSame('2017-06-26 21:34:11', $client->getUpdatedAt()->format('Y-m-d H:i:s'));
    }
}
