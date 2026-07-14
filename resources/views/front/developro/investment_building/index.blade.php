@extends('layouts.page', ['body_class' => 'investments'])

@php
    if(!empty($investment->meta_title)) {
        $seoTitle = $investment->meta_title;
    }
    elseif(!empty($page->meta_title)) {
        $seoTitle = $page->meta_title;
    }
    else {
        $seoTitle = settings()->get("page_title") . ' - ' . $page->title . ' - ' . $investment->name .' - '. $building->name;
    }

    if(!empty($investment->meta_description)) {
        $seoDescription = $investment->meta_description;
    }
    elseif(!empty($page->meta_description)) {
        $seoDescription = $page->meta_description;
    }
    else {
        $seoDescription = settings()->get("page_description");
    }
@endphp

@section('meta_title', $page->title)
@section('seo_title', $seoTitle)
@section('seo_description', $seoDescription)
@if($investment->status == 3)
    @section('seo_robots', 'noindex, nofollow')
@endif

@section('content')
    <main>
        @include('layouts.partials.page-header', ['page' => $page, 'header' => asset('img/pageheader.jpg'), 'h1' => $investment->name .' - '.$building->name, 'pageDesc' => $investment->name, 'class' => 'sm'])
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('front.investments.submenu', ['menuIds' => $investment->menu, 'activeMenuId' => 2])
                </div>
            </div>
        </div>
        <div class="container">
            <div id="planNav" class="row">
                <div class="col-6 col-sm-4">
                    @if($prev_building)
                        <a href="{{route('developro.building', [$investment->slug, $prev_building, 'buildingSlug' => Str::slug($prev_building->name)])}}?status=1#submenu" class="bttn bttn-arrow bttn-sm bttn-gold d-inline-flex">
                            {{$prev_building->name}}
                        </a>
                    @endif
                </div>

                <div class="col-12 col-sm-4 text-center order-first order-sm-0">
                    <a href="{{route('developro.plan', $investment->slug)}}?status=1#submenu" class="bttn bttn-arrow bttn-sm bttn-gold d-inline-flex">Plan inwestycji</a>
                </div>

                <div class="col-6 col-sm-4 text-end">
                    @if($next_building)
                        <a href="{{route('developro.building', [$investment->slug, $next_building, 'buildingSlug' => Str::slug($next_building->name)])}}?status=1#submenu" class="bttn bttn-arrow bttn-sm bttn-gold d-inline-flex">
                            {{$next_building->name}}
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <section class="pb-0 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="plan-info">
                            <p>Z planu budynku wybierz piętro, lub skorzystaj z wyszukiwarki</p>
                        </div>
                    </div>
                    <div class="col-12">
                        @if($investment->show_properties == 1)
                            @if($building->file)
                                <div id="plan-holder">
                                    <img src="{{ asset('/investment/building/'.$building->file.'') }}" alt="{{$building->name}}" id="invesmentplan" usemap="#invesmentplan" class="w-100 h-100 object-fit-cover rounded">

                                    <map name="invesmentplan">
                                        @foreach($investment->buildingFloors as $floor)
                                            @if($floor->html)
                                                <area shape="poly" href="{{route('developro.building.floor', [$investment->slug, $building, 'buildingSlug' => Str::slug($building->name), $floor, 'floorSlug' => Str::slug($floor->name)])}}?status=1#plan" data-item="{{$floor->id}}" title="{{$floor->name}}" alt="floor-{{$floor->id}}" data-floornumber="{{$floor->id}}" data-floortype="{{$floor->type}}" coords="{{cords($floor->html)}}">
                                            @endif
                                        @endforeach
                                    </map>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </section>

        @include('front.investments.single-investment-search', ['investment' => $building, 'full' => 1, 'status' => $investment->status, 'is_building' => 1, 'price' => $building])

        <section id="properties" class="pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-end align-items-center gap-2 gap-md-3 mt-2 mt-md-0">
                        @php
                            $activeSorts = explode(',', request('sort', ''));
                        @endphp
                        <select name="sort" class="form-select form-select-sm w-auto sort-select">
                            <option value="">Sortuj wg.</option>
                            <option value="area_asc" {{ in_array('area_asc', $activeSorts) ? 'selected' : '' }}>Powierzchnia ↑</option>
                            <option value="area_desc" {{ in_array('area_desc', $activeSorts) ? 'selected' : '' }}>Powierzchnia ↓</option>
                            @if($investment->status <> 3)
                                <option value="price_asc" {{ in_array('price_asc', $activeSorts) ? 'selected' : '' }}>Cena ↑</option>
                                <option value="price_desc" {{ in_array('price_desc', $activeSorts) ? 'selected' : '' }}>Cena ↓</option>
                            @endif
                            <option value="views_desc" {{ in_array('views_desc', $activeSorts) ? 'selected' : '' }}>Najczęściej odwiedzane</option>
                        </select>

                        <ul class="nav justify-content-end d-none d-md-flex" role="tablist">
                            <li class="nav-item layout-switcher" role="presentation">
                                <button class="nav-link active opacity-25" id="list-layout" type="button" aria-selected="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="29" viewBox="0 0 34 29">
                                        <g id="list" opacity="1">
                                            <g id="Rectangle_441" data-name="Rectangle 441" transform="translate(0 24)" fill="#fff" stroke="currentColor" stroke-width="1">
                                                <rect width="34" height="5" rx="1" stroke="none" />
                                                <rect x="0.5" y="0.5" width="33" height="4" rx="0.5" fill="none" />
                                            </g>
                                            <g id="Rectangle_442" data-name="Rectangle 442" transform="translate(0 16)" fill="#fff" stroke="currentColor" stroke-width="1">
                                                <rect width="34" height="5" rx="1" stroke="none" />
                                                <rect x="0.5" y="0.5" width="33" height="4" rx="0.5" fill="none" />
                                            </g>
                                            <g id="Rectangle_443" data-name="Rectangle 443" fill="#fff" stroke="currentColor" stroke-width="1">
                                                <rect width="34" height="5" rx="1" stroke="none" />
                                                <rect x="0.5" y="0.5" width="33" height="4" rx="0.5" fill="none" />
                                            </g>
                                            <g id="Rectangle_444" data-name="Rectangle 444" transform="translate(0 8)" fill="#fff" stroke="currentColor" stroke-width="1">
                                                <rect width="34" height="5" rx="1" stroke="none" />
                                                <rect x="0.5" y="0.5" width="33" height="4" rx="0.5" fill="none" />
                                            </g>
                                        </g>
                                    </svg>

                                </button>
                            </li>
                            <li class="nav-item layout-switcher" role="presentation">
                                <button class="nav-link" id="grid-layout" type="button" aria-selected="false">
                                    <svg id="grid" xmlns="http://www.w3.org/2000/svg" width="34" height="29" viewBox="0 0 34 29">
                                        <g id="Rectangle_430" data-name="Rectangle 430" fill="#fff" stroke="currentColor" stroke-width="1">
                                            <rect width="15" height="7" rx="1" stroke="none" />
                                            <rect x="0.5" y="0.5" width="14" height="6" rx="0.5" fill="none" />
                                        </g>
                                        <g id="Rectangle_433" data-name="Rectangle 433" transform="translate(0 11)" fill="#fff" stroke="currentColor" stroke-width="1">
                                            <rect width="15" height="7" rx="1" stroke="none" />
                                            <rect x="0.5" y="0.5" width="14" height="6" rx="0.5" fill="none" />
                                        </g>
                                        <g id="Rectangle_435" data-name="Rectangle 435" transform="translate(0 22)" fill="#fff" stroke="currentColor" stroke-width="1">
                                            <rect width="15" height="7" rx="1" stroke="none" />
                                            <rect x="0.5" y="0.5" width="14" height="6" rx="0.5" fill="none" />
                                        </g>
                                        <g id="Rectangle_431" data-name="Rectangle 431" transform="translate(19)" fill="#fff" stroke="currentColor" stroke-width="1">
                                            <rect width="15" height="7" rx="1" stroke="none" />
                                            <rect x="0.5" y="0.5" width="14" height="6" rx="0.5" fill="none" />
                                        </g>
                                        <g id="Rectangle_432" data-name="Rectangle 432" transform="translate(19 11)" fill="#fff" stroke="currentColor" stroke-width="1">
                                            <rect width="15" height="7" rx="1" stroke="none" />
                                            <rect x="0.5" y="0.5" width="14" height="6" rx="0.5" fill="none" />
                                        </g>
                                        <g id="Rectangle_434" data-name="Rectangle 434" transform="translate(19 22)" fill="#fff" stroke="currentColor" stroke-width="1">
                                            <rect width="15" height="7" rx="1" stroke="none" />
                                            <rect x="0.5" y="0.5" width="14" height="6" rx="0.5" fill="none" />
                                        </g>
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row mt-30">
                    <div class="col-12">
                        <div id="layout-container" class="list-layout">
                            @foreach($properties as $index => $p)
                                <x-property-new-list-item :p="$p" :index="$index" :sort="$sort"/>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('scripts')
    <script src="{{ asset('/js/plan/imagemapster.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/plan/plan.js') }}" charset="utf-8"></script>
    <script>
        document.querySelector('.sort-select').addEventListener('change', function() {
            const url = new URL(window.location.href);
            if (this.value) {
                url.searchParams.set('sort', this.value);
            } else {
                url.searchParams.delete('sort');
            }
            url.hash = 'properties';
            window.location.href = url.toString();
        });

        const buttons = document.querySelectorAll('.list-fav');
        const baseUrl = "https://www.kalternieruchomosci.pl/";

        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const xhr = new XMLHttpRequest();
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const property_id = this.getAttribute('data-id');

                xhr.open('POST', baseUrl + 'pl/clipboard');
                xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                const data = { id: property_id };
                const jsonData = JSON.stringify(data);
                xhr.send(jsonData);

                xhr.addEventListener('load', function() {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        const message = response.raw;
                        const count = response.count;

                        toastr.options={closeButton:!0,progressBar:!0,positionClass:"toast-menu-bottom-right",timeOut:"3000"};toastr.success(message);

                        // Check if count is truthy and element doesn't already exist
                        if (count && !document.querySelector('#clipboardwidget')) {
                            const li = document.createElement('li');
                            li.id = 'clipboardwidget';
                            li.innerHTML = '<a href="' + baseUrl + 'pl/schowek" class="Clipboard"><span>Schowek</span></a>';

                            const asideList = document.querySelector('aside ul');
                            if (asideList) {
                                asideList.appendChild(li);
                            }
                        }
                    }
                });
            });
        });
    </script>
@endpush
