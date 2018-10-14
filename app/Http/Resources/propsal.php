<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class propsal extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
                    'id'                =>  $this->id,
                    'propsal_type'      =>  $this->propsal_type,
                    'client_source'     =>  $this->client_source,
                    'client_name'       =>  $this->client_name,
                    'propsal_date'      =>  $this->propsal_date,
                    'propsal_value'     =>  $this->propsal_value,
                    'code_criteria'     =>  $this->code_criteria,
                    'created_by'        =>  $this->created_by,
                    'approved_by'       =>  $this->approved_by,              

                ];
    }
}
