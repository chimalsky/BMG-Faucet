<?php

namespace App\Jobs;

use App\Taxonomy;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TaxonomySync extends AirtableSync
{

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $records = $this->fetchAirtable('taxonomy'); 
        $records->each(function($record) {
            $this->persist($record);
        });
    }

    protected function persist($record)
    {
        $taxonomy = Taxonomy::firstOrNew(['airtable_id' => $record->id]);
        $fields = $record->fields;
            
        $taxonomy->airtable_id = $record->id;
        $taxonomy->name = $fields->name ?? null;
        $taxonomy->vocabulary = $fields->vocabulary ?? null;
        $taxonomy->x_description = $fields->x_description ?? null;
        $taxonomy->x_notes = $fields->x_notes ?? null;
        $taxonomy->flag = $fields->flag ?? null;

        $taxonomy->save();

        if (key_exists('parent_name', $fields)) {
            $recordId = $fields->parent_name;
            $parent = Taxonomy::firstOrNew(['airtable_id' => $recordId]);
            $parent->save();

            if ($taxonomy->parents()->where('parent_id', $parent->id)->exists()) {
                return;
            } 

            $taxonomy->parents()->attach($parent);
        }
    }
}
