<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-4 mb-5 mb-xl-0">
                <div class="footer-box pe-xl-5 footer-box-logo">
                    <img src="{{ asset('img/logo.png') }}" alt="" width="257" height="67" class="mb-4">
                    <p>Rodzinna firma deweloperska specjalizująca się <br>w kameralnym budownictwie wielorodzinnym</p>
                    @if(1 == 2)
                    <div class="social-media mt-4 d-none">
                        <a href=""><img src="{{ asset('img/svg/facebook.svg') }}" alt="Ikonka Facebook"></a>
                        <a href=""><img src="{{ asset('img/svg/instagram.svg') }}" alt="Ikonka Instagram"></a>
                        <a href=""><img src="{{ asset('img/svg/linkedin.svg') }}" alt="Ikonka Linkedin"></a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-6 col-md-3 col-xl-2 mb-4 mb-lg-0">
                <div class="footer-box">
                    <h6>MENU</h6>
                    <ul class="mb-0 list-unstyled">
                        <li><a href="/">Strona główna</a></li>
                        <li><a href="{{ route('developro.index') }}">Oferta</a></li>
                        <li><a href="{{ route('about') }}">O firmie</a></li>
                        <li><a href="{{ route('contact') }}">Kontakt</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-6 col-md-3 col-xl-2 mb-4 mb-lg-0">
                <div class="footer-box">
                    <h6>INWESTYCJE</h6>
                    <ul class="mb-0 list-unstyled">
                        <li><a href="https://www.sosnowy-jablonna.pl/" target="_blank">Sosnowy Zakątek</a></li>
                        <li><a href="/i/sprawna">Sprawna</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-6 col-md-3 col-xl-2 mb-4 mb-lg-0">
                <div class="footer-box">
                    <h6>INFORMACJE</h6>
                    <ul class="mb-0 list-unstyled">
                        <li><a href="{{ route('kredyty') }}">Kredyty</a></li>
                        <li><a href="{{ route('menu.show', ['uri' => 'polityka-prywatnosci']) }}">Polityka prywatności</a></li>
                        <li class="d-none"><a href="">Inwestycje zrealizowane</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-6 col-md-3 col-xl-2">
                <div class="footer-box">
                    <h6>KONTAKT</h6>
                    <ul class="mb-0 list-unstyled">
                        <li><a href="tel:+48602293025">+48 602 293 025</a></li>
                        <li><a href="tel:+48600897075">+48 600 897 075</a></li>
                        <li><a href="mailto:sprzedaz@ceresdevelopment.pl">Wyślij wiadomość</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-0 mt-sm-4 mb-0 mb-sm-5">
            <div class="col-12 col-sm-10">
                <small>Materiały, wizualizacje, rzuty, ceny oraz informacje prezentowane na stronie internetowej mają charakter wyłącznie informacyjny i nie stanowią oferty handlowej w rozumieniu art. 66 § 1 Kodeksu cywilnego. Szczegółowe informacje dotyczące aktualnej oferty, dostępności lokali oraz warunków sprzedaży można uzyskać w biurze sprzedaży</small>
            </div>
        </div>
    </div>
    <div class="copyrights">
        Copyright © <?=date("Y");?> Ceres Development All Rights Reserved <span>|</span> Projekt i wykonanie: <a href="https://www.developro.pl/" target="_blank">DeveloPro.pl</a>
    </div>
</footer>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
