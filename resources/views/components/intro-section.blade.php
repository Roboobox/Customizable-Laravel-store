@props(['banner'])
<section class="intro-section">
    <div class="swiper-container swiper-theme nav-inner pg-inner swiper-nav-lg animation-slider pg-xxl-hide nav-xxl-show nav-hide"
         data-swiper-options="{
        'slidesPerView': 1,
        'autoplay': {
            'delay': 8000,
            'disableOnInteraction': false
        }
    }">
        <div class="swiper-wrapper">
            <div class="swiper-slide banner banner-fixed intro-slide intro-slide1"
                 style="background-image: url({{ asset('assets/images/store/banners/' . ($banner->background_file ?? '')) }}); background-color: #ebeef2;">
                <div class="container">
                    <figure class="slide-image skrollable slide-animate">
                        <img src="{{ asset('assets/images/store/banners/' . ($banner->photo_file ?? '')) }}" alt="Banner"
                             data-bottom-top="transform: translateY(10vh);"
                             data-top-bottom="transform: translateY(-10vh);" width="474" height="397">
                    </figure>
                    <div class="banner-content y-50 text-right slide-animate">
                        <div class="intro-banner d-flex justify-content-end" data-animation-options="{'name': 'fadeInRightShorter','duration': '1s','delay': '.2s'}">
                            <div style="width: 380px">
                                {!! $banner->content ?? '' !!}
                            </div>
                        </div>

                        <a href="{{ route('products') }}" class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"
                           data-animation-options="{
                            'name': 'fadeInRightShorter',
                            'duration': '1s',
                            'delay': '.8s'
                            }">
                            SHOP NOW<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
