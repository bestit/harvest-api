<?php

namespace BestIt\Harvest\Tests\Unit\Transformer;

use BestIt\Harvest\Model;
use BestIt\Harvest\Transformer;
use BestIt\Harvest\Tests\Unit\BaseTestCase;

class TaskTest extends BaseTestCase
{
    /** @test */
    function can_transform_json_data_into_model()
    {
        $transformer = new Transformer\Task();
        $data = \GuzzleHttp\json_decode(
            $this->getFixtureContent('task'),
            true
        );

        $task = $transformer->transform(collect($data));

        $this->assertInstanceOf(Model\Task::class, $task);

        $this->assertSame(8083800, $task->getId());
        $this->assertSame('Business Development', $task->getName());
        $this->assertSame(0.0, $task->getDefaultHourlyRate());
        $this->assertSame('2017-06-26 22:08:25', $task->getCreatedAt()->format('Y-m-d H:i:s'));
        $this->assertSame('2017-06-26 22:08:25', $task->getUpdatedAt()->format('Y-m-d H:i:s'));

        $this->assertTrue($task->isActive());
        $this->assertFalse($task->isBillableByDefault());
        $this->assertFalse($task->isDefault());
    }
}
