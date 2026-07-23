@props([
    'class' => null,
])

<div id="submenu" class="{{ $class }}">
    <nav>
        <ul class="mb-0 list-unstyled d-flex justify-content-center">
            <li class="{{ Route::is('developro.show') ? 'active' : '' }}"><a href="{{ route('developro.show', $investment->slug) }}">Opis inwestycji</a></li>
            <li class="{{ Route::is(['developro.plan','developro.building','developro.building.floor','developro.building.floor.property']) ? 'active' : '' }}"><a href="{{ route('developro.plan', $investment->slug) }}">Plan inwestycji</a></li>
            <li><a href="{{ route('developro.show', $investment->slug) }}#contact-form">Kontakt</a></li>
        </ul>
    </nav>
</div>
