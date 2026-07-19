<section class="offer-search pt-0 pb-4 single-offer-search">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <form
                    action="{{ Route::is(['developro.plan', 'developro.page', 'developro.mockup', 'developro.investment.news', 'developro.investment.news.show', 'developro.show']) ? route('developro.plan', $investment->slug) . '#properties' : '#properties' }}"
                    class="search-form p-4"
                    autocomplete="off"
                    method="get"
                >
                    <div class="container-fluid d-block d-sm-none">
                        <div class="row row-gap-3 py-3 row-button">
                            <div class="col-12">
                                <button type="button" id="toggleSearchform" onclick="toggleSearch()">Pokaż / ukryj wyszukiwarkę</button>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-end toggle-searchform">
                        <p class="col-12 w-100 text-uppercase mb-0 d-none">Wyszukiwarka</p>
                        @if($investment->room_range)
                            @php $rooms = explode(',', $investment->room_range) @endphp
                            <div class="@if($status != 3) col @else @if(!isset($is_floor)) col-12 col-sm-6 col-lg-3 @else col-12 col-lg-6 @endif @endif">
                                <div class="search-field">
                                    <label for="rooms">Pokoje</label>
                                    <div class="dropdown mt-2">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="rooms">
                                            {{ request()->input('rooms') ?: 'Wszystkie' }}
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item @if(!request()->input('rooms')) active @endif" href="#" data-value="">Wszystkie</a></li>
                                            @foreach($rooms as $room)
                                                <li><a class="dropdown-item @if(request()->input('rooms') == $room) active @endif" href="#" data-value="{{ $room }}">{{ $room }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <input type="hidden" name="rooms" id="rooms" value="{{ request()->input('rooms') }}">
                                </div>
                            </div>
                        @endif

                        @if(isset($is_building))
                            @php
                                $selectedFloor = $investment->floors->first(function ($f) {
                                    return $f->type == 1 && (string) $f->id === (string) request()->input('floor');
                                });
                                $floorLabel = 'Wszystkie';
                                if ($selectedFloor) {
                                    $floorLabel = ($selectedFloor->building_id != 0 && isset($selectedFloor->building))
                                        ? $selectedFloor->building->name . ' - ' . $selectedFloor->name
                                        : $selectedFloor->name;
                                }
                            @endphp
                            <div class="@if($status != 3) col @else col-12 col-sm-6 col-lg-3 @endif">
                                <div class="search-field">
                                    <label for="floors">Piętro</label>
                                    <div class="dropdown mt-2">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="floors">
                                            {{ $floorLabel }}
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item @if(!request()->input('floor')) active @endif" href="#" data-value="">Wszystkie</a></li>
                                            {!! floorToDropdown($investment->floors) !!}
                                        </ul>
                                    </div>
                                    <input type="hidden" name="floor" id="floor" value="{{ request()->input('floor') }}">
                                </div>
                            </div>
                        @endif

                        @if($status != 3)
                            @php
                                $statusLabels = [1 => 'Na sprzedaż', 2 => 'Rezerwacja', 3 => 'Sprzedane'];
                                $statusLabel = $statusLabels[(int) request()->input('status')] ?? 'Wszystkie';
                            @endphp
                            <div class="col">
                                <div class="search-field border-0">
                                    <label for="status">Status</label>
                                    <div class="dropdown mt-2">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="status">
                                            {{ $statusLabel }}
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item @if(!request()->input('status')) active @endif" href="#" data-value="">Wszystkie</a></li>
                                            <li><a class="dropdown-item @if(request()->input('status') == 1) active @endif" href="#" data-value="1">Na sprzedaż</a></li>
                                            <li><a class="dropdown-item @if(request()->input('status') == 2) active @endif" href="#" data-value="2">Rezerwacja</a></li>
                                            <li><a class="dropdown-item @if(request()->input('status') == 3) active @endif" href="#" data-value="3">Sprzedane</a></li>
                                        </ul>
                                    </div>
                                    <input type="hidden" name="status" id="status" value="{{ request()->input('status') }}">
                                </div>
                            </div>
                        @endif

                        @if($investment->area_range)
                            @php
                                preg_match_all('/\d+/', $investment->area_range, $numbers);
                                $min = (int)($numbers[0][0] ?? 0);
                                $max = (int)(collect($numbers[0])->last() ?? 0);
                            @endphp
                            @if($status != 3)
                                <div class="w-100"></div>
                            @endif
                            <div class="col-12 col-lg-6 d-block d-sm-flex slider-col">
                                <label class="slider-label">Powierzchnia<small><span id="area-val"></span> m²</small></label>
                                <div class="slider-container" id="area-slider-container">
                                    <div class="slider-track"></div>
                                    <div class="slider-range" id="area-slider-range"></div>
                                    <input type="range" class="slider-input" id="area-min-input" min="{{ $min }}" max="{{ $max }}" value="{{ request('area_min', $min) }}">
                                    <input type="range" class="slider-input" id="area-max-input" min="{{ $min }}" max="{{ $max }}" value="{{ request('area_max', $max) }}">
                                </div>
                                <input type="hidden" name="area_min" id="area_min" value="{{ request('area_min', $min) }}">
                                <input type="hidden" name="area_max" id="area_max" value="{{ request('area_max', $max) }}">
                            </div>
                        @endif

                        @if(isset($price))
                            @if($price->min_price && $price->max_price && $status != 3)
                                <div class="col-12 col-lg-6 d-block d-sm-flex slider-col">
                                    <label class="slider-label slider-label-lg">Cena<small><span id="price-val"></span> PLN</small></label>
                                    <div class="slider-container" id="price-slider-container">
                                        <div class="slider-track"></div>
                                        <div class="slider-range" id="price-slider-range"></div>
                                        <input type="range" class="slider-input" id="price-min-input" min="{{ $price->min_price }}" max="{{ $price->max_price }}" step="10000" value="{{ request('price_min', $price->min_price) }}">
                                        <input type="range" class="slider-input" id="price-max-input" min="{{ $price->min_price }}" max="{{ $price->max_price }}" step="10000" value="{{ request('price_max', $price->max_price) }}">
                                    </div>
                                    <input type="hidden" name="price_min" id="price_min" value="{{ request('price_min', $price->min_price) }}">
                                    <input type="hidden" name="price_max" id="price_max" value="{{ request('price_max', $price->max_price) }}">
                                </div>
                            @endif
                        @endif

                    </div>
                    <div class="flex-fill toggle-searchform">
                        <button type="submit" class="bttn bttn-arrow bttn-xs bttn-gold d-inline-flex w-100 mt-3 justify-content-center">
                            Szukaj <svg xmlns="http://www.w3.org/2000/svg" width="21.631" height="21.636" viewBox="0 0 21.631 21.636">
                                <path id="Icon_ionic-ios-search" data-name="Icon ionic-ios-search" d="M25.877,24.563l-6.016-6.072a8.573,8.573,0,1,0-1.3,1.318l5.977,6.033a.926.926,0,0,0,1.307.034A.932.932,0,0,0,25.877,24.563ZM13.124,19.882A6.77,6.77,0,1,1,17.912,17.9,6.728,6.728,0,0,1,13.124,19.882Z" transform="translate(-4.5 -4.493)" fill="#fff" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    function toggleSearch() {
        document.querySelector('.search-form').classList.toggle('open');
    }
</script>
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function initDualSlider(containerId, minInputId, maxInputId, minHiddenId, maxHiddenId, rangeId, valId, isPrice = false) {
                const minInput = document.getElementById(minInputId);
                const maxInput = document.getElementById(maxInputId);
                const minHidden = document.getElementById(minHiddenId);
                const maxHidden = document.getElementById(maxHiddenId);
                const range = document.getElementById(rangeId);
                const valSpan = document.getElementById(valId);
                const minVal = parseInt(minInput.min);
                const maxVal = parseInt(maxInput.max);

                function updateSlider() {
                    let v1 = parseInt(minInput.value);
                    let v2 = parseInt(maxInput.value);

                    if (v1 > v2) {
                        let tmp = v1;
                        v1 = v2;
                        v2 = tmp;
                    }

                    minHidden.value = v1;
                    maxHidden.value = v2;

                    const percent1 = ((v1 - minVal) / (maxVal - minVal)) * 100;
                    const percent2 = ((v2 - minVal) / (maxVal - minVal)) * 100;

                    range.style.left = percent1 + "%";
                    range.style.width = (percent2 - percent1) + "%";

                    if (isPrice) {
                        valSpan.innerText = v1.toLocaleString() + " - " + v2.toLocaleString();
                    } else {
                        valSpan.innerText = v1 + " - " + v2;
                    }
                }

                minInput.addEventListener("input", updateSlider);
                maxInput.addEventListener("input", updateSlider);
                updateSlider();
            }

            initDualSlider("area-slider-container", "area-min-input", "area-max-input", "area_min", "area_max", "area-slider-range", "area-val");
            initDualSlider("price-slider-container", "price-min-input", "price-max-input", "price_min", "price_max", "price-slider-range", "price-val", true);

            document.querySelectorAll(".search-form .search-field .dropdown").forEach(function (dropdown) {
                const wrapper = dropdown.closest(".search-field");
                const hiddenInput = wrapper ? wrapper.querySelector('input[type="hidden"]') : null;
                const button = dropdown.querySelector(".dropdown-toggle");
                const items = dropdown.querySelectorAll(".dropdown-item");

                if (!hiddenInput || !button) {
                    return;
                }

                items.forEach(function (item) {
                    item.addEventListener("click", function (e) {
                        e.preventDefault();
                        hiddenInput.value = item.dataset.value;
                        button.textContent = item.textContent.trim();
                        items.forEach(function (i) {
                            i.classList.remove("active");
                        });
                        item.classList.add("active");
                    });
                });
            });
        });
    </script>
    <style>.slider-label.slider-label-lg {width:290px}</style>
@endpush
