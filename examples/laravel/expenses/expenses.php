<?php

/* Retrieve all expenses. */
$expenses = Harvest::expenses()->all();

/* Retrieve all expenses that belong to a specific user. */
$userId = 1;
$expenses = Harvest::expenses()->all($userId);

/* Retrieve a specific expense. */
$expenseId = 1;
$expense = Harvest::expenses()->find($expenseId);

/* Create a expense. */
$expenseToBeCreated = new \BestIt\Harvest\Models\Expenses\Expense();
$expenseToBeCreated->notes = 'Your expense';
$expenseToBeCreated->totalCost = 11;
$expenseToBeCreated->projectId = 123;
$expenseToBeCreated->expenseCategoryId = 1111;
$expenseToBeCreated->billable = true;

/** @var bool $createdExpense */
$createdExpense = Harvest::expenses()->create($expenseToBeCreated);

/* Update an expense. */
$expenseToBeUpdated = new \BestIt\Harvest\Models\Expenses\Expense();
$expenseToBeUpdated->id = 1;
$expenseToBeUpdated->notes = 'Updated expense';

$updatedExpense = Harvest::expenses()->update($expenseToBeUpdated);

/* Delete an expense. */
$deleted = Harvest::expenses()->delete(1);
