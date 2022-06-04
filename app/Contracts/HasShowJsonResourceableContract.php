<?php

namespace App\Contracts;

use Illuminate\Http\Resources\Json\JsonResource;

interface HasShowJsonResourceableContract{
    public function show():JsonResource;
}
