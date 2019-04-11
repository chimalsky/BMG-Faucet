<?php

namespace App;

use App\Service;
use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{
    protected $fillable = [
        'airtable_id'
    ];

    public function services()
    {
        return $this->belongsToMany('App\Service', 'service_taxonomy', 'taxonomy_id', 'service_id')
            ->withTimestamps();
    }

    public function children()
    {
        return $this->belongsToMany('App\Taxonomy', 'taxonomy_taxonomy', 'parent_id', 'child_id')
            ->withTimestamps();
    }

    public function parents()
    {
        return $this->belongsToMany('App\Taxonomy', 'taxonomy_taxonomy', 'child_id', 'parent_id')
            ->withTimestamps();
    }

    public function getServiceLineageAttribute()
    {
        $services = $this->services;

        $childrenServices = $this->children()->with('services')->get()->map(function($taxonomy) {
            return $taxonomy->services;
        });

        $childrenServices = $childrenServices->reduce(function($carry, $childServices) {
            return $carry->merge($childServices);
        }, collect());

        return $childrenServices->merge($services);
    }

}
