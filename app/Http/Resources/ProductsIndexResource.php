<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class ProductsIndexResource extends ResourceCollection
{
    public function toArray(Request $request)
    {
        return [
            'pagina_atual' => $this->resource->currentPage(),
            'total_paginas' => $this->resource->lastPage(),
            'total_registros' => $this->resource->total(),
            'registros_por_pagina' =>  count($this->resource->items()),
            'registros' => $this->collection
        ];
        
    }
}
