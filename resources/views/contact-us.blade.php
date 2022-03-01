<x-layout body-class="contact-us">

    <x-slot name="customCss">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">
    </x-slot>

    <x-slot name="main">
        <x-page-header>Contact us</x-page-header>

        <div class="page-content contact-us">
            <div class="container">
                <section class="content-title-section mb-10">
                    <h3 class="title title-center mb-3 mt-8">Contact Information</h3>
                    <p class="text-center">Lorem ipsum dolor sit amet,consecteturadipiscing elit, sed do eiusmod tempor incididunt ut</p>
                </section>

                <section class="contact-information-section mb-10">
                    <div class=" swiper-container swiper-theme " data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 1,
                            'breakpoints': {
                                '480': {
                                    'slidesPerView': 2
                                },
                                '768': {
                                    'slidesPerView': 3
                                },
                                '992': {
                                    'slidesPerView': 3
                                }
                            }
                        }">
                        <div class="swiper-wrapper row cols-xl-4 cols-md-3 cols-sm-2 cols-1">
                            @if($settings->get('email'))
                            <div class="swiper-slide icon-box text-center icon-box-primary">
                                    <span class="icon-box-icon icon-email">
                                        <i class="w-icon-envelop-closed"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">E-mail Address</h4>
                                    <p>{{ $settings->get('email')->value }}</p>
                                </div>
                            </div>
                            @endif
                            @if($settings->get('phone'))
                            <div class="swiper-slide icon-box text-center icon-box-primary">
                                    <span class="icon-box-icon icon-headphone">
                                        <i class="w-icon-headphone"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">Phone Number</h4>
                                    <p>{{ $settings->get('phone')->value }}</p>
                                </div>
                            </div>
                            @endif
                            @if($settings->get('address'))
                            <div class="swiper-slide icon-box text-center icon-box-primary">
                                    <span class="icon-box-icon icon-map-marker">
                                        <i class="w-icon-map-marker"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">Address</h4>
                                    <p>{{ $settings->get('address')->value }}</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </section>
                <!-- End of Contact Information section -->

                <hr class="divider mb-10 pb-1">

                <section class="contact-section">
                    <div class="row gutter-lg pb-3">
                        <div class="col-lg-6 mb-8">
                            <h4 class="title mb-3">People usually ask these</h4>
                            <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                                @foreach($questions as $question)
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse1" class="expand">{{ $question->question }}</a>
                                        </div>
                                        <div id="collapse1" class="card-body collapsed">
                                            <p class="mb-0">
                                                {{ $question->answer }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-6 mb-8">
                            <h4 class="title mb-3">Send Us a Message</h4>
                            @if(Session::has('contact-success'))
                            <div class="alert alert-success alert-simple alert-inline mb-3">
                                <h4 class="alert-title">Message successfully sent!</h4>
                            </div>
                            @endif
                            <form class="form contact-us-form" action="{{ route('contact-message') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Your Name</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                                           class="form-control{{ $errors->has('name') ? ' invalid' : ''}}">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email_1">Your Email</label>
                                    <input type="email" id="email_1" name="email" value="{{ old('email') }}"
                                           class="form-control{{ $errors->has('email') ? ' invalid' : ''}}">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="message">Your Message</label>
                                    <textarea id="message" name="message" cols="30" rows="5"
                                              class="form-control{{ $errors->has('message') ? ' invalid' : ''}}">{{ old('message') }}</textarea>
                                    @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded">Send Now</button>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- End of Contact Section -->

            </div>
        </div>
    </x-slot>

    <x-slot name="scripts">

    </x-slot>

</x-layout>
