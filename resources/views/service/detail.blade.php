<article>
    <header>
        <h1>
            {{ $service->name }}
        </h1>

        @isset ($service->url)
            <a href="{{ $service->url }}" target="_blank"> 
                Website
            </a>
        @endisset

        {{ $service->organization }}
    </header>

    <p>
        {{ $service->description }}
    </p>

    {{ $service->organization }}
</article> 