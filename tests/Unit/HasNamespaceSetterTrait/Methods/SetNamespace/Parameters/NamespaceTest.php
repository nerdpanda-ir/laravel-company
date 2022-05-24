<?php

namespace Tests\Unit\HasNamespaceSetterTrait\Methods\SetNamespace\Parameters;
use PHPUnit\Framework\TestCase;
use App\Traits\HasNamespaceSetterTrait;

class NamespaceTest extends TestCase
{
    protected string $namespace = HasNamespaceSetterTrait::class ;
    protected string $method = 'setNamespace';
    protected string $parameter = 'namespace';
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
}
