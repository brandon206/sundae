<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Contact extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // enter in exactly what you want to return to your api
        // can manipulate anything you want in the request here as well
        // this is going to be that layer between your API data and your backend data
        return [
            'contact_id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'birthday' => $this->birthday->format('m/d/Y'),
            'company' => $this->company,
            // diffForHumans is a Carbon method that basically shows a human friendly time
            'last_updated' => $this->updated_at->diffForHumans(),
        ];
        return parent::toArray($request);
    }
}
