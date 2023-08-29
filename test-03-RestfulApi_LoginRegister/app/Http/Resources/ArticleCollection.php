<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleCollection extends ResourceCollection
{

    public function toArray(Request $request): array
    {
        // WE CAN'T MODIFICATION LIKE ArticleResource
        return [
            'data' => $this->collection,
            'status' => 'Success'
        ];
    }

}
