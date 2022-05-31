<?php

namespace Tests\Unit\App\Contracts\HasInvokeJsonResourceableContract\Methods\Invoke;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasInvokeJsonResourceableContract;

class InvokeTest extends TestCase
{
    protected string $namespace = HasInvokeJsonResourceableContract::class ;
    protected string $method = '__invoke';
    public function test_is_exist():void {
        $isExist = method_exists($this->namespace,$this->method);
        $this->assertTrue($isExist,"missing $this->method() in  $this->namespace controller");
    }
    public function test_dont_be_static():void {
        $reflection = new \ReflectionMethod($this->namespace , $this->method);
        $isNotStatic = !$reflection->isStatic();
        $this->assertTrue($isNotStatic,"$this->method() method in $this->namespace controller dont be static !!!");
    }

}
