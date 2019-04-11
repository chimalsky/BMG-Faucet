<article>
    <header>
        <main class="cell">
            <p>
                <strong>
                    {{ $service->name }}
                </strong>
            </p>
        </main>

        @isset ($service->url)
            <a href="{{ $service->url }}" target="_blank"> 
                Website
            </a>
        @endisset
    </header>

    <p>
        {{ $service->description }}
    </p>

    <footer class="grid-x">
        <p class="cell text-right">
            Provided by: 
            <a href="{{ route('organization.show', $service->organization->id) }}">
                {{ $service->organization->name }}
            </a>
        </p>
    </footer>
</article> 