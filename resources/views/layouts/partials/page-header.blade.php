@props(['h1' => '', 'pageDesc' => '', 'desc' => '', 'header' => '', 'class' => '', 'page' => null, 'header_file' => '', 'heading' => ''])
<section id="pageheader" class="p-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-header {{$class}}">
                    <div class="page-heager-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="/">Strona główna</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{ $h1 ?: $heading }}
                                </li>
                            </ol>
                        </nav>
                        <h1>{{ $h1 ?: $heading }}</h1>
                        <p>{{ $pageDesc ?: $desc }}</p>
                        @if (request()->routeIs('contact'))
                        <div class="d-flex w-100 gap-4">
                            <button type="submit" class="bttn bttn-sm bttn-brown d-inline-flex bttn-arrow mt-5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.86 19.86 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.86 19.86 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.12.89.34 1.76.66 2.59a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.49-1.23a2 2 0 0 1 2.11-.45c.83.32 1.7.54 2.59.66A2 2 0 0 1 22 16.92z"/></svg> Zadzwoń</button>
                            <button type="submit" class="bttn bttn-sm bttn-brown-outline d-inline-flex bttn-arrow mt-5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 7 9-7"/></svg> Napisz</button>
                        </div>
                        @endif
                    </div>

                    <img src="{{ $header ?: ($header_file ? asset('img/'.$header_file) : '') }}" alt="" width="1920" height="600" class="radius-8">
                </div>
            </div>
        </div>
    </div>
</section>
