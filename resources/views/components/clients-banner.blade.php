@props(['clients'])

<h2 class="title title-underline mb-4 mt-10 ls-normal appear-animate">Our Clients</h2>
<div class="swiper-container swiper-theme brands-wrapper mb-9 appear-animate" data-swiper-options="{
        'spaceBetween': 0,
        'slidesPerView': 2,
        'breakpoints': {
            '576': {
                'slidesPerView': 3
            },
            '768': {
                'slidesPerView': 4
            },
            '992': {
                'slidesPerView': 5
            },
            '1200': {
                'slidesPerView': 6
            }
        }
    }">
    <div class="swiper-wrapper row gutter-no cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">
{{--        <div class="swiper-slide brand-col">--}}
{{--            <figure class="brand-wrapper">--}}
{{--                <img src="{{ asset('assets/images/demos/demo1/brands/1.png') }}" alt="Brand" width="410"--}}
{{--                     height="186" />--}}
{{--            </figure>--}}
{{--            <figure class="brand-wrapper">--}}
{{--                <img src="{{ asset('assets/images/demos/demo1/brands/2.png') }}" alt="Brand" width="410"--}}
{{--                     height="186" />--}}
{{--            </figure>--}}
{{--        </div>--}}
        @php
        $loopOdd = false;
        @endphp
        @foreach($clients as $client)
            @if($loop->odd)
                <div class="swiper-slide brand-col">
                    <figure class="brand-wrapper">
                        <a href="{{ $client->site }}" target="_blank">
                            <img src="{{ $client->logo }}" alt="{{ $client->name }}" width="410" height="186" />
                        </a>
                    </figure>
            @else
                    <figure class="brand-wrapper">
                        <a href="{{ $client->site }}" target="_blank">
                            <img src="{{ $client->logo }}" alt="{{ $client->name }}" width="410" height="186" />
                        </a>
                    </figure>
                </div>
            @endif
            @php
                $loopOdd = $loop->odd
            @endphp
        @endforeach

        @if($loopOdd)
            </div>
        @endif

{{--        <div class="swiper-slide brand-col">--}}
{{--            <figure class="brand-wrapper">--}}
{{--                <img src="{{ asset('assets/images/demos/demo1/brands/1.png') }}" alt="Brand" width="410"--}}
{{--                     height="186" />--}}
{{--            </figure>--}}
{{--            <figure class="brand-wrapper">--}}
{{--                <img src="{{ asset('assets/images/demos/demo1/brands/2.png') }}" alt="Brand" width="410"--}}
{{--                     height="186" />--}}
{{--            </figure>--}}
{{--        </div>--}}
{{--        <div class="swiper-slide brand-col">--}}
{{--            <figure class="brand-wrapper">--}}
{{--                <img src="{{ asset('assets/images/demos/demo1/brands/3.png') }}" alt="Brand" width="410"--}}
{{--                     height="186" />--}}
{{--            </figure>--}}
{{--            <figure class="brand-wrapper">--}}
{{--                <img src="{{ asset('assets/images/demos/demo1/brands/4.png') }}" alt="Brand" width="410"--}}
{{--                     height="186" />--}}
{{--            </figure>--}}
{{--        </div>--}}
{{--        <div class="swiper-slide brand-col">--}}
{{--            <figure class="brand-wrapper">--}}
{{--                <img src="{{ asset('assets/images/demos/demo1/brands/5.png') }}" alt="Brand" width="410"--}}
{{--                     height="186" />--}}
{{--            </figure>--}}
{{--            <figure class="brand-wrapper">--}}
{{--                <img src="{{ asset('assets/images/demos/demo1/brands/6.png') }}" alt="Brand" width="410"--}}
{{--                     height="186" />--}}
{{--            </figure>--}}
{{--        </div>--}}
{{--        <div class="swiper-slide brand-col">--}}
{{--            <figure class="brand-wrapper">--}}
{{--                <img src="{{ asset('assets/images/demos/demo1/brands/7.png') }}" alt="Brand" width="410"--}}
{{--                     height="186" />--}}
{{--            </figure>--}}
{{--            <figure class="brand-wrapper">--}}
{{--                <img src="{{ asset('assets/images/demos/demo1/brands/8.png') }}" alt="Brand" width="410"--}}
{{--                     height="186" />--}}
{{--            </figure>--}}
{{--        </div>--}}
{{--        <div class="swiper-slide brand-col">--}}
{{--            <figure class="brand-wrapper">--}}
{{--                <img src="{{ asset('assets/images/demos/demo1/brands/9.png') }}" alt="Brand" width="410"--}}
{{--                     height="186" />--}}
{{--            </figure>--}}
{{--            <figure class="brand-wrapper">--}}
{{--                <img src="{{ asset('assets/images/demos/demo1/brands/10.png') }}" alt="Brand" width="410"--}}
{{--                     height="186" />--}}
{{--            </figure>--}}
{{--        </div>--}}
{{--        <div class="swiper-slide brand-col">--}}
{{--            <figure class="brand-wrapper">--}}
{{--                <img src="{{ asset('assets/images/demos/demo1/brands/11.png') }}" alt="Brand" width="410"--}}
{{--                     height="186" />--}}
{{--            </figure>--}}
{{--            <figure class="brand-wrapper">--}}
{{--                <img src="{{ asset('assets/images/demos/demo1/brands/12.png') }}" alt="Brand" width="410"--}}
{{--                     height="186" />--}}
{{--            </figure>--}}
{{--        </div>--}}
    </div>
</div>
