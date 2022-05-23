<?php

namespace Tests\Unit\HasNamespaceGetterTraitTest;

use PHPUnit\Framework\TestCase;
use App\Traits\HasNamespaceGetterTrait;

class MethodsTest extends TestCase
{
    protected string $namespace = HasNamespaceGetterTrait::class;
}
