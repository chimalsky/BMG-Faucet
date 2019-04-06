@extends('layouts.web')
    
@section('content')
<section class="grid-x grid-margin-x">

@foreach ($taxonomies as $taxonomy)
    <a class="cell small-6 medium-4 callout" href="{{ route('taxonomy.show', $taxonomy->id) }}">
        {{ $taxonomy->name }}
    </a>
@endforeach

</section>
@endsection
