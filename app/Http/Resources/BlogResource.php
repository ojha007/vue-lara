<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'content' => $this->content,
            'summary' => $this->summary,
            'publish_on'=>$this->publish_on,
            'image'=>$this->featured_image,
            'language'=>$this->lang
        ];
    }
}
