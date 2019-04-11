@extends ('layouts.web')

@section ('header')
<div class="grid-x grid-margin-x grid-margin-y text-center align-center">
    <h1 class="cell">
        {{ $organization->name }}

        @isset ($organization->alt_name)
            also known as: {{ $organization->alt_name }}
        @endisset
    </h1>

    @isset ($organization->url)
        <a href="{{ $organization->url }}" class="cell shrink">
            {{ $organization->url }}
        </a>
    @endisset

    @isset ($organization->email)
        <a href="mailto:{{ $organization->email }}" class="cell shrink">
            {{ $organization->email }}
        </a>
    @endisset
</div>
@endsection

@section ('content')
<header>
    <p>
        {{ $organization->description }}
    </p>
</header>

<section>
    <h2>
        Services provided:
    </h2>

    @foreach ($organization->services as $service)
        @include('service.item', ['service' => $service])
    @endforeach

</section>
@endsection