<?php

namespace BestIt\Harvest\Models\Clients;

use BestIt\Harvest\Models\ModelCollection;

/**
 * Class Clients
 *
 * @package BestIt\Harvest\Models\Clients
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 * @method Expense offsetGet($offset)
 */
class Clients extends ModelCollection
{
    /**
     * Clients constructor.
     *
     * @param array $clients
     */
    public function __construct(array $clients)
    {
        $this->setData($clients, Client::class);
    }
}
