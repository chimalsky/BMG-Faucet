<?php

namespace App\Jobs;

use App\Organization;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class OrganizationSync extends AirtableSync
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
        $records = $this->fetchAirtable('organizations'); 
        $records->each(function($record) {
            $this->persist($record);
        });
    }

    public function persist($record)
    {
        $organization = Organization::firstOrNew(['airtable_id' => $record->id]);
        $fields = $record->fields;

        $organization->airtable_id = $record->id;
        $organization->name = $fields->name ?? null;
        $organization->alternate_name = $fields->alternate_name ?? null;
        $organization->x_uid = $fields->x_uid ?? null;
        $organization->description = $fields->description ?? null;
        $organization->email = $fields->email ?? null;
        $organization->url = $fields->url ?? null;
        $organization->legal_status = $fields->legal_status ?? null;
        $organization->tax_status = $fields->tax_status ?? null;
        $organization->tax_id = $fields->tax_id ?? null;
        $organization->year_incorporated = $fields->year_incorporated ?? null;

        //$organization->details = $fields->details ?? null;
        $organization->flag = $fields->flag ?? null;

        $organization->save();          
    }
}
