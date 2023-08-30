<!DOCTYPE html>
<html class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free" lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title> @yield('title', 'Pustakalaya') </title>

    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon"
        href="{{ $settings['fav_icon'] ? asset('admin/images/setting/' . $settings['fav_icon']) : asset('admin/images/logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <!-- fancybox image -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/jquery.fancybox.min.css') }}" type="text/css"
        media="screen" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/boxicons.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}" crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    <!-- Core CSS -->
    <link class="template-customizer-core-css" rel="stylesheet"
        href="{{ asset('admin/assets/vendor/css/core.css') }}" />
    <link class="template-customizer-theme-css" rel="stylesheet"
        href="{{ asset('admin/assets/vendor/css/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    {{-- dropify --}}
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <!-- Page CSS -->

    {{-- flat picker --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.css" />

    <!-- toastr -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/toastr.min.css') }}" />

    <script defer src="{{ asset('admin/assets/js/toastr.min.js') }}"></script>
    <!-- toastr ends-->

    <!-- Helpers -->
    <script src="{{ asset('admin/assets/vendor/js/helpers.js') }}"></script>

    <script src="{{ asset('admin/assets/js/config.js') }}"></script>

    <style>
        .select2-selection {
            height: 40px !important;
        }

        #toast-container>.toast-error,
        .toast-success {
            font-size: 15px;
        }

        @media print {
            body {
                background-color: white;
            }

            #noprint {
                display: none !important;
            }

            img {
                content: url("https://bookbank.com.np/frontend/assets/images/logo.png");
            }

            .invoice-info {
                margin-top: 3px;
            }

            .heading {
                margin-top: 15px;
            }

            h2 {
                font-size: 12px;
                font-weight: bold
            }

            .order {
                font-weight: 600
            }

            h3 {
                font-size: 14px;
                font-weight: bold
            }

            .seperater {
                margin-top: 50px;
            }

            h4 {
                font-size: 14px;
                font-weight: bold;
            }

            .invoice-form {
                margin-top: 30px;
            }

            .customer-name {
                margin-top: 30px;
            }

            .g-total {
                margin-left: 10px;
            }
        }
    </style>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layouts.admin.sidebar')
            <div class="layout-page">
                @include('layouts.admin.nav')
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    @include('layouts.admin.footer')
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>

        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('admin/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('admin/assets/js/dashboards-analytics.js') }}"></script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- CkEditor-->
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <!-- sweet alert -->
    <script src="{{ asset('admin/assets/js/sweetalert.min.js') }}"></script>
    <!-- sweet alert -->

    <!-- select2-->
    <link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet" />

    <script defer src="{{ asset('admin/assets/js/select2.min.js') }}"></script>

    <!-- fancybox image-->
    <script type="text/javascript" src="{{ asset('admin/assets/js/jquery.fancybox.min.js') }}"></script>

    {{-- dropify --}}
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>

    {{-- flat picker --}}
    <script src="{{ asset('admin/assets/js/flatpickr.js') }}"></script>

    <script src="{{ asset('admin/assets/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/typeahead.min.js') }}"></script>

    <script>
        var route = "{{ url('autocomplete-search') }}";
        $('.search-input').typeahead({
            source: function(query, process) {
                return $.get(route, {
                    query: query
                }, function(data) {
                    return process(data);
                });
            }
        });


        $(function() {
            $('.select2').select2({
                placeholder: "Select",
                allowClear: false
            });

            $(".flatpicker").flatpickr({
                dateFormat: "Y-m-d",
                altInput: true,
                // allowInput: true
            });

            $('.ckeditor').ckeditor();
        });
    </script>

    @yield('scripts')
</body>

</html>
