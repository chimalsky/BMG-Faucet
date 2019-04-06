@extends('layouts.web')

@section('header')
<h1> 
    {{ $taxonomy->taxonomy_name }}
</h1>
@endsection
    
@section('content')

<section>



@foreach($services as $service)
    @include('service.detail', ['service' => $service])
@endforeach

@foreach($childrenTaxonomies as $child) 
    {{ $child }}
@endforeach

</section>

@endsection