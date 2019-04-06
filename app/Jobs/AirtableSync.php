<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use TANIOS\Airtable\Airtable as AirtableClient;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class AirtableSync implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


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
        
    }

    /**
     *  Fetch an Airtable. 
     * 
     *  @param  string  $tableName
     *  @params  array | bool  $params
     *  @params  array | bool  $relations
     */
    protected function fetchAirtable($tableName, $params = false, $relations = false)
    {
        $apiClient = new AirtableClient([
            'api_key' => env('AIRTABLE_KEY'),
            'base'    => env('AIRTABLE_BASE')
        ]);

        $request = $apiClient->getContent( $tableName, $params, $relations );

        $responses = collect();
        
        do {
            $response = $request->getResponse();
            $responses = $responses->merge($response['records']);
        }
        while( $request = $response->next() );

        return $responses;
    }
}
