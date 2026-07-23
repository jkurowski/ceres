@props([
    'sectionTitle' => null,
    'sectionSubTitle' => null,
    'columns' => null,
    'content' => null,
    'imgAlt' => null,
    'imgSrc' => null,
])

<section class="section-header">
    <div class="container">
        <div class="row">
            <div class="col-6 d-flex align-items-center justify-content-center">
                <div class="section-header-content pe-xl-5">
                    @if($sectionSubTitle)
                        <h2><img src="https://ceres.test/img/square-point.svg" alt=""> {{ $sectionSubTitle }}</h2>
                    @endif
                    <h3>{!! $sectionTitle !!}</h3>
                    <div class="column-{{ $columns }}">
                        {!! $content !!}
                    </div>
                </div>
            </div>
            <div class="col-6">
                <img
                    src="{{ $imgSrc }}"
                    alt="{{ $imgAlt }}"
                    class="radius-8"
                >
            </div>
        </div>
    </div>
</section>
