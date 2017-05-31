<?php declare(strict_types=1);

namespace Tests;

use BestIt\Harvest\Client as HttpClient;
use Faker\Factory as FakerFactory;
use Faker\Generator;
use GuzzleHttp\HandlerStack;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * Class TestCase
 *
 * @package Tests
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class TestCase extends BaseTestCase
{
    /** @var Generator $faker */
    protected $faker;

    protected function setUp()
    {
        $this->faker = FakerFactory::create();
    }

    /**
     * @param HandlerStack $handler
     * @return HttpClient
     */
    protected function createHarvestClient(HandlerStack $handler)
    {
        return new HttpClient('', '', '', ['handler' => $handler]);
    }

    protected function generateProject()
    {
        return [
            'project' => [
                'id' => $this->faker->numberBetween(),
                'client_id' => $this->faker->numberBetween(),
                'name' => $this->faker->name,
                'code' => $this->faker->name,
                'active' => $this->faker->boolean(),
                'billable' => $this->faker->boolean(),
                'bill_by' => $this->faker->shuffleString(),
                'hourly_rate' => $this->faker->numberBetween(0, 200),
                'budget' => $this->faker->numberBetween(0, 100000),
                'budget_by' => $this->faker->name,
                'notify_when_over_budget' => $this->faker->boolean(),
                'over_budget_notification_percentage' => $this->faker->numberBetween(0, 100),
                'over_budget_notified_at' => $this->faker->randomDigitNotNull,
                'show_budget_to_all' => $this->faker->boolean(),
                'created_at' => '2013-04-30T20 =>28 =>12Z',
                'updated_at' => '2015-04-15T15 =>44 =>17Z',
                'starts_on' => '2013-04-30',
                'ends_on' => '2015-06-01',
                'estimate' => $this->faker->numberBetween(0, 100000),
                'estimate_by' => $this->faker->name,
                'hint_earliest_record_at' => '2013-04-30',
                'hint_latest_record_at' => '2014-12-09',
                'notes' => $this->faker->words(5, false),
                'cost_budget' => $this->faker->randomDigitNotNull,
                'cost_budget_include_expenses' => $this->faker->boolean()
            ]
        ];
    }

    protected function generateProjects()
    {
        $projects = [
            'project' => [
                'id' => $this->faker->numberBetween(),
                'client_id' => 123,
                'name' => $this->faker->name,
                'code' => $this->faker->name,
                'active' => $this->faker->boolean(),
                'billable' => $this->faker->boolean(),
                'bill_by' => $this->faker->shuffleString(),
                'hourly_rate' => $this->faker->numberBetween(0, 200),
                'budget' => $this->faker->numberBetween(0, 100000),
                'budget_by' => $this->faker->name,
                'notify_when_over_budget' => $this->faker->boolean(),
                'over_budget_notification_percentage' => $this->faker->numberBetween(0, 100),
                'over_budget_notified_at' => $this->faker->randomDigitNotNull,
                'show_budget_to_all' => $this->faker->boolean(),
                'created_at' => '2013-04-30T20 =>28 =>12Z',
                'updated_at' => '2015-04-15T15 =>44 =>17Z',
                'starts_on' => '2013-04-30',
                'ends_on' => '2015-06-01',
                'estimate' => $this->faker->numberBetween(0, 100000),
                'estimate_by' => $this->faker->name,
                'hint_earliest_record_at' => '2013-04-30',
                'hint_latest_record_at' => '2014-12-09',
                'notes' => $this->faker->words(5, false),
                'cost_budget' => $this->faker->randomDigitNotNull,
                'cost_budget_include_expenses' => $this->faker->boolean()
            ],
            [
                'project' => [
                    'id' => $this->faker->numberBetween(),
                    'client_id' => 123,
                    'name' => $this->faker->name,
                    'code' => $this->faker->name,
                    'active' => $this->faker->boolean(),
                    'billable' => $this->faker->boolean(),
                    'bill_by' => $this->faker->shuffleString(),
                    'hourly_rate' => $this->faker->numberBetween(0, 200),
                    'budget' => $this->faker->numberBetween(0, 100000),
                    'budget_by' => $this->faker->name,
                    'notify_when_over_budget' => $this->faker->boolean(),
                    'over_budget_notification_percentage' => $this->faker->numberBetween(0, 100),
                    'over_budget_notified_at' => $this->faker->randomDigitNotNull,
                    'show_budget_to_all' => $this->faker->boolean(),
                    'created_at' => '2013-04-30T20 =>28 =>12Z',
                    'updated_at' => '2015-04-15T15 =>44 =>17Z',
                    'starts_on' => '2013-04-30',
                    'ends_on' => '2015-06-01',
                    'estimate' => $this->faker->numberBetween(0, 100000),
                    'estimate_by' => $this->faker->name,
                    'hint_earliest_record_at' => '2013-04-30',
                    'hint_latest_record_at' => '2014-12-09',
                    'notes' => $this->faker->words(5, false),
                    'cost_budget' => $this->faker->randomDigitNotNull,
                    'cost_budget_include_expenses' => $this->faker->boolean()
                ]
            ]
        ];

        return $projects;
    }

    protected function generateUser()
    {
        return [
            'user' => [
                'id' => $this->faker->numberBetween(),
                'email' => $this->faker->email,
                'created_at' => '2013-04-30T20:28:12Z',
                'is_admin' => $this->faker->boolean,
                'first_name' => $this->faker->firstName,
                'last_name' => $this->faker->lastName,
                'timezone' => $this->faker->timezone,
                'is_contractor' => $this->faker->boolean,
                'telephone' => $this->faker->phoneNumber,
                'is_active' => $this->faker->boolean,
                'has_access_to_all_future_projects' => $this->faker->boolean,
                'default_hourly_rate' => $this->faker->numberBetween(),
                'department' => '',
                'wants_newsletter' => $this->faker->boolean,
                'updated_at' => '2015-04-29T14:54:19Z',
                'cost_rate' => $this->faker->numberBetween(),
                'identity_account_id' => $this->faker->numberBetween(),
                'identity_user_id' => $this->faker->numberBetween()
            ]
        ];
    }

    protected function generateClient()
    {
        return [
            'client' => [
                'id' => $this->faker->numberBetween(),
                'name' => $this->faker->name,
                'active' => $this->faker->boolean,
                'currency' => 'United States Dollar - USD',
                'highrise_id' => null,
                'cache_version' => $this->faker->numberBetween(),
                'created_at' => '2015-04-29T14:54:19Z',
                'updated_at' => '2015-04-29T14:54:19Z',
                'currency_symbol' => '$',
                'details' => $this->faker->address,
                'default_invoice_timeframe' => null,
                'last_invoice_kind' => null
            ]
        ];
    }

    protected function generateTask()
    {
        return [
            'task' => [
                'id' => $this->faker->numberBetween(),
                'name' => $this->faker->name,
                'billable_by_default' => $this->faker->boolean,
                'created_at' => '2013-04-30T20:28:12Z',
                'updated_at' => '2015-04-29T14:54:19Z',
                'is_default' => $this->faker->boolean,
                'default_hourly_rate' => $this->faker->numberBetween(),
                'deactivated' => $this->faker->boolean
            ]
        ];
    }

    protected function generateDayEntry()
    {
        return [
            'id' => $this->faker->numberBetween(),
            'project_id' => $this->faker->numberBetween(),
            'project' => $this->faker->numberBetween(),
            'user_id' => $this->faker->numberBetween(),
            'spent_at' => '2015-11-24',
            'task_id' => $this->faker->numberBetween(),
            'task' => $this->faker->word,
            'client' => $this->faker->company,
            'notes' => $this->faker->text,
            'created_at' => '2015-11-24T19:59:45Z',
            'updated_at' => '2015-11-24T19:59:45Z',
            'hours_without_timer' => $this->faker->randomFloat(),
            'hours' => $this->faker->randomFloat()
        ];
    }

    protected function generateContact()
    {
        return [
            'contact' => [
                'id' => $this->faker->numberBetween(),
                'client_id' => $this->faker->numberBetween(),
                'first_name' => $this->faker->firstName,
                'last_name' => $this->faker->lastName,
                'email' => $this->faker->email,
                'phone_office' => null,
                'phone_mobile' => $this->faker->numberBetween(),
                'fax' => '$',
                'title' => $this->faker->address,
                'created_at' => '2015-04-29T14:54:19Z',
                'updated_at' => '2015-04-29T14:54:19Z',
            ]
        ];
    }

    protected function generateExpense()
    {
        return [
            'expense' => [
                'id' => $this->faker->numberBetween(),
                'total_cost' => $this->faker->numberBetween(),
                'units' => $this->faker->numberBetween(),
                'created_at' => '2015-04-21T14:20:34Z',
                'updated_at' => '2015-04-21T14:34:27Z',
                'project_id' => $this->faker->numberBetween(),
                'expense_category_id' => $this->faker->numberBetween(),
                'user_id' => $this->faker->numberBetween(),
                'spent_at' => '2015-04-17',
                'is_closed' => $this->faker->boolean,
                'notes' => $this->faker->sentence,
                'invoice_id' => $this->faker->numberBetween(),
                'billable' => $this->faker->boolean,
                'company_id' => $this->faker->numberBetween(),
                'has_receipt' => $this->faker->boolean,
                'receipt_url' => $this->faker->url,
                'is_locked' => $this->faker->boolean,
                'locked_reason' => $this->faker->sentence
            ]
        ];
    }

    protected function generateExpenseCategory()
    {
        return [
            'expense_category' => [
                'id' => $this->faker->numberBetween(),
                'name' => $this->faker->name,
                'unit_name' => $this->faker->name,
                'unit_price' => $this->faker->randomFloat(),
                'created_at' => '2015-04-21T14:20:34Z',
                'updated_at' => '2015-04-21T14:34:27Z',
                'deactivated' => $this->faker->boolean,
            ]
        ];
    }

    protected function generateModels(callable $callable, $times = 2)
    {
        $models = [];

        while ($times > 0) {
            $models[] = $callable();
            $times--;
        }

        return $models;
    }
}
