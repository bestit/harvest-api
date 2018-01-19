<?php

namespace BestIt\Harvest\Tests\Unit\Transformer;

use BestIt\Harvest\Model;
use BestIt\Harvest\Transformer;
use BestIt\Harvest\Tests\Unit\BaseTestCase;

class RoleTest extends BaseTestCase
{
    /** @test */
    function can_transform_json_data_into_model()
    {
        $transformer = new Transformer\Role();
        $data = \GuzzleHttp\json_decode(
            $this->getFixtureContent('role'),
            true
        );

        $role = $transformer->transform(collect($data));

        $this->assertInstanceOf(Model\Role::class, $role);

        $this->assertSame(1782974, $role->getId());
        $this->assertSame('Founder', $role->getName());
        $this->assertSame(8083365, $role->getUserIds()->first());
        $this->assertSame('2017-06-26 22:34:41', $role->getCreatedAt()->format('Y-m-d H:i:s'));
        $this->assertSame('2017-06-26 22:34:52', $role->getUpdatedAt()->format('Y-m-d H:i:s'));
    }
}
