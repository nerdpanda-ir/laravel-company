<?php namespace App\Contracts ; ?>
<?php

use Illuminate\Contracts\View\View;

interface HasInvokeViewableContract {
    function __invoke():View ;
}
