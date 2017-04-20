<?php

namespace BestIt\Harvest\Endpoints;

use BestIt\Harvest\Models\Expenses\Categories as ExpenseCategoriesModel;
use BestIt\Harvest\Models\Expenses\Category as ExpenseCategoryModel;
use BestIt\Harvest\Models\Expenses\Expense as ExpenseModel;
use BestIt\Harvest\Models\Expenses\Expenses as ExpensesModel;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Clients
 *
 * @package BestIt\Harvest\Endpoints
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class Expenses extends BaseEndpoint
{
    /**
     * Retrieve all expenses or all expenses for a specific user.
     *
     * @param int|null $userId
     * @return ExpensesModel
     */
    public function all($userId = null)
    {
        $uri = '/expenses';

        if ($userId !== null) {
            $uri .= "?of_user={$userId}";
        }

        $response = $this->httpClient->get($uri);

        return $this->expensesModel($response);
    }

    /**
     * Retrieve all expense categories.
     *
     * @return ExpenseCategoriesModel
     */
    public function allCategories()
    {
        $response = $this->httpClient->get('/expense_categories');

        return $this->expenseCategoriesModel($response);
    }

    /**
     * Retrieve a specific expense.
     *
     * @param int $id
     * @return ExpenseModel
     */
    public function find($id)
    {
        $response = $this->httpClient->get("/expenses/{$id}");

        return $this->expenseModel($response);
    }

    /**
     * Retrieve a specific expense category.
     *
     * @param int $id
     * @return ExpenseCategoryModel
     */
    public function findCategory($id)
    {
        $response = $this->httpClient->get("/expense_categories/{$id}");

        return $this->expenseCategoryModel($response);
    }

    /**
     * Create an expense.
     *
     * @param ExpenseModel $expense
     * @return bool
     */
    public function create(ExpenseModel $expense)
    {
        $this->httpClient->post('/expenses', [
            'json' => [
                'expense' => $expense->toArray()
            ]
        ]);

        return true;
    }

    /**
     * Create an expense category.
     *
     * @param ExpenseCategoryModel $expenseCategory
     * @return ExpenseModel
     */
    public function createCategory(ExpenseCategoryModel $expenseCategory)
    {
        $response = $this->httpClient->post('/expense_categories', [
            'json' => [
                'expense_category' => $expenseCategory->toArray()
            ]
        ]);

        return $this->findCategory($this->getIdFromLocationHeader($response));
    }

    /**
     * Update an expense.
     *
     * @param ExpenseModel $expense
     * @return ExpenseModel
     */
    public function update(ExpenseModel $expense)
    {
        $this->httpClient->put("/expenses/{$expense->id}", [
            'json' => [
                'expense' => $expense->toArray()
            ]
        ]);

        return $this->find($expense->id);
    }

    /**
     * Update an expense category.
     *
     * @param ExpenseCategoryModel $expenseCategory
     * @return ExpenseCategoryModel
     */
    public function updateCategory(ExpenseCategoryModel $expenseCategory)
    {
        $response = $this->httpClient->put("/expense_categories/{$expenseCategory->id}", [
            'json' => [
                'expense_category' => $expenseCategory->toArray()
            ]
        ]);

        return $this->findCategory($this->getIdFromLocationHeader($response));
    }

    /**
     * Delete an expense.
     *
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        $this->httpClient->delete("/expenses/{$id}");

        return true;
    }

    /**
     * Delete an expense category.
     *
     * @param int $id
     * @return bool
     */
    public function deleteCategory($id)
    {
        $this->httpClient->delete("/expense_categories/{$id}");

        return true;
    }

    /**
     * Helper method to convert a response to an expense model.
     *
     * @param ResponseInterface $response
     * @return ExpenseModel
     */
    private function expenseModel(ResponseInterface $response)
    {
        $expense = $this->outerArray($response);

        return new ExpenseModel($expense);
    }

    /**
     * Helper method to convert a response to an expenses model.
     *
     * @param ResponseInterface $response
     * @return ExpensesModel
     */
    private function expensesModel(ResponseInterface $response)
    {
        $expenses = $this->innerArray($response, 'expense');

        return new ExpensesModel($expenses);
    }

    /**
     * Helper method to convert a response to an expense category model.
     *
     * @param ResponseInterface $response
     * @return ExpenseCategoryModel
     */
    private function expenseCategoryModel(ResponseInterface $response)
    {
        $expenseCategory = $this->outerArray($response);

        return new ExpenseCategoryModel($expenseCategory);
    }

    /**
     * Helper method to convert a response to an expense categories model.
     *
     * @param ResponseInterface $response
     * @return ExpenseCategoriesModel
     */
    private function expenseCategoriesModel(ResponseInterface $response)
    {
        $expenseCategories = $this->innerArray($response, 'expense_category');

        return new ExpenseCategoriesModel($expenseCategories);
    }
}
