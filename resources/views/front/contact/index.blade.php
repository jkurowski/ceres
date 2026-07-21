@extends('layouts.page')

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)
@section('seo_robots', $page->meta_robots)

@section('content')
    <main>
        @include('layouts.partials.page-header', [
            'h1' => $page->title,
            'pageDesc' => $page->title_text,
            'header' => asset('img/pageheader.jpg'
        )])

        <section>
            <div class="container">
                <div class="row m-0">
                    <div class="col-12">
                        <div class="row contact-data-row">
                            <div class="col-12 col-md-6 col-xl-3 pb-3 pb-md-5 p-xl-0">
                                <div class="contact-data text-center">
                                <span class="contact-data-icon">
                                    <img src="{{ asset('img/icons/mapmarker.png') }}" alt="" width="120" height="120">
                                </span>
                                    <p>ul. Marmurowa 30 lok. 54</p>
                                    <p>05-110 Jabłonna</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 pb-3 pb-md-5 p-xl-0">
                                <div class="contact-data text-center">
                                <span class="contact-data-icon">
                                    <img src="{{ asset('img/icons/phone.png') }}" alt="" width="120" height="120">
                                </span>
                                    <p><a href="">+48 602 293 025</a></p>
                                    <p><a href="">+48 600 897 075</a></p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 pb-3 p-md-0">
                                <div class="contact-data text-center">
                                <span class="contact-data-icon">
                                    <img src="{{ asset('img/icons/email.png') }}" alt="" width="120" height="120">
                                </span>
                                    <p><a href="mailto:sprzedaz@ceresdevelopment.pl">sprzedaz@ceresdevelopment.pl</a></p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 p-0">
                                <div class="contact-data border-0 text-center">
                                <span class="contact-data-icon">
                                    <img src="{{ asset('img/icons/clock.png') }}" alt="" width="120" height="120">
                                </span>
                                    <p>Poniedziałek – Piątek: 8:30 – 18:00</p>
                                    <p>Sobota: po wcześniejszym umówieniu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('front.contact.form', ['page_name' => $page->title])

        <section id="" class="p-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-header page-header-brown">
                            <div class="page-heager-content">
                                <h2>Budujemy miejsca, w których chce się żyć każdego dnia.</h2>
                            </div>

                            <img src="{{ asset('img/kontakt.jpg') }}" alt="" width="1920" height="400">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                        <div class="row section-header pb-3 pb-sm-5">
                            <div class="col-12">
                                <h2><img src="{{ asset('img/square-point.svg') }}" alt="">FAQ</h2>
                            </div>
                            <div class="col-12">
                                <h3>Najczęściej zadawane pytania</h3>
                            </div>
                        </div>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Jak umówić spotkanie w biurze sprzedaży?
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Spotkanie można umówić w dogodnym terminie, kontaktując się z naszym biurem sprzedaży telefonicznie lub za pośrednictwem formularza kontaktowego bądź wiadomości e-mail.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Czy mogę obejrzeć mieszkanie przed zakupem?
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Tak. Istnieje możliwość obejrzenia mieszkania po wcześniejszym umówieniu terminu z naszym biurem sprzedaży. Chętnie odpowiemy na wszystkie Państwa pytania.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        Jak wygląda proces rezerwacji mieszkania?
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Rezerwacja mieszkania odbywa się na podstawie umowy rezerwacyjnej zawieranej na okres 2 miesięcy. Wymaga ona wniesienia opłaty rezerwacyjnej w wysokości 1% wartości nieruchomości, która jest zaliczana na poczet ceny zakupu.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                        Czy pomagacie w uzyskaniu kredytu?
                                    </button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Tak. Oferujemy wsparcie w procesie uzyskania finansowania. Więcej informacji znajdą Państwo w zakładce „Dla Klienta”, gdzie opisaliśmy dostępne formy pomocy oraz przebieg procesu kredytowego.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="bg-dark radius-8">
                            <div class="row section-header pb-0">
                                <div class="col-12">
                                    <h2><img src="{{ asset('img/square-point.svg') }}" alt="">Porozmawiajmy!</h2>
                                </div>
                                <div class="col-12">
                                    <h3>Nie znalazłeś odpowiedzi?</h3>
                                    <p>Chętnie pomożemy i rozwiejemy wszystkie wątpliwości.</p>
                                    <div class="d-block d-sm-flex w-100 gap-0 gap-sm-4">
                                        <a href="tel:+48602293025" class="bttn bttn-sm bttn-brown d-inline-flex bttn-arrow mt-5 bttn-w100"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.86 19.86 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.86 19.86 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.12.89.34 1.76.66 2.59a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.49-1.23a2 2 0 0 1 2.11-.45c.83.32 1.7.54 2.59.66A2 2 0 0 1 22 16.92z"/></svg> Zadzwoń do nas</a>
                                        <a href="#contact-form" class="bttn bttn-sm bttn-brown-outline d-inline-flex bttn-arrow mt-5 bttn-w100"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 7 9-7"/></svg> Napisz do nas</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection
@push('scripts')

@endpush
