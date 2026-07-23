@extends('layouts.homepage', ['body_class' => 'homepage'])

@section('content')
    <!-- Hero -->
    <div id="hero">
        <ul class="list-unstyled mb-0">
            @foreach($slider as $s)
                <li>
                    <div class="hero-apla">
                        <div class="hero-apla-content">
                            @if($s->text)<span>{{ $s->text }}</span>@endif
                            @if($s->title)<h2>{{ $s->title }}</h2>@endif
                            @if($s->link)
                                <a href="{{ $s->link }}" class="bttn bttn-gold d-inline-flex bttn-arrow" target="{{ $s->link_target }}">
                                    {{ $s->link_button }}
                                    <img src="{{ asset('img/svg/right-arrow.svg') }}" alt="" width="33" height="35">
                                </a>
                            @endif
                        </div>
                    </div>
                    <picture>
                        <source srcset="{{ asset('uploads/slider/webp/'.pathinfo($s->file, PATHINFO_FILENAME).'.webp') }}" media="(min-width: 1901px)" type="image/webp">
                        <source srcset="{{ asset('uploads/slider/tablet/'.pathinfo($s->file, PATHINFO_FILENAME).'.webp') }}" media="(min-width: 721px)" type="image/webp">
                        <source srcset="{{ asset('uploads/slider/mobile/'.pathinfo($s->file, PATHINFO_FILENAME).'.webp') }}" media="(min-width: 501px)" type="image/webp">
                        <source srcset="{{ asset('uploads/slider/tiny/'.pathinfo($s->file, PATHINFO_FILENAME).'.webp') }}" media="(max-width: 500px)" type="image/webp">
                        <img src="{{ asset('uploads/slider/'.$s->file) }}" alt="{{ $s->file_alt }}" class="hero-img">
                    </picture>
                </li>
            @endforeach
        </ul>
    </div>
    <!-- End of Hero -->

    <main>
        @if(1 == 2)
        <!-- Search form -->
        <section class="offer-search pb-0">
            <div class="container">
                <form action="/mieszkania" method="get">
                    <input type="hidden" name="invest" value="">
                    <input type="hidden" name="rooms" value="">
                    <input type="hidden" name="area" value="">
                    <input type="hidden" name="floor" value="">
                    <input type="hidden" name="price" value="">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-lg">
                            <div class="search-field">
                                <label for="invest">Inwestycje</label>
                                <div class="dropdown mt-2">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="invest">
                                        Wszystkie
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-value="1">Inwestycja 1</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="2">Inwestycja 2</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="3">Inwestycja 3</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="search-field">
                                <label for="rooms">Liczba pokoi</label>
                                <div class="dropdown mt-2">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="rooms">
                                        Wszystkie
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-value="1">1</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="2">2</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="3">3</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg">
                            <div class="search-field">
                                <label for="area">Powierzchnia</label>
                                <div class="dropdown mt-2">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="area">
                                        Wszystkie
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-value="1">1</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="2">2</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="3">3</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg">
                            <div class="search-field">
                                <label for="floor">Piętro</label>
                                <div class="dropdown mt-2">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="floor">
                                        Wszystkie
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-value="1">1</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="2">2</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="3">3</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg">
                            <div class="search-field border-0">
                                <label for="price">Cena</label>
                                <div class="dropdown mt-2">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="price">
                                        Wszystkie
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-value="1">1</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="2">2</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="3">3</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="bttn bttn-icon bttn-brown" aria-label="Szukaj mieszkań">
                                <img src="{{ asset('img/svg/search.svg') }}" alt="" width="32" height="32">
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- End of Search form -->
        @endif

        <!-- Investment list -->
        <section class="mt-150">
            <div class="container">
                <div class="row section-header">
                    <div class="col-12">
                        <h2><img src="{{ asset('img/square-point.svg') }}" alt="">NASZA OFERTA</h2>
                    </div>
                    <div class="col-12 col-xl-6">
                        <h3>Inwestycje w sprzedaży</h3>
                    </div>
                    <div class="col-12 col-xl-6">
                        <p>Wybierz spośród naszych aktualnych inwestycji i znajdź idealne miejsce dla siebie i swojej rodziny</p>
                    </div>
                </div>
                <div class="row">
                    @foreach ($current_investment as $p)
                        <x-investment-card :p="$p" />
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End of Investment list -->

        <!-- Map -->
        <section>
            <div class="container">
                <div class="row section-header">
                    <div class="col-12">
                        <h2><img src="{{ asset('img/square-point.svg') }}" alt="">MAPA INWESTYCJI</h2>
                    </div>
                    <div class="col-12 col-xl-6">
                        <h3>Dobry adres <br><span>dla lepszego życia</span></h3>
                    </div>
                </div>
            </div>
            <div id="map"></div>
        </section>
        <!-- End of Map -->

        <!-- About -->
        <section class="pb-0 pb-sm-5 pb-xxl-0">
            <div class="container">
                <div class="row section-header">
                    <div class="col-12">
                        <h2><img src="{{ asset('img/square-point.svg') }}" alt="">O FIRMIE</h2>
                    </div>
                    <div class="col-12 col-xl-6 mb-5 mb-xl-0">
                        <h3 class="after-line">Rodzinna firma deweloperska <br><span>z doświadczeniem</span></h3>

                        <ul class="list-unstyled mb-0 features-list">
                            <li>
              <span>
                <img src="{{ asset('img/svg/family-buissness.svg') }}" alt="" width="59" height="59">
              </span>

                                <div class="content">
                                    <h3>Rodzinny deweloper</h3>
                                    <p>Kameralne budownictwo mieszkaniowe realizowane z dbałością o jakość, bezpieczeństwo i detale</p>
                                </div>
                            </li>

                            <li>
              <span>
                <img src="{{ asset('img/svg/clipboard.svg') }}" alt="" width="59" height="59">
              </span>

                                <div class="content">
                                    <h3>Bezpieczna realizacja etapami</h3>
                                    <p>Przemyślany rozwój projektów i przejrzysty proces zakupu dla klientów</p>
                                </div>
                            </li>

                            <li>
              <span>
                <img src="{{ asset('img/svg/map-marker.svg') }}" alt="" width="59" height="59">
              </span>

                                <div class="content">
                                    <h3>Sprawdzone lokalizacje</h3>
                                    <p>Inwestycje rozwijane w Jabłonnie i na warszawskiej Białołęce</p>
                                </div>
                            </li>
                        </ul>
                        <a href="{{ route('about') }}" class="bttn bttn-sm bttn-brown-outline d-inline-flex bttn-arrow mt-5">Więcej o firmie<img src="{{ asset('img/svg/right-arrow-brown.svg') }}" alt="" width="33" height="35" class="ms-5"></a>
                    </div>
                    <div class="col-12 col-xl-6">
                        <div class="row h-100">
                            <div class="col-6 col-lg-5 d-flex align-items-start align-items-sm-end">
                                <img src="{{ asset('img/rodzinna-firma-1.jpg') }}" alt="">
                            </div>
                            <div class="col-6 col-lg-7 d-flex align-items-start align-items-sm-end position-relative">
                                <img src="{{ asset('img/rodzinna-firma-2.jpg') }}" alt="" class="mb-100">
                                <div class="family-count">
                                    <div class="family-counter">
                                        <img src="{{ asset('img/svg/counter.svg') }}" alt="">383
                                    </div>
                                    <h3>zrealizowanych mieszkań</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@push('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <style>
        .leaflet-tooltip.marker-tooltip {
            background-color: #fff;
            border: 1px solid #c7a97b;
            border-radius: 4px;
            color: #000;
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            padding: 5px 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            cursor: pointer;
            font-size: 22px;
        }
        .leaflet-popup-content {
            margin: 0;
            line-height: 1;
            font-size: 26px;
            min-height: 33px;
        }
        .leaflet-popup-close-button {
            display: none !important;
            span {
                font-size: 14px;
                margin-bottom: 2px;
            }
        }
        .leaflet-popup-content-wrapper,
        .leaflet-popup-tip {
            background: none;
            color: #333;
            box-shadow: 0 0 0 rgba(0,0,0,0);
        }
        .leaflet-popup-tip-container {
            display: none;
        }
        .leaflet-tooltip-top.marker-tooltip::before {
            margin-left: -12px;
            margin-bottom: -24px;
            border: 12px solid transparent;
            border-top-color: #7c5b43;
        }
        .leaflet-tooltip-bottom.marker-tooltip::before {
            border-bottom-color: #c7a97b;
        }
        .leaflet-tooltip-left.marker-tooltip::before {
            border-left-color: #c7a97b;
        }
        .leaflet-tooltip-right.marker-tooltip::before {
            border-right-color: #c7a97b;
        }
        .leaflet-popup {
            margin-bottom: 67px;
        }
    </style>
@endpush
@push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
    <script>
        const map = L.map('map').setView([52.2297, 21.0122], 10);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        const invisibleIcon = L.divIcon({
            className: 'invisible-marker',
            html: '',
            iconSize: [50, 50],
            iconAnchor: [25, 50]
        });

        const markers = [];

        @foreach($current_investment as $p)
            @if($p->map_cords)
                @php
                    $coords = explode(',', $p->map_cords);
                    $url = ($p->id == 1) ? 'https://www.sosnowy-jablonna.pl' : route('developro.plan', $p->slug);
                    $target = ($p->id == 1) ? '_blank' : '_self';
                @endphp
                @if(count($coords) == 2)
                    const marker{{ $p->id }} = L.marker([{{ trim($coords[0]) }}, {{ trim($coords[1]) }}], {icon: invisibleIcon}).addTo(map)
                        .bindTooltip('<b>{{ $p->name }}</b>', {permanent: true, direction: 'top', className: 'marker-tooltip', interactive: true, offset: [0, -10]})
                        .bindPopup('<a href="{{ $url }}" target="{{ $target }}" class="bttn bttn-sm bttn-gold mt-3">Odwiedź inwestycję</a>');

                    marker{{ $p->id }}.on('tooltipclick', function() {
                        marker{{ $p->id }}.openPopup();
                    });

                    markers.push(marker{{ $p->id }});
                @endif
            @endif
        @endforeach

        if (markers.length > 0) {
            const group = new L.featureGroup(markers);
            map.fitBounds(group.getBounds().pad(0.1));
        }
    </script>
@endpush

        @if(1 == 2)
        <!-- Promotion -->
        <section>
            <div class="container">
                <div class="row section-header">
                    <div class="col-12">
                        <h2><img src="{{ asset('img/square-point.svg') }}" alt="">PROMOCJE</h2>
                    </div>
                    <div class="col-6">
                        <h3>Aktualne promocje</h3>
                    </div>
                    <div class="col-6">
                        <p>Być może Twoje wymarzone mieszkanie jest w super promocyjnej cenie? <br>Sprawdź to!</p>
                    </div>
                </div>
                <div class="row gap-4">
                    <div class="propety-item radius-8 p-0">
                        <a href="">
                            <div class="property-item-invest">
                                <h4>Sosnowy Zakątek</h4>
                            </div>
                            <div class="property-item-content">
                                <div class="propety-item-address">
                                    <img src="{{ asset('img/svg/property-data-location.svg') }}" alt=""> Jabłonna, koło Warszawy
                                </div>
                                <div class="property-item-thumb">
                                    <img src="https://placehold.co/600x400" alt="">
                                </div>
                                <div class="property-item-data">
                                    <ul class="list-unstyled mb-0">
                                        <li><img src="{{ asset('img/svg/property-data-area.svg') }}" alt="" width="26" height="26">POWIERZCHNIA <span>73,12 m<sup>2</sup></span></li>
                                        <li><img src="{{ asset('img/svg/property-data-rooms.svg') }}" alt="" width="26" height="26">LICZBA POKOI <span>3</span></li>
                                        <li><img src="{{ asset('img/svg/property-data-floor.svg') }}" alt="" width="26" height="26">PIĘTRO <span>1 piętro</span></li>
                                        <li><img src="{{ asset('img/svg/property-data-price.svg') }}" alt="" width="26" height="26">CENA <span class="text-green">749.000,00 zł</span></li>
                                    </ul>
                                </div>
                                <div class="property-item-footer">
                                    <h2>Mieszkanie 27</h2>
                                    <span class="bttn bttn-icon bttn-brown ms-auto"><img src="{{ asset('img/svg/right-arrow.svg') }}" alt=""></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Promotion -->
        @endif

        <!-- Contact form -->
        @include('front.contact.form', ['page_name' => 'Strona główna'])
        <!-- End of Contact form -->

    </main>
@endsection
