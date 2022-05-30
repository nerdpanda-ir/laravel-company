<?php

namespace Tests\Unit\App\Http\Controllers\Api\V1\BlogPageApiController\Constants;

use App\Http\Controllers\Api\V1\BlogPageApiController;
use PHPUnit\Framework\TestCase;

class ConstantsTest extends TestCase
{
    protected string $namespace = BlogPageApiController::class ;
    public function test_no_have_constants():void {
        $reflection = new \ReflectionClass($this->namespace);
        $constants = $reflection->getReflectionConstants();
        $constants = array_filter(
            $constants ,
            function (\ReflectionClassConstant $constant) {
                return $constant->getDeclaringClass()->name == $this->namespace;
            }
        );
        $constantsCount = count($constants);
        $expect = 0 ;
        $message = '';
        if ($constantsCount!=$expect)
        {
            if ($constantsCount>0)
                $constants = array_map(
                    function (\ReflectionClassConstant $constant){
                        return $constant->name;
                    },
                    $constants
                );

            $message = implode(' , ',$constants)." constants in controller $this->namespace is";
            if ($constantsCount>$expect)
                $message .= " more than expect \n";
            else
                $message .= " less than expect \n";
            $message .= "$this->namespace controller should have $expect constants but have $constantsCount constants";
        }
        $this->assertEquals($expect,$constantsCount,$message);
    }
}
