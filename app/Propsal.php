<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propsal extends Model
{
    //
    protected $fillable = [
        'propsal_type',
        'type_alias',
        'client_source',
        'source_alias',
        'propsal_number',
        'client_name',
        'propsal_date',
        'propsal_value',
        'created_by',
        'approved_by',
        'code_criteria',
    ];
    public function created_by()
    {
    	return $this->hasOne('App\User','id','created_by');
    }
    public function approved_by()
    {
    	return $this->hasOne('App\User','id','approved_by');
    }

}
