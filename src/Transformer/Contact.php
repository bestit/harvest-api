<?php

namespace BestIt\Harvest\Transformer;

class Contact extends BaseTransformer
{
    public function modelClass(): string
    {
        return \BestIt\Harvest\Model\Contact::class;
    }
}
