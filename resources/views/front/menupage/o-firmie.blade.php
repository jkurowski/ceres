@extends('layouts.page', ['body_class' => 'homepage'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)
@section('seo_robots', $page->meta_robots)

@section('content')
    <main class="with-bigger-section-spacing">

        @include('layouts.partials.page-header', [
            'h1' => $page->title,
            'desc' => $page->title_text,
            'header' => 'img/pageheader.jpg'
        ])


        <section>
            <div class="container">
                <div class="row section-header">
                    <div class="col-12 col-xl-5 d-flex align-items-center mb-4 mb-lg-0">
                        <div class="section-header-content pe-xl-5">
                            <h2><img src="{{ asset('img/square-point.svg') }}" alt="">Poznaj nas</h2>
                            <h3>Budujemy więcej niż mieszkania. <br><span>Tworzymy miejsca do życia.</span></h3>
                            <p>Od lat realizujemy kameralne inwestycje mieszkaniowe, stawiając na ponadczasową architekturę, wysoką jakość wykonania oraz komfort przyszłych mieszkańców.</p>
                            <a href="{{ route('developro.index') }}" class="bttn bttn-sm bttn-brown d-inline-flex bttn-arrow mt-3 mt-xl-5">Poznaj nasze inwestycje<img src="{{ asset('img/svg/right-arrow.svg') }}" alt="" width="33" height="35"></a>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 mt-3 mt-lg-5 mt-xl-0">
                        <div class="img-with-label position-relative">
                            <img src="{{ asset('img/firma-1.jpg') }}" alt="" class="radius-8" width="960" height="700">
                            <div class="img-label">
                                <p>Od ponad <strong>15</strong> lat realizujemy inwestycje mieszkaniowe.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-0">
            <div class="container">
                <div class="row section-header">
                    <div class="col-12 col-xl-6 order-1 order-xl-2 mb-4 mb-lg-0">
                        <div class="section-header-content ps-xl-5">
                            <h2><img src="{{ asset('img/square-point.svg')}}" alt="">Poznaj nas</h2>
                            <h3>Tworzymy inwestycje, <br><span>które zostają na lata.</span></h3>
                            <p>Każda inwestycja powstaje z myślą o ludziach, którzy będą w niej mieszkać przez wiele lat. Dlatego przykładamy ogromną wagę do funkcjonalnych układów mieszkań, jakości wykonania oraz estetyki części wspólnych.</p>
                            <p>&nbsp;</p>
                            <p>Nie budujemy masowo. Skupiamy się na kameralnych projektach, dzięki czemu możemy kontrolować każdy etap realizacji i zachować wysoki standard.</p>
                            <div class="row">
                                <div class="col-6">
                                    <div class="section-feature">
                                        <h3>Sprawdzone rozwiązania</h3>
                                        <p>Korzystamy wyłącznie z materiałów oraz technologii, którym ufamy.</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="section-feature">
                                        <h3>Indywidualne podejście </h3>
                                        <p>Każdy klient jest dla nas partnerem na każdym etapie zakupu mieszkania. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6 order-2 order-xl-1 mt-3 mt-lg-5 mt-xl-0">
                        <div class="img-with-label position-relative">
                            <img src="{{ asset('img/firma-2.jpg') }}" alt="" class="radius-8" width="900" height="900">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row about-stat-row">
                            <div class="col-6 col-lg-3 p-0 mb-4 mb-md-0">
                                <div class="about-stat">
                                    <span class="about-stat-number">383+</span>
                                    <h4>Wybudowanych mieszkań</h4>
                                    <p>Komfortowe lokale przekazane właścicielom.</p>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 p-0 mb-4 mb-md-0">
                                <div class="about-stat">
                                    <span class="about-stat-number">6</span>
                                    <h4>Zrealizowanych budynków</h4>
                                    <p>Kameralne inwestycje mieszkaniowe.</p>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 p-0">
                                <div class="about-stat">
                                    <span class="about-stat-number">15+</span>
                                    <h4>Lat doświadczenia</h4>
                                    <p>Wiedza zdobywana podczas kolejnych realizacji.</p>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 p-0">
                                <div class="about-stat border-0">
                                    <span class="about-stat-number">100%</span>
                                    <h4>Ukończonych etapów</h4>
                                    <p>Wszystkie inwestycje realizowane zgodnie z planem.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="{{ route('developro.index') }}" class="bttn bttn-sm bttn-brown d-inline-flex bttn-arrow mt-5">Poznaj nasze inwestycje<img src="{{ asset('img/svg/right-arrow.svg') }}" alt="" width="33" height="35"></a>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="img-with-label position-relative">
                            <img src="{{ asset('img/firma-3.jpg') }}" alt="" width="1920" height="900" class="radius-8">
                            <div class="img-label img-label-big">
                                <p class="p-2 p-lg-4">Budujemy mieszkania, w których sami chcielibyśmy zamieszkać.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if(1 == 2)
        <section>
            <div class="container">
                <div class="row section-header">
                    <div class="col-6 d-flex align-items-center">
                        <div class="section-header-content pe-5">
                            <h2><img src="{{ asset('img/square-point.svg') }}" alt="">Historia inwestycji</h2>
                            <h3>Nasza droga.</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container ">
                <div class="row">
                    <div class="col-12">
                        <div class="history-line">
                            <div class="history-item">
                                <div class="history-icon">
                                    <img src="{{ asset('img/icons/zaufanie.png') }}" alt="" width="120" height="120">
                                </div>
                                <span>1999</span>
                                <h5>Początki</h5>
                                <p>Od ponad kilkunastu lat działamy na rynku nieruchomości, zdobywając doświadczenie i zaufanie klientów.</p>
                            </div>
                            <div class="history-item">
                                <div class="history-icon">
                                    <img src="{{ asset('img/icons/inwestycja.png') }}" alt="" width="120" height="120">
                                </div>
                                <span>1999</span>
                                <h5>Sosnowy Zakątek I</h5>
                                <p>Pierwsza inwestycja – kameralne osiedle, które zdobyło uznanie mieszkańców.</p>
                            </div>
                            <div class="history-item">
                                <div class="history-icon">
                                    <img src="{{ asset('img/icons/inwestycja.png') }}" alt="" width="120" height="120">
                                </div>
                                <span>1999</span>
                                <h5>Sosnowy Zakątek II</h5>
                                <p>Kolejny etap inwestycji z jeszcze większym naciskiem na komfort i funkcjonalność. </p>
                            </div>
                            <div class="history-item">
                                <div class="history-icon">
                                    <img src="{{ asset('img/icons/budowa.png') }}" alt="" width="120" height="120">
                                </div>
                                <span>1999</span>
                                <h5>Sprawna</h5>
                                <p>Rozwijamy kolejne osiedla, tworząc miejsca do życia dla następnych rodzin.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        <section>
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

        <!- Contact form -->
        @include('front.contact.form')
        <!- End of Contact form -->

    </main>
@endsection
