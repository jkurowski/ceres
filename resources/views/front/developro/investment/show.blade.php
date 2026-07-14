@extends('layouts.page', ['body_class' => 'investments'])

@section('meta_title', 'Inwestycje - '.$investment->name)
@if($page)
    @section('seo_title', $page->meta_title)
    @section('seo_description', $page->meta_description)
    @section('pageheader')
        @include('layouts.partials.page-header', ['page' => $page, 'header' => asset('img/pageheader.jpg'), 'h1' => $investment->name, 'pageDesc' => $investment->name])
    @stop
@endif

@section('content')
<main>
    <div id="mainContent"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('front.investments.submenu', ['menuIds' => $investment->menu])
            </div>
        </div>
    </div>
</main>
@endsection
@push('scripts')

@endpush
