<?php

$harvestClient = new \BestIt\Harvest\Client('url', 'username', 'password');

/* Retrieve all contacts. */
$contacts = $harvestClient->contacts()->all();

/* Retrieve all contacts that were updated since 5 days*/
$contacts = $harvestClient->contacts()->all(new DateTime('-5 days'));

/* Retrieve all contacts of a specific client */
$contacts = $harvestClient->contacts()->findByClientId(1);

/* Retrieve all contacts of a specific client that were updated since 1 day. */
$contacts = $harvestClient->contacts()->findByClientId(1, new DateTime('-1 day'));

/* Retrieve a specific contact */
$contact = $harvestClient->contacts()->find(1);

/* Create a new contact */
$contactToBeCreated = new \BestIt\Harvest\Models\Contacts\Contact();
$contactToBeCreated->clientId = 1;
$contactToBeCreated->firstName = 'FirstName';
$contactToBeCreated->lastName = 'LastName';

$createdContact = $harvestClient->contacts()->create($contactToBeCreated);

/* Update a contact */
$contactToBeUpdated = new \BestIt\Harvest\Models\Contacts\Contact();
$contactToBeUpdated->id = 1;
$contactToBeUpdated->firstName = 'NewFirstName';

$updatedContact = $harvestClient->contacts()->update($contactToBeUpdated);

/* Delete a contact */
/** @var bool $deleted */
$deleted = $harvestClient->contacts()->delete(1);