<?php

namespace Tests\Unit\App\Contracts\BlogPageApiControllerInterface;

use PHPUnit\Framework\TestCase;
use App\Contracts\BlogPageApiControllerInterface;

class BlogPageApiControllerInterfaceTest extends TestCase
{
    protected string $namespace = BlogPageApiControllerInterface::class ;    public function test_is_exist():void {
        $isExist = interface_exists($this->namespace);
        $this->assertTrue($isExist,"missing $this->namespace interface !!");
    }
    public function test_no_extend_interface():void {
        $extends = class_implements($this->namespace);
        $this->assertEmpty($extends,"$this->namespace interface should is never extend any interface ");
    }
}
