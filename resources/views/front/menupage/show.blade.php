@extends('layouts.page', ['body_class' => 'homepage'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)
@section('seo_robots', $page->meta_robots)

@section('content')
    <main class="with-bigger-section-spacing">

        @include('layouts.partials.page-header', [
            'h1' => $page->title,
            'desc' => $page->title_text,
            'header' => $page->file_header,
            'mb' => 100,
        ])

        <section class="s1">
            <div class="container">
                <div class="row row-gap-4">
                    <div class="col-12">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
