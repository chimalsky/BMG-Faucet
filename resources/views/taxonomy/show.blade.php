@extends('layouts.web')

@section('header')
<div class="grid-x grid-margin-y align-center text-center">
    <h1 class="cell"> 
        {{ $taxonomy->name  }} Resources
    </h1>
</div>
@endsection
    
@section('content')

<section class="grid-x align-center">

<main class="cell large-9 grid-x grid-padding-y grid-margin-y">
    @foreach($services as $service)
        <div class="cell">
            @include('service.item', ['service' => $service])
        </div>
    @endforeach
</main>

</section>

@endsection