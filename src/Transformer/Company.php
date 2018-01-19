<?php

namespace BestIt\Harvest\Transformer;

class Company extends BaseTransformer
{
    public function modelClass(): string
    {
        return \BestIt\Harvest\Model\Company::class;
    }
}
