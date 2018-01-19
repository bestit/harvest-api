<?php

namespace BestIt\Harvest\Tests;

use BestIt\Harvest;
use BestIt\Harvest\Tests\Unit\BaseTestCase;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;

class ClientTest extends BaseTestCase
{
    /** @test */
    function all_clients_can_be_retrieved()
    {
        $container = [];
        $history = Middleware::history($container);
        $guzzleMock = new MockHandler([
            new Response(200, [], $this->getFixtureContent('paginated_clients')),
        ]);
        $stack = HandlerStack::create($guzzleMock);
        $stack->push($history);
        $guzzleClient = new HttpClient(['handler' => $stack]);

        $harvest = new Harvest\Client(1, 'token', [], $guzzleClient);

        $response = $harvest->clients()->all();

        $transaction = reset($container);

        $this->assertSame('clients', (string) $transaction['request']->getUri());
        $this->assertStringEqualsFile($this->getFixturePath('paginated_clients'), $response);

//        $this->assertSame(1, $response->getPage());
//        $this->assertSame(100, $response->getPerPage());
//        $this->assertSame(1, $response->getTotalPages());
//        $this->assertSame(2, $response->getTotalEntries());
//
//        $this->assertFalse($response->hasNextPage());
//        $this->assertFalse($response->hasPreviousPage());
    }
}
