<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
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
            "id" => $this->id,
            "payback_date" => $this->payback_date,
            "payback_interest" => $this->payback_interest,
            "paid" => $this->paid,
            'user' => $this->user->only([
                'name',
                'email',
            ]),
            'income' => $this->income->only([
                'name',
                'owner',
                'amount',
                'date',
                'created_at',
            ]),
        ];
    }
}
