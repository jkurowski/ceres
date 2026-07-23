@props([
    'sectionTitle' => null,
    'sectionSubTitle' => null,
    'columns' => null,
    'content' => null,
    'imgAlt' => null,
    'imgSrc' => null,
])

<section class="section-header pb-0 pb-xl-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header-content">
                    @if($sectionSubTitle)
                    <h2><img src="https://ceres.test/img/square-point.svg" alt=""> {{ $sectionSubTitle }}</h2>
                    @endif
                    <h3>{!! $sectionTitle !!}</h3>
                    <div class="column-{{ $columns }}">
                        {!! $content !!}
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5">
                <img
                    src="{{ $imgSrc }}"
                    alt="{{ $imgAlt }}"
                    class="radius-8"
                >
            </div>
        </div>
    </div>
</section>
