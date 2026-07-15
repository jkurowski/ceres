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
                            <div class="col-3 p-0">
                                <div class="contact-data text-center">
                                <span class="contact-data-icon">
                                    <img src="{{ asset('img/icons/mapmarker.png') }}" alt="" width="120" height="120">
                                </span>
                                    <p>ul. Marmurowa 30 lok. 54</p>
                                    <p>05-110 Jabłonna</p>
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <div class="contact-data text-center">
                                <span class="contact-data-icon">
                                    <img src="{{ asset('img/icons/phone.png') }}" alt="" width="120" height="120">
                                </span>
                                    <p><a href="">+48 602 293 025</a></p>
                                    <p><a href="">+48 600 897 075</a></p>
                                </div>
                            </div>
                            <div class="col-3 p-0">
                                <div class="contact-data text-center">
                                <span class="contact-data-icon">
                                    <img src="{{ asset('img/icons/email.png') }}" alt="" width="120" height="120">
                                </span>
                                    <p><a href="mailto:sprzedaz@ceresdevelopment.pl">sprzedaz@ceresdevelopment.pl</a></p>
                                </div>
                            </div>
                            <div class="col-3 p-0">
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

        @include('front.contact.form')

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
                    <div class="col-6">
                        <div class="row section-header pb-5">
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
                                    <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dolor risus, at malesuada quam lacinia sit amet. Maecenas ullamcorper nunc at ante tincidunt, vel pretium ligula suscipit. Fusce semper ultricies lobortis. Maecenas nec est nec orci facilisis suscipit. Aliquam erat volutpat. Vestibulum feugiat laoreet metus molestie porttitor. Morbi gravida risus eu sapien congue pharetra. Ut ut leo libero. Etiam at ante porttitor, blandit ante et, bibendum ante. Cras ipsum diam, bibendum at diam ac, pharetra egestas risus. Donec feugiat tincidunt orci, in varius massa sagittis congue. Suspendisse potenti. Integer tempus tortor quis eros accumsan, a imperdiet est luctus. Mauris et arcu et velit pellentesque fringilla.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Czy mogę obejrzeć mieszkanie przed zakupem?
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Pellentesque molestie dolor ac magna aliquet auctor sed vel magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec auctor magna nunc, ut cursus nulla dictum nec. Cras aliquet efficitur mi, ut accumsan nibh vulputate at. Aliquam vulputate fermentum dictum. Mauris enim nibh, suscipit non porttitor non, mollis non purus. Proin varius a neque eu eleifend.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        Jak wygląda proces rezerwacji mieszkania?
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam vel sollicitudin metus. Sed vitae mollis magna. Nam sem lectus, condimentum ut dui vel, aliquet rhoncus libero. Quisque quis lorem eu felis porta placerat. Donec auctor urna at quam euismod consectetur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus a nunc ac ligula molestie elementum vitae nec erat. Curabitur tristique tortor id rhoncus bibendum. Nullam lobortis eleifend scelerisque. Aenean ac velit lobortis, mollis augue nec, egestas sapien. Nam vitae magna vestibulum, viverra tellus non, bibendum lorem. Aliquam suscipit nulla nec ex euismod, ac gravida tortor ornare.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                        Czy pomagacie w uzyskaniu kredytu?
                                    </button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Sed quis iaculis mauris, at semper odio. Fusce eu finibus justo. Ut scelerisque lobortis vulputate. Morbi mollis eleifend ipsum sed tincidunt. Donec vel convallis ante. Duis porttitor vulputate lacinia. Sed at vulputate justo. Ut at varius lorem. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec blandit et diam et eleifend. Pellentesque ligula turpis, vestibulum vitae iaculis vel, malesuada vel massa. Maecenas dignissim fringilla justo, vitae placerat nisl aliquet eget.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bg-dark radius-8">
                            <div class="row section-header pb-5">
                                <div class="col-12">
                                    <h2><img src="{{ asset('img/square-point.svg') }}" alt="">Porozmawiajmy!</h2>
                                </div>
                                <div class="col-12">
                                    <h3>Nie znalazłeś odpowiedzi?</h3>
                                    <p>Chętnie pomożemy i rozwiejemy wszystkie wątpliwości.</p>
                                    <div class="d-flex w-100 gap-4">
                                        <button type="submit" class="bttn bttn-sm bttn-brown d-inline-flex bttn-arrow mt-5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.86 19.86 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.86 19.86 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.12.89.34 1.76.66 2.59a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.49-1.23a2 2 0 0 1 2.11-.45c.83.32 1.7.54 2.59.66A2 2 0 0 1 22 16.92z"/></svg> Zadzwoń do nas</button>
                                        <button type="submit" class="bttn bttn-sm bttn-brown-outline d-inline-flex bttn-arrow mt-5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 7 9-7"/></svg> Napisz do nas</button>
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
