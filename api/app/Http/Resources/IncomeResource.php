<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IncomeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'user' => $this->user->only([
                'name',
                'email',
            ]),
            'description' => $this->description,
            'owner' => $this->owner,
            'amount' => $this->amount,
            'date' => $this->date->format('jS F, Y'),
            'created_at' => $this->created_at->format('jS F, Y'),
            'updated_at' => $this->updated_at->format('jS F, Y'),
        ];
    }
}