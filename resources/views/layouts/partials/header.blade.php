<div class="header-holder">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div id="logo">
                        <a href="/">
                            <img src="{{ asset('img/logo.png') }}" alt="" width="257" height="67">
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <nav>
                        <ul>
                            <li class="active"><a href="/">Home</a></li>
                            <li><a href="{{ route('developro.index') }}">Oferta</a></li>
                            <li><a href="#">O firmie <img src="{{ asset('img/svg/submenu.svg') }}" alt="Dropdown icon" class="ms-2"></a></li>
                            <li><a href="#">Dla Klienta <img src="{{ asset('img/svg/submenu.svg') }}" alt="Dropdown icon" class="ms-2"></a></li>
                            <li><a href="{{ route('contact') }}">Kontakt</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="header-cta">
                        <a href="tel:+48602293025"><img src="{{ asset('img/svg/phone.svg') }}" alt="Numer telefonu"> +48 602 293 025</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>

<div id="megamenu-opacity"></div>

<aside class="d-none">
    <ul>
        <li><a rel="nofollow" target="_blank" class="Facebook" href="https://www.facebook.com/kalterdeweloper/"><span>Facebook</span></a></li>
        <li class="d-none d-sm-inline">
            <a rel="nofollow" target="_blank" class="Phone" href="tel:+48539975771"><span>Zadzwoń</span></a>
        </li>
        @if($clipboardCount)
            <li id="clipboardwidget"><a href="{{ route('clipboard.index') }}" class="Clipboard"><span>Schowek</span></a></li>
        @endif
    </ul>
</aside>
