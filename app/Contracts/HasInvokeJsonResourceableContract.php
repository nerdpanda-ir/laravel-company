<?php namespace App\Contracts; ?>
<?php

use Illuminate\Http\Resources\Json\JsonResource;

interface HasInvokeJsonResourceableContract {
    function __invoke():JsonResource;
}
