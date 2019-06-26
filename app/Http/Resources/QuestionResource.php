<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'url' => $this->url,
            'title' => $this->title,
            'body' => $this->body,
            'category' => [
                'title' => $this->category->title,
            ],
            'user' => [
                'name' => $this->user->name,
                'email' => $this->user->email,
            ]
        ];
    }
}
