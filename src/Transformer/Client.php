<?php

namespace BestIt\Harvest\Transformer;

class Client extends BaseTransformer
{
    public function modelClass(): string
    {
        return \BestIt\Harvest\Model\Client::class;
    }
}
