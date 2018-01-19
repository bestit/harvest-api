<?php

namespace BestIt\Harvest\Tests\Unit\Transformer;

use BestIt\Harvest\Model;
use BestIt\Harvest\Transformer;
use BestIt\Harvest\Tests\Unit\BaseTestCase;

class CompanyTest extends BaseTestCase
{
    /** @test */
    function can_transform_json_data_into_model()
    {
        $transformer = new Transformer\Company();
        $data = \GuzzleHttp\json_decode(
            $this->getFixtureContent('company'),
            true
        );

        $company = $transformer->transform(collect($data));

        $this->assertInstanceOf(Model\Company::class, $company);

        $this->assertSame('https://test.harvestapp.com', $company->getBaseUri());
        $this->assertSame('test.harvestapp.com', $company->getFullDomain());
        $this->assertSame('API Examples', $company->getName());
        $this->assertSame('Monday', $company->getWeekStartDay());
        $this->assertSame('hours_minutes', $company->getTimeFormat());
        $this->assertSame('trial', $company->getPlanType());
        $this->assertSame('12h', $company->getClock());
        $this->assertSame(',', $company->getDecimalSymbol());
        $this->assertSame('.', $company->getThousandsSeparator());
        $this->assertSame('orange', $company->getColorScheme());

        $this->assertTrue($company->isActive());
        $this->assertFalse($company->wantsTimestampTimers());
        $this->assertTrue($company->expenseFeatureEnabled());
        $this->assertTrue($company->invoiceFeatureEnabled());
        $this->assertFalse($company->estimateFeatureEnabled());
        $this->assertFalse($company->approvalFeatureEnabled());
    }
}
