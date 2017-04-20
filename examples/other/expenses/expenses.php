<?php

$harvestClient = new \BestIt\Harvest\Client('url', 'username', 'password');

/* Retrieve all expenses. */
$expenses = $harvestClient->expenses()->all();

/* Retrieve all expenses that belong to a specific user. */
$userId = 1;
$expenses = $harvestClient->expenses()->all($userId);

/* Retrieve a specific expense. */
$expenseId = 1;
$expense = $harvestClient->expenses()->find($expenseId);

/* Create a expense. */
$expenseToBeCreated = new \BestIt\Harvest\Models\Expenses\Expense();
$expenseToBeCreated->notes = 'Your expense';
$expenseToBeCreated->totalCost = 11;
$expenseToBeCreated->projectId = 123;
$expenseToBeCreated->expenseCategoryId = 1111;
$expenseToBeCreated->billable = true;

/** @var bool $createdExpense */
$createdExpense = $harvestClient->expenses()->create($expenseToBeCreated);

/* Update an expense. */
$expenseToBeUpdated = new \BestIt\Harvest\Models\Expenses\Expense();
$expenseToBeUpdated->id = 1;
$expenseToBeUpdated->notes = 'Updated expense';

$updatedExpense = $harvestClient->expenses()->update($expenseToBeUpdated);

/* Delete an expense. */
$deleted = $harvestClient->expenses()->delete(1);
