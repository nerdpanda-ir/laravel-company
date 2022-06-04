<?php

namespace App\Contracts;

use Illuminate\Http\Resources\Json\JsonResource;

interface HasIndexJsonResourceableContract {
    function index():JsonResource;
}
