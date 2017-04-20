<?php

namespace Tests\Unit;

use BestIt\Harvest\Models\Tasks\Task as TaskModel;
use BestIt\Harvest\Models\Tasks\Tasks as TasksModel;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use OutOfBoundsException;
use Tests\TestCase;

class TasksTest extends TestCase
{
    public function testThatAllTasksCanBeRetrieved()
    {
        $generatedTasks = $this->generateModels([$this, 'generateTask']);

        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedTasks))
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $tasks = $httpClient->tasks()->all();

        $this->assertInstanceOf(TasksModel::class, $tasks);
        $this->assertCount(2, $tasks);
    }

    public function testThatASingleTaskCanBeRetrieved()
    {
        $generatedTask = $this->generateTask();

        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedTask))
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $task = $httpClient->tasks()->find(1);

        $this->assertInstanceOf(TaskModel::class, $task);
        $this->assertEquals($generatedTask['task'], $task->toArray());
    }

    public function testThatATaskCanBeCreated()
    {
        $generatedTask = $this->generateTask();
        $task = new TaskModel($generatedTask['task']);

        $mock = new MockHandler([
            new Response(201, ['Location' => '/tasks/1']),
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedTask))
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $task = $httpClient->tasks()->create($task);

        $this->assertInstanceOf(TaskModel::class, $task);
        $this->assertEquals($generatedTask['task'], $task->toArray());
    }

    public function testThatATaskCreationThrowsAnExceptionIfTheLocationHeaderIsNotPresent()
    {
        $this->expectException(OutOfBoundsException::class);

        $generatedTask = $this->generateTask();
        $task = new TaskModel($generatedTask['task']);

        $mock = new MockHandler([
            new Response(201)
        ]);

        $handler = HandlerStack::create($mock);
        $this->createHarvestClient($handler)->tasks()->create($task);
    }

    public function testThatATaskCanBeUpdated()
    {
        $generatedTask = $this->generateTask();
        $task = new TaskModel($generatedTask['task']);

        $mock = new MockHandler([
            new Response(200),
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedTask)),
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $task = $httpClient->tasks()->update($task);

        $this->assertInstanceOf(TaskModel::class, $task);
        $this->assertEquals($generatedTask['task'], $task->toArray());
    }

    public function testThatATaskCanBeReActivated()
    {
        $generatedTask = $this->generateTask();

        $mock = new MockHandler([
            new Response(200),
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedTask)),
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $task = $httpClient->tasks()->activate($generatedTask['task']['id']);

        $this->assertInstanceOf(TaskModel::class, $task);
        $this->assertEquals($generatedTask['task'], $task->toArray());
    }

    public function testThatATaskCanBeDeleted()
    {
        $mock = new MockHandler([
            new Response(200)
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $deleted = $httpClient->tasks()->delete(1);

        $this->assertTrue($deleted);
    }
}
