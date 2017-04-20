<?php

namespace BestIt\Harvest\Models\Contacts;

use BestIt\Harvest\Models\ModelCollection;

/**
 * Class Contacts
 *
 * @package BestIt\Harvest\Models\Contacts
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 * @method Contact offsetGet($offset)
 */
class Contacts extends ModelCollection
{
    /**
     * Contacts constructor.
     *
     * @param array $contacts
     */
    public function __construct(array $contacts)
    {
        $this->setData($contacts, Contact::class);
    }
}
