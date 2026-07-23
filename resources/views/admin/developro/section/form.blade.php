@extends('admin.layout')
@section('meta_title', '- '.$cardTitle)

@section('content')
    @if(Route::is('admin.developro.investment.section.edit'))
        <form method="POST" action="{{route('admin.developro.investment.section.update', [$investment, $entry])}}" enctype="multipart/form-data">
            @method('PUT')
            @else
                <form method="POST" action="{{route('admin.developro.investment.section.store', $investment)}}" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="container">
                        <div class="card-head container">
                            <div class="row">
                                <div class="col-12 pl-0">
                                    <h4 class="page-title"><i class="fe-home"></i><a href="{{route('admin.developro.investment.index')}}">Inwestycje</a><span class="d-inline-flex me-2 ms-2">/</span><a href="{{route('admin.developro.investment.section.index', $investment)}}">{{$investment->name}}: Sekcje opisu inwestycji</a><span class="d-inline-flex me-2 ms-2">/</span>{{ $cardTitle }}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            @include('form-elements.back-route-button')
                            <div class="card-body control-col12">
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-select', [
                                        'label' => 'Typ sekcji',
                                        'name' => 'type',
                                        'selected' => $entry->type,
                                        'select' => [
                                            1 => 'Pełna szerokość',
                                            2 => 'Tekst z lewej, obrazek z prawej',
                                            3 => 'Tekst z prawej, obrazek z lewej'
                                        ]
                                    ])
                                </div>

                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Tytuł', 'name' => 'title', 'value' => $entry->title])
                                </div>

                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Sub-tytuł', 'name' => 'subtitle', 'value' => $entry->subtitle])
                                </div>

                                <div id="imageSize" class="row w-100 form-group">
                                    @include('form-elements.html-input-file', [
                                        'label' => 'Zdjęcie',
                                        'sublabel' => 'Wymiary obrazka',
                                        'name' => 'file',
                                        'file' => $entry->file,
                                        'file_preview' => config('images.investment.section_preview_file_path')
                                    ])
                                </div>

                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Alt dla obrazka', 'name' => 'file_alt', 'value' => $entry->file_alt])
                                </div>

                                <div class="row w-100 form-group">
                                    @include('form-elements.html-select', ['label' => 'Ilość kolumn w treści', 'name' => 'columns', 'selected' => $entry->columns, 'select' => [1 => '1', 2 => '2']])
                                </div>

                                <div class="row w-100 form-group">
                                    @include('form-elements.textarea-fullwidth', ['label' => 'Treść', 'name' => 'content', 'value' => $entry->content, 'rows' => 11, 'class' => 'tinymce'])
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="investment_id" value="{{$investment->id}}">
                    @include('form-elements.submit', ['name' => 'submit', 'value' => 'Zapisz'])
                </form>
                @include('form-elements.tintmce')
                @endsection
                @push('scripts')
                    <script>
                        document.addEventListener("DOMContentLoaded", updateSpan);
                        document.getElementById("typeSelect").addEventListener("change", updateSpan);

                        function updateSpan() {
                            const value = document.getElementById("typeSelect").value;
                            const span = document.querySelector("#imageSize span");

                            switch (value) {
                                case "1":
                                    span.textContent = "Szerokość obrazka: 1380px";
                                    break;
                                case "2":
                                    span.textContent = "Szerokość obrazka: 1024px";
                                    break;
                                case "3":
                                    span.textContent = "Szerokość obrazka: 1024px";
                                    break;
                                default:
                                    span.textContent = "Brak opcji";
                            }
                        }
                    </script>
        @endpush
