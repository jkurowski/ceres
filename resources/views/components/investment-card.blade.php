@props(['p'])

@php
    if($p->id == 1) {
        $url = 'https://www.sosnowy-jablonna.pl';
        $target = '_blank';
    } else {
        $url = route('developro.show', $p->slug);
        $target = '_self';
    }
@endphp

<div class="{{ $attributes->get('class', 'col-12 col-lg-6 mb-4 mb-md-5') }}">
    <div class="invest-list-item radius-8">
        <span class="invest-list-status">W SPRZEDAŻY</span>
        <a href="{{ $url }}" target="{{ $target }}">
            <img src="{{ asset('investment/thumbs/' . $p->file_thumb) }}" alt="" class="radius-8" width="840" height="640">
        </a>
        <div class="invest-list-apla">
            <div class="row">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div>
                        <h2><a href="{{ $url  }}" target="{{ $target }}">{{ $p->name }}</a></h2>
                        <a href="{{ $url }}" class="bttn bttn-arrow bttn-sm bttn-gold d-inline-flex" target="{{ $target }}">Zobacz inwestycje <img src="{{ asset('img/svg/right-arrow.svg') }}" alt="" width="23" height="24"></a>
                    </div>
                </div>
                <div class="d-none d-xl-block col-6">
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
