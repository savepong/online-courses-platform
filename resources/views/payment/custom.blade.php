@section('style')
    <!-- Datepicker -->
    <link rel="stylesheet" href="{{ asset('learnplus/assets/css/bootstrap-datepicker.css') }}">

    <!-- Touchspin -->
    <link rel="stylesheet" href="{{ asset('learnplus/assets/css/bootstrap-touchspin.css') }}">

    <!-- Jasny -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">

    <style>
        .thumbnail-preview>img {
            max-height: 100%;
            margin-left: auto !important;
            margin-right: auto !important;
            display: block !important;
        }
    </style>
@endsection 

@section('script')
    <!-- Vendor JS -->
    <script src="{{ asset('learnplus/assets/vendor/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('learnplus/assets/vendor/bootstrap-datepicker.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>

    <!-- Init -->
    <script src="{{ asset('learnplus/assets/js/touchspin.js') }}"></script>

    <script>
        $('#paymentDate').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection