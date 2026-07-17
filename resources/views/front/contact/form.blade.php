<section id="contact">
    <div class="container">
        <div class="row section-header">
            <div class="col-12">
                <h2><img src="{{ asset('img/square-point.svg') }}" alt="">KONTAKT</h2>
            </div>
            <div class="col-12 col-xl-6">
                <h3>Masz pytania? <br><span>Skontaktuj się z nami!</span></h3>
            </div>
            <div class="col-12 col-xl-6">
                <p>Masz pytania dotyczące mieszkań lub inwestycji? <br>Skontaktuj się z nami - chętnie doradzimy i pomożemy znaleźć najlepsze rozwiązanie</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-6 order-2 order-xl-1">
                <div class="contact-content">
                    <ul class="nav nav-tabs m-0 p-0 border-0 nav d-flex w-100 gap-2">
                        <li class="flex-fill">
                            <button class="active" data-bs-toggle="tab" data-bs-target="#tab1">SOSNOWY ZAKĄTEK</button>
                        </li>
                        <li class="flex-fill">
                            <button data-bs-toggle="tab" data-bs-target="#tab2">SPRAWNA</button>
                        </li>
                    </ul>

                    <div id="tabContact" class="tab-content">
                        <div class="tab-pane active show" id="tab1">
                            <ul class="list-unstyled mb-0">
                                <li class="tab-content-location align-items-center">
                                        <span class="d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('img/svg/contact/map.svg') }}" alt="" width="69" height="69">
                                        </span>
                                    <div>
                                        <p><b>Biuro w Jabłonnie</b></p>
                                        <p>ul. Marmurowa 30 lok.54</p>
                                        <p>05-110 Jabłonna</p>
                                    </div>
                                </li>
                                <li class="tab-content-hours align-items-start">
                                        <span class="d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('img/svg/contact/clock.svg') }}" alt="" width="69" height="69">
                                        </span>
                                    <div>
                                        <p><b>Godziny otwarcia:</b></p>
                                        <p>poniedziałek-piątek 8:30-18:00</p>
                                        <p>sobota - po wcześniejszej rezerwacji</p>
                                        <p>Niedziela - nieczynne</p>
                                    </div>
                                </li>
                                <li class="tab-content-phone align-items-center">
                                        <span class="d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('img/svg/contact/phone.svg') }}" alt="" width="69" height="69">
                                        </span>
                                    <div>
                                        <p><b>Telefon:</b></p>
                                        <p><a href="tel:+48602293025">+48 602 293 025</a></p>
                                        <p><a href="tel:+48600897075">+48 600 897 075</a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-pane" id="tab2">
                            <ul class="list-unstyled mb-0">
                                <li class="tab-content-location align-items-center">
                                        <span class="d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('img/svg/contact/map.svg') }}" alt="" width="69" height="69">
                                        </span>
                                    <div>
                                        <p><b>Biuro w Jabłonnie</b></p>
                                        <p>ul. Marmurowa 30 lok.54</p>
                                        <p>05-110 Jabłonna</p>
                                    </div>
                                </li>
                                <li class="tab-content-hours align-items-start">
                                        <span class="d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('img/svg/contact/clock.svg') }}" alt="" width="69" height="69">
                                        </span>
                                    <div>
                                        <p><b>Godziny otwarcia:</b></p>
                                        <p>poniedziałek-piątek 8:30-18:00</p>
                                        <p>sobota - po wcześniejszej rezerwacji</p>
                                        <p>Niedziela - nieczynne</p>
                                    </div>
                                </li>
                                <li class="tab-content-phone align-items-center">
                                        <span class="d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('img/svg/contact/phone.svg') }}" alt="" width="69" height="69">
                                        </span>
                                    <div>
                                        <p><b>Telefon:</b></p>
                                        <p><a href="tel:+48602293025">+48 602 293 025</a></p>
                                        <p><a href="tel:+48600897075">+48 600 897 075</a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6 order-1 order-xl-2">
                <div class="form-content">
                    <h4 class="mb-5">Wyślij wiadomość</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="validate[required] form-control " id="floatingName" placeholder="Imię i nazwisko" name="name" value="">
                                <label for="floatingName" class="h-100">Imię i nazwisko *</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="validate[required] form-control " id="floatingPhone" placeholder="Telefon" name="phone" value="">
                                <label for="floatingPhone" class="h-100">Telefon</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="validate[required] form-control " id="floatingEmail" placeholder="E-mail" name="email" value="">
                                <label for="floatingEmail" class="h-100">E-mail *</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <textarea class="validate[required] form-control " id="floatingMessage" placeholder="Wiadomość *" name="message"></textarea>
                                <label for="floatingMessage">Wiadomość *</label>
                            </div>
                        </div>
                        <div class="col-12 obligatory-text">
                            <p>Na podstawie z art. 13 ogólnego rozporządzenia o ochronie danych osobowych z dnia 27 kwietnia 2016 r. (Dz. Urz. UE L 119 z 04.05.2016) informujemy, iż przesyłając wiadomość za pomocą formularza kontaktowego wyrażacie Państwo zgodę na (polityka informacyjna):</p>
                        </div>
                        <div class="col-12 rodo-rules mt-3 ">
                            <div class="form-check">
                                <input name="rule_1" id="rule_1" value="1" type="checkbox" class="form-check-input  validate[required] " data-prompt-position="topLeft:0">
                                <label for="rule_1" class="form-check-label">
                                    <p>Zapoznałem się z Polityką prywatności i zawartą w niej Informacją na temat przetwarzania danych osobowych</p>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 rodo-rules mt-3 ">
                            <div class="form-check">
                                <input name="rule_1" id="rule_2" value="1" type="checkbox" class="form-check-input  validate[required] " data-prompt-position="topLeft:0">
                                <label for="rule_2" class="form-check-label">
                                    <p>Wyrażam zgodę na otrzymywanie od Ceres Development sp. z o.o. informacji marketingowych, przekazywanych za pomocą telekomunikacyjnych urządzeń końcowych oraz tzw. automatycznych systemów wywołujących drogą elektroniczną na podany powyżej adres e-mail</p>
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="bttn bttn-brown d-inline-flex bttn-arrow mt-4">Wyślij wiadomość<img src="{{ asset('img/svg/right-arrow.svg') }}" alt="" width="33" height="35"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{--<div class="container d-none">--}}
{{--    <div class="row d-flex justify-content-center">--}}
{{--        <div class="col-12">--}}
{{--            @if (session('success'))--}}
{{--                <div class="alert alert-success border-0">--}}
{{--                    {{ session('success') }}--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            @if (session('error'))--}}
{{--                <div class="alert alert-warning border-0">--}}
{{--                    {{ session('error') }}--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <form method="post" id="contact-form" action="{{ route('front.contact.send') }}" class="validateForm">--}}
{{--                {{ csrf_field() }}--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12 mb-4 mb-md-0 col-md-4 form-input">--}}
{{--                        <label for="form_name">Imię <span class="text-danger">*</span></label>--}}
{{--                        <input name="form_name" id="form_name" class="validate[required] form-control @error('form_name') is-invalid @enderror" type="text" value="{{ old('form_name') }}">--}}

{{--                        @error('form_name')--}}
{{--                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="col-12 mb-4 mb-md-0 col-md-4 form-input d-none">--}}
{{--                        <label for="form_surnames">Nazwisko <span class="text-danger">*</span></label>--}}
{{--                        <input name="form_surnames" id="form_surnames" class="form-control" type="text" value="{{ old('form_surname') }}">--}}
{{--                    </div>--}}
{{--                    <div class="col-12 mb-4 mb-md-0 col-md-4 form-input">--}}
{{--                        <label for="form_email">Adres e-mail <span class="text-danger">*</span></label>--}}
{{--                        <input name="form_email" id="form_email" class="validate[required] form-control @error('form_email') is-invalid @enderror" type="text" value="{{ old('form_email') }}">--}}

{{--                        @error('form_email')--}}
{{--                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="col-12 col-md-4 form-input">--}}
{{--                        <label for="form_phone">Telefon <span class="text-danger">*</span></label>--}}
{{--                        <input name="form_phone" id="form_phone" class="validate[required] form-control @error('form_phone') is-invalid @enderror" type="text" value="{{ old('form_phone') }}">--}}

{{--                        @error('form_phone')--}}
{{--                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="col-12 mt-4 form-input">--}}
{{--                        <label for="form_message">Treść wiadomości <span class="text-danger">*</span></label>--}}
{{--                        <textarea rows="5" cols="1" name="form_message" id="form_message" class="validate[required] form-control @error('form_message') is-invalid @enderror">{{ old('form_message') }}</textarea>--}}

{{--                        @error('form_message')--}}
{{--                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="col-12 col-xxl-8">--}}
{{--                        @if($obligation)--}}
{{--                            <div class="rodo-obligation mt-3">--}}
{{--                                {!! $obligation->obligation !!}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <div class="rodo-rules">--}}
{{--                            @foreach ($rules as $r)--}}
{{--                                <div class="col-12 @error('rule_'.$r->id) is-invalid @enderror">--}}
{{--                                    <div class="rodo-rule clearfix">--}}
{{--                                        <input name="rule_{{$r->id}}" id="rule_{{$r->id}}" value="1" type="checkbox" @if($r->required === 1) class="validate[required]" @endif data-prompt-position="topLeft:0">--}}
{{--                                        <label for="rule_{{$r->id}}" class="rules-text">--}}
{{--                                            {!! $r->text !!}--}}
{{--                                            @error('rule_'.$r->id)--}}
{{--                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                            @enderror--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-12 col-xxl-4 d-flex justify-content-end align-items-end">--}}
{{--                        <div class="form-submit">--}}
{{--                            <input name="form_page" type="hidden" value="{{ $page_name }}">--}}
{{--                            <script type="text/javascript">--}}
{{--                                @if(settings()->get("recaptcha_site_key") && settings()->get("recaptcha_secret_key"))--}}
{{--                                document.write("<button type=\"submit\" class=\"bttn g-recaptcha\" data-sitekey=\"{{ settings()->get("recaptcha_site_key") }}\" data-callback=\"onRecaptchaSuccess\" data-action=\"submitContact\">WYŚLIJ WIADOMOŚĆ</button>");--}}
{{--                                @else--}}
{{--                                document.write("<button class=\"bttn\" type=\"submit\">WYŚLIJ WIADOMOŚĆ</button>");--}}
{{--                                @endif--}}
{{--                            </script>--}}
{{--                            <noscript>Do poprawnego działania, Java musi być włączona.</noscript>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@push('scripts')
    <script src="{{ asset('js/validation.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/pl.js') }}" charset="utf-8"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".validateForm").validationEngine({
                validateNonVisibleFields: true,
                updatePromptsPosition:true,
                promptPosition : "topRight:-137px",
                autoPositionUpdate: false
            });
        });

        function onRecaptchaSuccess(token) {
            $(".validateForm").validationEngine('updatePromptsPosition');
            const isValid = $(".validateForm").validationEngine('validate');
            if (isValid) {
                $("#contact-form").submit();
            } else {
                grecaptcha.reset();
            }
        }

        @if (session('success') || session('warning') || $errors->any())
        $(window).load(function() {
            const aboveHeight = $('header').outerHeight();
            $('html, body').stop().animate({
                scrollTop: $('.validateForm').offset().top-aboveHeight
            }, 1500, 'easeInOutExpo');
        });
        @endif
    </script>
@endpush
