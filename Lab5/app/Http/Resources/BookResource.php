<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
  /**
  * Transform the resource into an array.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return array
  */
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'isbn' => $this->isbn,
      'title' => $this->title,
      'description' => $this->description,
      'created_at' => (string) $this->created_at,
      'image' => $this->image,
      'updated_at' => (string) $this->updated_at,
      'user' => $this->user,
      'ratings' => $this->ratings,
      'average_rating' => $this->ratings->avg('rating')
    ];
  }
}
