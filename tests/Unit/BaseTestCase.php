<?php

namespace BestIt\Harvest\Tests\Unit;

use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
{
    public function getFixtureContent(string $name): string
    {
        $content = file_get_contents(static::getFixturePath($name));

        if ($content === false) {
            // TODO: better exception
            throw new \Exception('file_get_contents failed to load data.');
        }

        return $content;
    }

    public function getFixturePath(string $name): string
    {
        $path = __DIR__ . "/Fixtures/{$name}.json";

        if (!file_exists($path)) {
            // TODO better exception
            throw new \Exception("File {$path} does not exist");
        }

        return $path;
    }
}
