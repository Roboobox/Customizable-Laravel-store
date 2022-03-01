<x-layout body-class="order">

    <x-slot name="customCss">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">
    </x-slot>

    <x-slot name="main">

        <div class="page-content mb-10 pb-2">
            <div class="container">
                <div class="order-success text-center font-weight-bolder text-dark">
                    <i class="fas fa-check"></i>
                    Thank you. Your order has been received.
                </div>
                <!-- End of Order Success -->

                <ul class="order-view list-style-none">
                    <li>
                        <label>Order number</label>
                        <strong>945</strong>
                    </li>
                    <li>
                        <label>Status</label>
                        <strong>On hold</strong>
                    </li>
                    <li>
                        <label>Date</label>
                        <strong>April 27, 2021</strong>
                    </li>
                    <li>
                        <label>Total</label>
                        <strong>$1,646.36</strong>
                    </li>
                    <li>
                        <label>Payment method</label>
                        <strong>Direct bank transfor</strong>
                    </li>
                </ul>
                <!-- End of Order View -->

                <x-order-details>

                </x-order-details>

                <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-back mt-6"><i class="w-icon-long-arrow-left"></i>Back To List</a>
            </div>
        </div>

    </x-slot>

    <x-slot name="scripts">
        <script src="{{ asset('assets/vendor/sticky/sticky.js') }}"></script>
    </x-slot>

</x-layout>
