<?php

namespace Tests\Unit\HasNamespaceGetterTrait\Methods\Namespace;

use App\Traits\HasNamespaceGetterTrait;
use PHPUnit\Framework\TestCase;

class NamespaceMethodTest extends TestCase
{
    protected string $namespace = HasNamespaceGetterTrait::class;
    protected string $method = 'namespace';
}
