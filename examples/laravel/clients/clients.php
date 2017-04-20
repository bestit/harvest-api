<?php

/* Retrieve all clients. */
$clients = Harvest::clients()->all();

/* Retrieve a specific client */
$client = Harvest::clients()->find(1);

/* Create a client. */
$clientToBeCreated = new \BestIt\Harvest\Models\Clients\Client();
$clientToBeCreated->name = 'Name of the client';
$clientToBeCreated->currency = 'United States Dollar - USD';
$clientToBeCreated->currencySymbol = '$';
$clientToBeCreated->active = true;
$clientToBeCreated->details = "123 Main St\r\nAnytown, NY 12345";

/** @var \BestIt\Harvest\Models\Clients\Client $createdClient */
$createdClient = Harvest::clients()->create($clientToBeCreated);

/* Update a client. */
$clientToBeUpdated = new \BestIt\Harvest\Models\Clients\Client();
$clientToBeUpdated->id = 1; // ID of the client that you want to updated.
$clientToBeUpdated->name = 'New client name';

$updatedClient = Harvest::clients()->update($clientToBeUpdated);

/* Activate or deactivate an existing client. */
$client = Harvest::clients()->toggle(1);

/* Delete a client. */
/** @var bool $deleted */
$deleted = Harvest::clients()->delete(1);