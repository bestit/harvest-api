<?php

namespace Tests\Unit;

use BestIt\Harvest\Models\Timesheet\DayEntries;
use BestIt\Harvest\Models\Timesheet\DayEntry;
use BestIt\Harvest\Models\Timesheet\Projects;
use BestIt\Harvest\Models\Timesheet\Timesheet;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Tests\TestCase;

class TimesheetTest extends TestCase
{
    public function testThatTheFullTimesheetCanBeRetrieved()
    {
        $timesheetArray = [
            'for_day' => '2017-04-11',
            'day_entries' => [
                [
                    'id' => 1,
                    'user_id' => 1,
                    'spent_at' => '2017-04-11',
                    'created_at' => '2017-04-11T07:07:41Z',
                    'updated_at' => '2017-04-11T09:26:25Z',
                    'project_id' => '1',
                    'task_id' => '1',
                    'project' => 'Some Project',
                    'task' => 'Programming',
                    'client' => 'Company',
                    'notes' => 'Finished Feature X',
                    'hours_without_timer' => 0.25,
                    'hours' => 0.25,
                ],
                [
                    'id' => 2,
                    'user_id' => 1,
                    'spent_at' => '2017-04-11',
                    'created_at' => '2017-04-11T09:07:41Z',
                    'updated_at' => '2017-04-11T10:26:25Z',
                    'project_id' => '2',
                    'task_id' => '1',
                    'project' => 'Other Project',
                    'task' => 'Programming',
                    'client' => 'Company',
                    'notes' => 'Finished Feature Y',
                    'hours_without_timer' => 0.25,
                    'hours' => 0.25,
                ]
            ],
            'projects' => [
                [
                    'id' => 1,
                    'name' => 'Some Project',
                    'billable' => true,
                    'code' => 'CODE',
                    'tasks' => [
                        [
                            'id' => 1,
                            'name' => 'Test',
                            'billable' => true
                        ],
                        [
                            'id' => 2,
                            'name' => 'Programming',
                            'billable' => true
                        ]
                    ],
                    'client' => 'Company',
                    'client_id' => 12,
                    'can_manage' => true,
                    'client_currency' => 'Euro - EUR',
                    'client_currency_symbol' => '€'
                ]
            ],
        ];

        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($timesheetArray))
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $timesheet = $httpClient->timesheet()->all(false);

        $this->assertInstanceOf(Timesheet::class, $timesheet);
        $this->assertInstanceOf(DayEntries::class, $timesheet->dayEntries);
        $this->assertInstanceOf(Projects::class, $timesheet->projects);
        $this->assertInstanceOf(DayEntry::class, $timesheet->dayEntries->offsetGet(1));
    }

    public function testThatASingleDayEntryCanBeRetrieved()
    {
        $generatedDayEntry = $this->generateDayEntry();

        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedDayEntry))
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $dayEntry = $httpClient->timesheet()->find(1);

        $this->assertInstanceOf(DayEntry::class, $dayEntry);
        $this->assertEquals($generatedDayEntry, $dayEntry->toArray());
    }
}
