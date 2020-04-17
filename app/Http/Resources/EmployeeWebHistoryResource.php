<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class EmployeeWebHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    { 
        return[
            'id' => $this->id,
            'empIpAddress' => $this->ip_address,
            'urls' => EmployeeWebHistoryUrlsResouce::collection($this->urls),
        ];
    }
}
