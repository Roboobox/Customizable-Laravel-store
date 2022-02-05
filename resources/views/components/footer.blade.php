@props(['storeSettings'])
<!-- Start of Footer -->
<footer class="footer appear-animate" data-animation-options="{
            'name': 'fadeIn'
        }">
    <div class="footer-newsletter bg-primary">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="icon-box icon-box-side text-white">
                        <div class="icon-box-icon d-inline-flex">
                            <i class="w-icon-envelop3"></i>
                        </div>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-white text-uppercase font-weight-bold">Subscribe To
                                Our Newsletter</h4>
                            <p class="text-white">Get all the latest information on Events, Sales and Offers.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">
                    <form action="#" method="get"
                          class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                        <input type="email" class="form-control mr-2 bg-white" name="email" id="email"
                               placeholder="Your E-mail Address" />
                        <button class="btn btn-dark btn-rounded" type="submit">Subscribe<i
                                class="w-icon-long-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer-bottom">
            <div class="footer-left">
{{--                TODO : Add company name var--}}
                <p class="copyright">Company name</p>
            </div>
            <div class="footer-right">
                <div class="social-icons social-icons-colored">
                    @if($storeSettings->get('soc_facebook'))
                    <a href="{{ $storeSettings->get('soc_facebook')->value }}" target="_blank" class="social-icon social-facebook w-icon-facebook"></a>
                    @endif
                    @if($storeSettings->get('soc_twitter'))
                    <a href="{{ $storeSettings->get('soc_twitter')->value }}" target="_blank" class="social-icon social-twitter w-icon-twitter"></a>
                    @endif
                    @if($storeSettings->get('soc_instagram'))
                    <a href="{{ $storeSettings->get('soc_instagram')->value }}" target="_blank" class="social-icon social-instagram w-icon-instagram"></a>
                    @endif
                    @if($storeSettings->get('soc_youtube'))
                    <a href="{{ $storeSettings->get('soc_youtube')->value }}" target="_blank" class="social-icon social-youtube w-icon-youtube"></a>
                    @endif
                    @if($storeSettings->get('soc_pinterest'))
                    <a href="{{ $storeSettings->get('soc_pinterest')->value }}" target="_blank" class="social-icon social-pinterest w-icon-pinterest"></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End of Footer -->
