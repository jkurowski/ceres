@extends('layouts.page', ['body_class' => 'investments'])

@section('meta_title', 'Inwestycje - '.$investment->name)
@if($page)
    @section('seo_title', $page->meta_title)
    @section('seo_description', $page->meta_description)
    @section('pageheader')
        @include('layouts.partials.page-header', [
            'page' => $page,
            'header' => asset('img/pageheader.jpg'),
            'h1' => $investment->name,
            'pageDesc' => $investment->entry_content,
            'class' => 'sm'
        ])
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
    <div id="aboutInvest"></div>
    @foreach($sections as $section)
        <x-dynamic-component
            :component="'investment-section-' . $section->type"
            :sectionTitle="$section->title"
            :sectionSubTitle="$section->subtitle"
            :columns="$section->columns"
            :content="$section->content"
            :imgAlt="$section->file_alt"
            :imgSrc="asset('investment/sections/'.$section->file)"
        />
    @endforeach

    <!-- Contact form -->
    @include('front.contact.form', ['page_name' => $investment->name])
    <!-- End of Contact form -->

</main>
@endsection
@push('scripts')

@endpush
