<?php

namespace App\Jobs;

use App\Detail;
use App\Service;
use App\Taxonomy;
use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
//use App\Functions\AirtableFill;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ServiceSync extends AirtableSync 
{

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $records = $this->fetchAirtable('services'); 
        $records->each(function($record) {
            $this->persist($record);
        });

        
        /* [
            'locations',
            'organization',
            'address',
            'taxonomy',
        ]); */

        return;


            if ($organizations = count($field->organization)) {
                foreach ($organizations as $orgFields) {
                    $organization = new Organization;

                    $organization->airtable_id = $orgFields->id;
                    $organization->name = $orgFields->name ?? null;
                    $organization->alternate_name = $orgFields->alternate_name ?? null;
                    $organization->x_uid = $orgFields->x_uid ?? null;
                    $organization->description = $orgFields->description ?? null;
                    $organization->email = $orgFields->email ?? null;
                    $organization->url = $orgFields->url ?? null;
                    $organization->legal_status = $orgFields->legal_status ?? null;
                    $organization->tax_status = $orgFields->tax_status ?? null;
                    $organization->tax_id = $orgFields->tax_id ?? null;
                    $organization->year_incorporated = $orgFields->year_incorporated ?? null;

                    $organization->details = $orgFields->details ?? null;
                    $organization->flag = $orgFields->flag ?? null;

                    $organization->save();

                    $service->organizations()->save($organization);
                }
            }
    }

    protected function persist($record)
    {
        $fields = $record->fields;

        $service = Service::firstOrNew(['airtable_id' => $record->id]);
            
        $service->airtable_id = $record->id;
        $service->name = $fields->name ?? null;
        $service->alternate_name = $fields->alternate_name ?? null;
        $service->email = $fields->email ?? null;
        $service->description = $fields->description ?? null;
        $service->status = $fields->status ?? null;
        $service->url = $fields->url ?? null;
        $service->application_process = $fields->application_process ?? null;
        $service->wait_time = $fields->wait_time ?? null;
        $service->accreditations = $fields->accreditations ?? null;
        $service->licenses = $fields->licenses ?? null;
        $service->metadata = $fields->metadata ?? null;
        $service->flag = $fields->flag ?? null; 

        $service->save();


        if (key_exists('taxonomy', $fields) && count($fields->taxonomy)) {
            foreach ($fields->taxonomy as $recordId) {
                $taxonomy = Taxonomy::firstOrNew(['airtable_id' => $recordId]);
                $taxonomy->save();

                if ($service->taxonomies()->where('taxonomy_id', $taxonomy->id)->exists()) {
                    continue;
                } 

                $service->taxonomies()->attach($taxonomy);
            }
        }

        if (key_exists('details', $fields) && count($fields->details)) {
            foreach ($fields->details as $recordId) {
                $detail = Detail::firstOrNew(['airtable_id' => $recordId]);
                $detail->save();

                if ($service->details()->where('detail_id', $detail->id)->exists()) {
                    continue;
                }

                $service->details()->attach($detail);
            }
        }

        if (key_exists('organization', $fields) && count($fields->organization)) {
            foreach ($fields->organization as $recordId) {
                $organization = Organization::firstOrNew(['airtable_id' => $recordId]);
                $organization->save();
                
                if ($service->organizations()->where('organization_id', $organization->id)
                    ->where('service_id', $service->id)
                    ->exists()) {
                    continue;
                }

                $service->organizations()->attach($organization);
            }
        }

        if (key_exists('address', $fields) && count($fields->address)) {
            foreach ($fields->address as $recordId) {
                $address = Address::firstOrNew(['airtable_id' => $recordId]);
                $address->save();
                
                if ($address->services()->where('address_id', $address->id)
                    ->where('service_id', $service->id)
                    ->exists()) {
                    continue;
                }

                $service->organizations()->attach($organization);
            }
        }
    }
}
