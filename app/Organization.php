<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'airtable_id'
    ];
    
    public function services()
    {
        return $this->belongsToMany('App\Service', 'organization_service', 'organization_id', 'service_id')
            ->withTimestamps();
    }
}
