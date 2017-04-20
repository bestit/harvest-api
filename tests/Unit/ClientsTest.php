<?php

namespace Tests\Unit;

use BestIt\Harvest\Models\Clients\Client as ClientModel;
use BestIt\Harvest\Models\Clients\Clients as ClientsModel;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use OutOfBoundsException;
use Tests\TestCase;

/**
 * Class ClientsTest
 *
 * @package Tests\Unit
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class ClientsTest extends TestCase
{
    public function testThatAllClientsCanBeRetrieved()
    {
        $generatedClients = $this->generateModels([$this, 'generateClient']);

        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedClients))
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $clients = $httpClient->clients()->all();

        $this->assertInstanceOf(ClientsModel::class, $clients);
        $this->assertCount(2, $clients);
    }

    public function testThatASingleClientCanBeRetrieved()
    {
        $generatedClient = $this->generateClient();

        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedClient))
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $client = $httpClient->clients()->find(1);

        $this->assertInstanceOf(ClientModel::class, $client);
        $this->assertEquals($generatedClient['client'], $client->toArray());
    }

    public function testThatAClientCanBeCreated()
    {
        $generatedClient = $this->generateClient();
        $client = new ClientModel($generatedClient['client']);

        $mock = new MockHandler([
            new Response(201, ['Location' => '/clients/1']),
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedClient))
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $client = $httpClient->clients()->create($client);

        $this->assertInstanceOf(ClientModel::class, $client);
        $this->assertEquals($generatedClient['client'], $client->toArray());
    }

    public function testThatAClientCreationThrowsAnExceptionIfTheLocationHeaderIsNotPresent()
    {
        $this->expectException(OutOfBoundsException::class);

        $generatedClient = $this->generateClient();
        $client = new ClientModel($generatedClient['client']);

        $mock = new MockHandler([
            new Response(201)
        ]);

        $handler = HandlerStack::create($mock);
        $this->createHarvestClient($handler)->clients()->create($client);
    }

    public function testThatAClientCanBeUpdated()
    {
        $generatedClient = $this->generateClient();
        $client = new ClientModel($generatedClient['client']);

        $mock = new MockHandler([
            new Response(200, ['Location' => "/clients/{$client->id}"]),
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedClient)),
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $client = $httpClient->clients()->update($client);

        $this->assertInstanceOf(ClientModel::class, $client);
        $this->assertEquals($generatedClient['client'], $client->toArray());
    }

    public function testThatAClientActivationStatusCanBeToggled()
    {
        $generatedClient = $this->generateClient();

        $mock = new MockHandler([
            new Response(200, ['Location' => '/clients/1']),
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedClient)),
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $client = $httpClient->clients()->toggle(1);

        $this->assertInstanceOf(ClientModel::class, $client);
        $this->assertEquals($generatedClient['client'], $client->toArray());
    }

    public function testThatAClientCanBeDeleted()
    {
        $mock = new MockHandler([
            new Response(200)
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $deleted = $httpClient->clients()->delete(1);

        $this->assertTrue($deleted);
    }
}
