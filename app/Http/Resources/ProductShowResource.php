<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class ProductShowResource extends ResourceCollection
{
    public function toArray(Request $request)
    {
        return [
            'registros' => $this->collection
        ];
        
    }
}
