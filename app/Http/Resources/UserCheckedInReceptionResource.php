<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserCheckedInReceptionResource extends JsonResource
{

       /**
     * @var
     */
    private $gym;

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource, $gym)
    {
        // Ensure you call the parent constructor
        parent::__construct($resource);
        $this->resource = $resource;
        $this->gym = $gym;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
              'status' => 'OK',
              'object_name' => $this->gym->name,
              'first_name' => $this->resource->name,
              'last_name' => $this->resource->last_name,
        ];
    }
}
