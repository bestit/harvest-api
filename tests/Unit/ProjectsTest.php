<?php declare(strict_types=1);

namespace Tests\Unit;

use BestIt\Harvest\Models\Projects\Projects as ProjectsModel;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Tests\TestCase;

/**
 * Class ProjectsTest
 *
 * @package Tests\Unit
 * @author Marcel Thiesiess <marcel.thiesies@bestit-online.de
 */
class ProjectsTest extends TestCase
{
    public function testThatAllProjectsCanBeRetrieved()
    {
        $generatedProjects = $this->generateModels([$this, 'generateProjects']);

        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedProjects))
        ]);

        $handler = HandlerStack::create($mock);
        $httpclient = $this->createHarvestClient($handler);

        $projects = $httpclient->projects()->all();

        static::assertInstanceOf(ProjectsModel::class, $projects);
    }
}
