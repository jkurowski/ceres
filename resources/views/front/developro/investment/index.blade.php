@extends('layouts.page', ['body_class' => 'homepage'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)
@section('seo_robots', $page->meta_robots)

@section('content')
    @include('layouts.partials.page-header', ['h1' => 'Oferta', 'pageDesc' => $page->title_text, 'header' => asset('img/pageheader.jpg')])

    <section class="offer-search p-0">
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

    <section>
        <div class="container">

            <div class="row">
                @foreach ($current_investment as $p)

                    @php
                        if($p->id == 1) {
                            $url = 'https://www.sosnowy-jablonna.pl';
                            $target = '_blank';
                        } else {
                            $url = route('developro.show', $p->slug);
                            $target = '_self';
                        }
                    @endphp

                <div class="col-6">
                    <div class="invest-list-item radius-8">
                        <span class="invest-list-status">W SPRZEDAŻY</span>
                        <a href="{{ $url }}" target="{{ $target }}">
                            <img src="{{ asset('investment/thumbs/' . $p->file_thumb) }}" alt="" class="radius-8" width="840" height="640">
                        </a>
                        <div class="invest-list-apla">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <div>
                                        <h2><a href="{{ $url  }}" target="{{ $target }}">{{ $p->name }}</a></h2>
                                        <a href="{{ $url }}" class="bttn bttn-arrow bttn-sm bttn-gold d-inline-flex" target="{{ $target }}">Zobacz inwestycje <img src="{{ asset('img/svg/right-arrow.svg') }}" alt="" width="23" height="24"></a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6 pb-3">
                                            <div class="d-inline-flex align-items-center invest-list-label">
                                                <img src="{{ asset('img/svg/marker.svg') }}" alt="" width="27" height="27">

                                                <div>
                                                    <div class="small text-uppercase">{{ $p->inv_city }}</div>
                                                    <div class="fw-bold">{{ $p->inv_street }} {{ $p->inv_property_number }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        @if($p->date_start)
                                        <div class="col-6 pb-3">
                                            <div class="d-inline-flex align-items-center invest-list-label">
                                                <img src="{{ asset('img/svg/calendar.svg') }}" alt="" width="27" height="27">

                                                <div>
                                                    <div class="small text-uppercase">TERMIN ODDANIA:</div>
                                                    <div class="fw-bold">{{ $p->date_start }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-6">
                                            <div class="d-inline-flex align-items-center invest-list-label">
                                                <img src="{{ asset('img/svg/area.svg') }}" alt="" width="27" height="27">

                                                <div>
                                                    <div class="small text-uppercase">ZAKRES METRAŻU:</div>
                                                    <div class="fw-bold">31 - 80 m<sup>2</sup></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="d-inline-flex align-items-center invest-list-label">
                                                <img src="{{ asset('img/svg/price.svg') }}" alt="" width="27" height="27">

                                                <div>
                                                    <div class="small text-uppercase">CENY OD:</div>
                                                    <div class="fw-bold">805.516,00 zł</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
