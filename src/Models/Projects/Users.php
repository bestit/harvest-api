<?php

namespace BestIt\Harvest\Models\Projects;

use BestIt\Harvest\Models\ModelCollection;

/**
 * Class Users
 *
 * @package BestIt\Harvest\Models\Projects
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 * @method Task offsetGet($offset)
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
