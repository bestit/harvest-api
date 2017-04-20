<?php

namespace Tests\Unit;

use BestIt\Harvest\Models\Users\User as UserModel;
use BestIt\Harvest\Models\Users\Users as UsersModel;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use OutOfBoundsException;
use Tests\TestCase;

class UsersTest extends TestCase
{
    public function testThatAllUsersCanBeRetrieved()
    {
        $usersArray = $this->generateModels([$this, 'generateUser']);

        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($usersArray))
        ]);

        $handler = HandlerStack::create($mock);
        $client = $this->createHarvestClient($handler);

        $users = $client->users()->all();

        $this->assertInstanceOf(UsersModel::class, $users);
        $this->assertCount(2, $users);
    }

    public function testThatASingleUserCanBeRetrieved()
    {
        $generatedUser = $this->generateUser();

        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedUser))
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $user = $httpClient->users()->find(508343);

        $this->assertInstanceOf(UserModel::class, $user);
        $this->assertEquals($generatedUser['user'], $user->toArray());
    }

    public function testThatAUserCanBeCreated()
    {
        $generatedUser = $this->generateUser();
        $user = new UserModel($generatedUser['user']);

        $mock = new MockHandler([
            new Response(201)
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $this->assertTrue(
            $httpClient->users()->create($user)
        );
    }

    public function testThatAUserCanBeUpdated()
    {
        $generatedUser = $this->generateUser();
        $user = new UserModel($generatedUser['user']);

        $mock = new MockHandler([
            new Response(200, ['Location' => "/people/{$user->id}"]),
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedUser)),
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $user = $httpClient->users()->update($user);

        $this->assertInstanceOf(UserModel::class, $user);
        $this->assertEquals($generatedUser['user'], $user->toArray());
    }

    public function testThatAUserUpdateThrowsAnExceptionIfTheLocationHeaderIsNotPresent()
    {
        $this->expectException(OutOfBoundsException::class);

        $generatedUser = $this->generateUser();
        $user = new UserModel($generatedUser['user']);

        $mock = new MockHandler([
            new Response(200)
        ]);

        $handler = HandlerStack::create($mock);
        $this->createHarvestClient($handler)->users()->update($user);
    }

    public function testThatAUserActivationStatusCanBeToggled()
    {
        $generatedUser = $this->generateUser();

        $mock = new MockHandler([
            new Response(200),
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedUser)),
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $user = $httpClient->users()->toggle($generatedUser['user']['id']);

        $this->assertInstanceOf(UserModel::class, $user);
        $this->assertEquals($generatedUser['user'], $user->toArray());
    }

    public function testThatAUserCanBeDeleted()
    {
        $mock = new MockHandler([
            new Response(200)
        ]);

        $handler = HandlerStack::create($mock);
        $client = $this->createHarvestClient($handler);

        $deleted = $client->users()->delete(1);

        $this->assertTrue($deleted);
    }
}
