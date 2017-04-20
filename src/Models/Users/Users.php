<?php

namespace BestIt\Harvest\Models\Users;

use BestIt\Harvest\Models\ModelCollection;

/**
 * Class Users
 *
 * @package BestIt\Harvest\Models
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 * @method User offsetGet($offset)
 */
class Users extends ModelCollection
{
    /**
     * Users constructor.
     *
     * @param array $users
     */
    public function __construct(array $users)
    {
        $this->setData($users, User::class);
    }
}
