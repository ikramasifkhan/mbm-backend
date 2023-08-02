<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url()->to('/') }}">

    {{-- <link rel="icon" sizes="16x16" href="{{ \Illuminate\Support\Facades\Storage::url($favicon) }}" /> --}}

    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/ui.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/toastr.css') }}">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">

    @yield('head')

    @stack('css')

</head>

<body style="scroll-behavior: smooth;">



    <div id="app">
        <flash-wrapper ref='flashes'></flash-wrapper>

        @include ('admin.layout.navbar')

        @include ('admin.layout.sidebar')



        <div class="content-container"
            :class="isMenuOpen ? 'padding-container-navbar-expand' : 'padding-container-navbar-not-expand'">
            @yield('content')
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('admin/js/jquery-3.7.0.min.js') }}"></script>


    <script type="text/javascript" src="{{ asset('admin/js/admin.js') }}"></script>

    <script type="text/javascript" src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('admin/js/toastr.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('admin/js/ui.js') }}"></script>

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>

    <script>
        //sweetalert 2
        $(document).ready( function (){
          // layout theme change
          $(document).on('click', '.confirm-text', function (event) {
            var form = $(this).closest("form");
            // var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, delete it!',
              customClass: {
                confirmButton: 'btn btn-primary mr-1',
                cancelButton: 'btn btn-danger ml-1'
              },
              buttonsStyling: false
            }).then(function (result) {
              if (result.value) {
                if (result.isConfirmed) {
                  form.submit();
                }
              }
            });
          });
        })
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    {!! Toastr::message() !!}

    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', function() {
            moveDown = 60;
            moveUp = -60;
            count = 0;
            countKeyUp = 0;
            pageDown = 60;
            pageUp = -60;
            scroll = 0;

            listLastElement = $('.menubar li:last-child').offset();

            if (listLastElement) {
                lastElementOfNavBar = listLastElement.top;
            }

            navbarTop = $('.navbar-left').css("top");
            menuTopValue = $('.navbar-left').css('top');
            menubarTopValue = menuTopValue;

            documentHeight = $(document).height();
            menubarHeight = $('ul.menubar').height();
            navbarHeight = $('.navbar-left').height();
            windowHeight = $(window).height();
            contentHeight = $('.content').height();
            innerSectionHeight = $('.inner-section').height();
            gridHeight = $('.grid-container').height();
            pageContentHeight = $('.page-content').height();

            if (menubarHeight <= windowHeight) {
                differenceInHeight = windowHeight - menubarHeight;
            } else {
                differenceInHeight = menubarHeight - windowHeight;
            }

            if (menubarHeight > windowHeight) {
                document.addEventListener("keydown", function(event) {
                    if ((event.keyCode == 38) && count <= 0) {
                        count = count + moveDown;

                        $('.navbar-left').css("top", count + "px");
                    } else if ((event.keyCode == 40) && count >= -differenceInHeight) {
                        count = count + moveUp;

                        $('.navbar-left').css("top", count + "px");
                    } else if ((event.keyCode == 33) && countKeyUp <= 0) {
                        countKeyUp = countKeyUp + pageDown;

                        $('.navbar-left').css("top", countKeyUp + "px");
                    } else if ((event.keyCode == 34) && countKeyUp >= -differenceInHeight) {
                        countKeyUp = countKeyUp + pageUp;

                        $('.navbar-left').css("top", countKeyUp + "px");
                    }
                });

                $("body").css({
                    minHeight: $(".menubar").outerHeight() + 100 + "px"
                });

                window.addEventListener('scroll', function() {
                    documentScrollWhenScrolled = $(document).scrollTop();

                    if (documentScrollWhenScrolled <= differenceInHeight + 200) {
                        $('.navbar-left').css('top', -documentScrollWhenScrolled + 60 + 'px');
                        scrollTopValueWhenNavBarFixed = $(document).scrollTop();
                    }
                });
            }
        });
    </script>

    @stack('scripts')

    <div class="modal-overlay"></div>

</body>

</html>
