<div id="submenu">
    <nav>
        <ul class="mb-0 list-unstyled d-flex justify-content-center gap-5">
            <li><a href="{{ route('developro.show', $investment->slug) }}">Opis inwestycji</a></li>
            <li><a href="{{ route('developro.plan', $investment->slug) }}">Plan inwestycji</a></li>
            <li><a href="{{ route('developro.show', $investment->slug) }}">Lokalizacja</a></li>
            <li><a href="{{ route('developro.show', $investment->slug) }}">Kontakt</a></li>
        </ul>
    </nav>
</div>
