<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->getTitle(),
            'price' => $this->getPrice(),
            'author' => $this->getAuthor()->getFirstname() . ' ' . $this->getAuthor()->getLastname(),
            'publisher' => $this->getPublisher()->getName(),
        ];
    }
}
