<?php

namespace App\Http\Controllers;

use App\Jobs\ServiceSync;
use App\Jobs\TaxonomySync;
use Illuminate\Http\Request;
use App\Jobs\OrganizationSync;

class AirtableSyncController extends Controller
{
    public function index() 
    {
        $this->dispatchNow(new ServiceSync());
        $this->dispatchNow(new TaxonomySync());
        $this->dispatchNow(new OrganizationSync());

    }
}
