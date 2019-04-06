<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{    
    protected $fillable = [
        'airtable_id'
    ];

    public function addresses()
    {
        return $this->belongsToMany('App\Address', )
    }
    
    public function taxonomies()
    {
        return $this->belongsToMany('App\Taxonomy', 'service_taxonomy', 'service_id', 'taxonomy_id')
            ->withTimestamps();
    }

    public function organizations()
    {
        return $this->belongsToMany('App\Organization', 'organization_service', 'service_id', 'organization_id')
            ->withTimestamps();
    }

    public function locations()
    {
        return $this->belongsToMany('App\Location', 'location_service', 'service_id', 'location_id')
            ->withTimestamps();
    }

    public function details()
    {
        return $this->belongsToMany('App\Detail', 'detail_service', 'service_id', 'detail_id')
            ->withTimestamps();
    }

    public function schedules()
    {
        return $this->belongsToMany('App\Schedule', 'schedule_service', 'service_id', 'schedule_id')
            ->withTimestamps();
    }

    public function getOrganizationAttribute()
    {
        return $this->organizations()->first();
    }
}
