<?php

namespace BestIt\Harvest\Transformer;

class Role extends BaseTransformer
{
    public function modelClass(): string
    {
        return \BestIt\Harvest\Model\Role::class;
    }
}