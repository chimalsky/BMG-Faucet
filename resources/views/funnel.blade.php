@extends('layouts.web')

@section('header')
<section class="">
    <h1>
        Information on social services is hard to find.
    </h1>
</section>
@endsection

@section('content')
<main class="grid-x grid-margin-y ">

<section class="grid-x cell medium-9 large-8">
    <h2 class="cell">
        Let's change that.
        <br/>
        Let's improve accessibility, availability, 
        and awareness of community
        social services 
        so that the right people find the right help at 
        the right time.
    </h2>

    <h2 class="cell">
        This information is currently scattered across the 
        web and physical world.

        The disparite websites and 
        Facebook groups make it difficult for people 
        to find the information they're already looking for.

    </h2>

    <h2 class="cell">
        And often they don't know what they're looking for, mainly 
        because they aren't aware of what's available.
    </h2>
</section>

<section class="grid-x cell medium-9 large-8">
    <p class="cell">
        <strong>Unify all the information!</strong>
    </p>

    <p class="cell">
        Or at least as much of it as we can.
        <br/>
        People at The City of Bloomington have started maintaining an 
        <a href="https://airtable.com/shrSjfZ5Pa1QbKkyF/tblMNUl0wmGjqIJoq/viwNDz634raOtOTKI?blocks=hide">Airtable</a> 
        of information related to social services and local organizations.
        They've said that it's a great solution for themselves, however the Airtable 
        itself is not a solution for community members who require the services.
    </p>

    <p class="cell">
        Our goal in working with BMG Civic Hack and The City of Bloomington, is to 
        take the existing and growing reservoir of social services information, and 
        craft it into something:
    </p>

    <ul>
        <li>
            Accessible on any device and interaction
        </li>

        <li>
            Easily Navigable
        </li>

        <li>
            Searchable
        </li>

        <li>
            Shareable
        </li>
    </ul>

    <p class="cell">
        <strong>Accessible</strong> means more than just mobile-friendly. 
        It means clean HTML that allows the visually impaired to navigate using 
        their screenreaders. It means printable webpages -- that don't look like trash --
        to allow those using a public computer to take their information on the go.
    </p>

    <p class="cell">
        <strong>Navigable</strong> so that those who already know what they're looking for 
        can find it right away.
    </p>

    <p class="cell">
        <strong>Searchable</strong> suggest relevant services to those who
        might not already know the specific services provided.
    </p>

    <p class="cell">
        <strong>Shareable</strong> make it easy to make a <i>collection</i> 
        of services and share with someone in your life.
    </p>
</section>

<section class="grid-x cell medium-9 large-8">
    <p class="cell">
        <strong> 
            Where we are at currently:
        </strong>
    </p>

    <p class="cell">
        Based on our interviews we have mocked up designs. To 
        make these designs a reality, we've started on a Laravel (PHP) 
        OpenReferral Boilerplate that syncs with the City's Airtable,
        and pulls it into a database.
    </p>

    <p class="cell">
        <strong> 
            Next steps:
        </strong>
    </p>

    <p class="cell">
        Using the synced data, create UIs based on our design and then 
        begin a second round of discovery where we test it out with 
        the people at the City.
    </p>

</section>

<section class="grid-x grid-margin-x cell large-8">
    <a href="https://github.com/chimalsky/BMG-Faucet" class="cell shrink">
        Github 
    </a>

    <a href="https://www.meetup.com/Code-for-Bloomington-BMG-Hack/" class="cell shrink">
        BMG (Bloomington) Civic Hack Brigade
    </a>
</section>

</main>
@endsection