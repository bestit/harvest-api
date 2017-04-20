<?php

namespace Tests\Unit;

use BestIt\Harvest\Utils\Utils;
use Tests\TestCase;

class UtilsTest extends TestCase
{
    public function testCamelCaseToSnakeCaseConversion()
    {
        $this->assertEquals('camel_case', Utils::fromCamelCaseToSnakeCase('CamelCase'));
        $this->assertEquals('camel_case', Utils::fromCamelCaseToSnakeCase('camelCase'));
        $this->assertEquals('this_is_a_test_string', Utils::fromCamelCaseToSnakeCase('thisIsATestString'));
        $this->assertEquals('this_is_a_test_string', Utils::fromCamelCaseToSnakeCase('ThisIsATestString'));
    }

    public function testSnakeCaseToCamelCaseConversion()
    {
        $this->assertEquals('camelCase', Utils::snakeCaseToCamelCase('camel_case'));
        $this->assertEquals('CamelCase', Utils::snakeCaseToCamelCase('camel_case', true));
        $this->assertEquals('thisIsATestString', Utils::snakeCaseToCamelCase('this_is_a_test_string'));
        $this->assertEquals('ThisIsATestString', Utils::snakeCaseToCamelCase('this_is_a_test_string', true));
    }
}
