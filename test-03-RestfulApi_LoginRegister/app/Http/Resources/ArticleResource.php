<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        // WE CAN MODIFICATION WITH FUNCTION with()
        return [
            'title' => $this->title,
            'body' => $this->body,
            // 'created_at' => $this->created_at->format("d F Y") //For Day Month Year
            'created_at' => $this->created_at->diffForHumans(), // Better from above
            'subject' => $this->subject->name,
            'author' => $this->user->name
        ];
    }

    public function with($request)
    {
        return ['status' => 'Success'];
    }
}
