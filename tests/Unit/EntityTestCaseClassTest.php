<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tests\EntityTestCase;

class EntityTestCaseClassTest extends TestCase
{
    protected string $namespace = EntityTestCase::class ;

    public function test_EntityTestCase_class_should_is_exist():void {
        $isExist = class_exists($this->namespace);
        $this->assertTrue(
            $isExist ,
            " no exist $this->namespace class !!! "
        );
    }
}
