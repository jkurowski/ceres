@extends('layouts.page', ['body_class' => 'homepage'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)
@section('seo_robots', $page->meta_robots)

@section('content')
    @include('layouts.partials.page-header', ['h1' => 'Oferta', 'pageDesc' => $page->title_text, 'header' => asset('img/pageheader.jpg'), 'class' => 'sm'])

    <!-- Search form -->
    <section class="offer-search d-none">
        <div class="container">
            <form action="{{ route('developro.index') }}" method="get">
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

    <section>
        <div class="container">
            <div class="row">
                @foreach ($current_investment as $p)
                    <x-investment-card :p="$p" />
                @endforeach
            </div>
        </div>
    </section>
@endsection
