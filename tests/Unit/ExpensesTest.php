<?php

namespace Tests\Unit;

use BestIt\Harvest\Models\Expenses\Categories as ExpenseCategoriesModel;
use BestIt\Harvest\Models\Expenses\Category as ExpenseCategoryModel;
use BestIt\Harvest\Models\Expenses\Expense as ExpenseModel;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use OutOfBoundsException;
use Tests\TestCase;

/**
 * Class ExpensesTest
 *
 * @package Tests\Unit
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class ExpensesTest extends TestCase
{
    public function testThatASingleExpenseCanBeRetrieved()
    {
        $generatedExpense = $this->generateExpense();

        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedExpense))
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $expense = $httpClient->expenses()->find(1);

        $this->assertInstanceOf(ExpenseModel::class, $expense);
        $this->assertEquals($expense->toArray(), $generatedExpense['expense']);
    }

    public function testThatAnExpenseCanBeCreated()
    {
        $generatedExpense = $this->generateExpense();
        $expense = new ExpenseModel($generatedExpense['expense']);

        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedExpense))
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $this->assertTrue(
            $httpClient->expenses()->create($expense)
        );
    }

    public function testThatAnExpenseCanBeUpdated()
    {
        $generatedExpense = $this->generateExpense();
        $expense = new ExpenseModel($generatedExpense['expense']);

        $mock = new MockHandler([
            new Response(200),
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedExpense)),
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $expense = $httpClient->expenses()->update($expense);

        $this->assertInstanceOf(ExpenseModel::class, $expense);
        $this->assertEquals($generatedExpense['expense'], $expense->toArray());
    }

    public function testThatAnExpenseCanBeDeleted()
    {
        $mock = new MockHandler([
            new Response(200)
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $this->assertTrue(
            $httpClient->expenses()->delete(1)
        );
    }

    public function testThatAllExpenseCategoriesCanBeRetrieved()
    {
        $generatedExpenses = $this->generateModels([$this, 'generateExpenseCategory']);

        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedExpenses))
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $expenseCategories = $httpClient->expenses()->allCategories();

        $this->assertInstanceOf(ExpenseCategoriesModel::class, $expenseCategories);
    }

    public function testThatASingleExpenseCategoryCanBeRetrieved()
    {
        $generatedExpenseCategory = $this->generateExpenseCategory();

        $mock = new MockHandler([
            new Response(200, [
                'Content-Type' => 'application/json'
            ], \GuzzleHttp\json_encode($generatedExpenseCategory))
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $expenseCategory = $httpClient->expenses()->findCategory($generatedExpenseCategory['expense_category']['id']);

        $this->assertInstanceOf(ExpenseCategoryModel::class, $expenseCategory);
        $this->assertEquals($generatedExpenseCategory['expense_category'], $expenseCategory->toArray());
    }

    public function testThatAnExpenseCategoryCanBeCreated()
    {
        $generatedExpenseCategory = $this->generateExpenseCategory();
        $expenseCategory = new ExpenseCategoryModel($generatedExpenseCategory['expense_category']);

        $mock = new MockHandler([
            new Response(201, ['Location' => '/expense_categories/1']),
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedExpenseCategory))
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $expenseCategory = $httpClient->expenses()->createCategory($expenseCategory);

        $this->assertInstanceOf(ExpenseCategoryModel::class, $expenseCategory);
        $this->assertEquals($generatedExpenseCategory['expense_category'], $expenseCategory->toArray());
    }

    public function testThatAnExpenseCategoryCreationThrowsAnExceptionIfTheLocationHeaderIsNotPresent()
    {
        $this->expectException(OutOfBoundsException::class);

        $generatedExpenseCategory = $this->generateExpenseCategory();
        $expenseCategory = new ExpenseCategoryModel($generatedExpenseCategory['expense_category']);

        $mock = new MockHandler([
            new Response(201)
        ]);

        $handler = HandlerStack::create($mock);
        $this->createHarvestClient($handler)->expenses()->createCategory($expenseCategory);
    }

    public function testThatAnExpenseCategoryCanBeUpdated()
    {
        $generatedExpenseCategory = $this->generateExpenseCategory();
        $expenseCategory = new ExpenseCategoryModel($generatedExpenseCategory['expense_category']);

        $mock = new MockHandler([
            new Response(200, ['Location' => '/expense_categories/1']),
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedExpenseCategory))
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $expenseCategory = $httpClient->expenses()->updateCategory($expenseCategory);

        $this->assertInstanceOf(ExpenseCategoryModel::class, $expenseCategory);
        $this->assertEquals($generatedExpenseCategory['expense_category'], $expenseCategory->toArray());
    }

    public function testThatAnExpenseCategoryUpdateThrowsAnExceptionIfTheLocationHeaderIsNotPresent()
    {
        $this->expectException(OutOfBoundsException::class);

        $generatedExpenseCategory = $this->generateExpenseCategory();
        $expenseCategory = new ExpenseCategoryModel($generatedExpenseCategory['expense_category']);

        $mock = new MockHandler([
            new Response(200)
        ]);

        $handler = HandlerStack::create($mock);
        $this->createHarvestClient($handler)->expenses()->updateCategory($expenseCategory);
    }

    public function testThatAnExpenseCategoryCanBeDeleted()
    {
        $mock = new MockHandler([
            new Response(200)
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $this->assertTrue(
            $httpClient->expenses()->deleteCategory(1)
        );
    }
}
