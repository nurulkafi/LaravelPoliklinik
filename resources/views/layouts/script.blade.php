    <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('vendors/apexcharts/apexcharts.js')}}"></script>
    @stack('dashboard')
    <script src="{{ asset('js/script.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    <script src="{{ asset('vendors/toastify/toastify.js') }}"></script>
    <script src="{{ asset('js/extensions/toastify.js') }}"></script>
    <script src="{{ asset('vendors/choices.js/choices.min.js') }}"></script>

    @stack('datatable')
    @stack('simditor')
