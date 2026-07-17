@extends('layouts.page', ['body_class' => 'homepage'])

@section('meta_title', $page->title)
@section('seo_title',$page->meta_title)
@section('seo_description', $page->meta_description)
@section('seo_robots', $page->meta_robots)

@section('content')
    <main class="page-{{ $uri }}">

        @include('layouts.partials.page-header', ['h1' => $page->title, 'desc' => $page->title_text,  'header' => asset('img/pageheader.jpg')])

        <section>
            <div class="container">
                <div class="row section-header">
                    <div class="col-12 col-xl-5 d-flex align-items-center mb-4 mb-lg-0">
                        <div class="section-header-content pe-xl-5">
                            <h2><img src="{{ asset('img/square-point.svg') }}" alt="">Poznaj nas</h2>
                            <h3>Kredyty <span>hipoteczne</span></h3>
                            <p>Zakup mieszkania, budowa domu, remont czy rozwój firmy często wymagają odpowiedniego finansowania. Dlatego współpracujemy z doświadczonym ekspertem finansowym, który pomaga naszym klientom znaleźć najkorzystniejsze rozwiązania kredytowe dopasowane do ich indywidualnej sytuacji.</p>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 mt-3 mt-lg-5 mt-xl-0">
                        <div class="img-with-label position-relative">
                            <img src="{{ asset('img/kredyty-1.jpg') }}" alt="" class="radius-8" width="960" height="600">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="p-0">
            <div class="container">
                <div class="row section-header">
                    <div class="col-12 col-xl-5 order-1 order-xl-2 d-flex align-items-center mb-4 mb-lg-0">
                        <div class="section-header-content ps-xl-5">
                            <h2><img src="{{ asset('img/square-point.svg') }}" alt="">Poznaj nas</h2>
                            <h3>Nasz <span>ekspert finansowy</span></h3>
                            <p><b>Mariusz Piotrowski</b> od wielu lat specjalizuje się w doradztwie kredytowym. Posiada wieloletnie doświadczenie zdobyte w sektorze bankowym, między innymi w Citibanku, Fortis Banku oraz BNP Paribas.</p>
                            <p>Od lat pomaga klientom w uzyskaniu finansowania na zakup nieruchomości, budowę domu, rozwój działalności gospodarczej oraz konsolidację zobowiązań.</p>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 order-2 order-xl-1 mt-3 mt-lg-5 mt-xl-0">
                        <div class="img-with-label position-relative">
                            <img src="{{ asset('img/kredyty-2.jpg') }}" alt="" class="radius-8" width="960" height="600">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-0">
            <div class="container">
                <div class="row m-0">
                    <div class="col-12">
                        <div class="row contact-data-row justify-content-center">
                            <div class="col-12 col-md-6 col-xl-4 p-0 pb-3 pb-md-5 pb-xl-0">
                                <div class="contact-data text-center">
                                <span class="contact-data-icon">
                                    <img src="{{ asset('img/icons/mapmarker.png') }}" alt="" width="120" height="120">
                                </span>
                                    <p>ul. Kartuska 278, 80-125 Gdańsk</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-4 p-0 pb-3 pb-md-0">
                                <div class="contact-data text-center">
                                <span class="contact-data-icon">
                                    <img src="{{ asset('img/icons/phone.png') }}" alt="" width="120" height="120">
                                </span>
                                    <p><a href="tel:+48795470915">+48 795 470 915</a></p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-4 p-0">
                                <div class="contact-data text-center border-0">
                                <span class="contact-data-icon">
                                    <img src="{{ asset('img/icons/email.png') }}" alt="" width="120" height="120">
                                </span>
                                    <p><a href="mailto:mariusz@piotrowskifinanse.pl">mariusz@piotrowskifinanse.pl</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
