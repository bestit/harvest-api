<?php

namespace BestIt\Harvest\Transformer;

class Task extends BaseTransformer
{
    public function modelClass(): string
    {
        return \BestIt\Harvest\Model\Task::class;
    }
}