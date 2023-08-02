<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <title>@yield('page_title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="base-url" content="{{ url()->to('/') }}">

        <link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/ui.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/toastr.css') }}">
        <style>
            .container {
                text-align: center;
                position: absolute;
                width: 100%;
                height: 100%;
                display: table;
                z-index: 1;
                background: #F8F9FA;
            }
            .center-box {
                display: table-cell;
                vertical-align: middle;
            }
            .adjacent-center {
                width: 365px;
                display: inline-block;
                text-align: left;
            }

            .form-container .control-group .control {
                width: 100%;
            }

            h1 {
                font-size: 24px;
                font-weight: 600;
                margin-bottom: 30px;
            }

            .brand-logo {
                margin-bottom: 30px;
                text-align: center;
            }

            .footer {
                margin-top: 40px;
                padding: 0 20px;
            }

            .footer p {
                font-size: 14px;
                color: #8E8E8E;
                text-align: center;
            }

            .btn.btn-primary {
                width: 100%;
            }
        </style>

        @yield('css')

        {{-- {!! view_render_event('bagisto.admin.layout.head') !!} --}}
    </head>
    <body style="scroll-behavior: smooth;">
        <div id="app" class="container">

            <flash-wrapper ref='flashes'></flash-wrapper>

            <div class="center-box">

                <div class="adjacent-center">

                    <div class="brand-logo">
                        {{-- @if (core()->getConfigData('general.design.admin_logo.logo_image', core()->getCurrentChannelCode()))
                            <img src="{{ \Illuminate\Support\Facades\Storage::url(core()->getConfigData('general.design.admin_logo.logo_image', core()->getCurrentChannelCode())) }}" alt="{{ config('app.name') }}" style="height: 40px; width: 110px;"/>
                        @else
                            <img src="{{ asset('vendor/webkul/ui/assets/images/logo.png') }}" alt="{{ config('app.name') }}"/>
                        @endif --}}
                    </div>

                    {{-- {!! view_render_event('bagisto.admin.layout.content.before') !!} --}}

                    @yield('content')


                    {{-- {!! view_render_event('bagisto.admin.layout.content.after') !!} --}}

                    {{-- @if (core()->getConfigData('general.content.footer.footer_toggle'))
                        <div class="footer">
                            <p style="text-align: center;">
                                @if (core()->getConfigData('general.content.footer.footer_content'))
                                    {{ core()->getConfigData('general.content.footer.footer_content') }}
                                @else
                                    {!! trans('admin::app.footer.copy-right') !!}
                                @endif
                            </p>
                        </div>
                    @endif --}}
                </div>

            </div>

        </div>

        <script type="text/javascript" src="{{ asset('admin/js/jquery-3.7.0.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/webkul/admin/assets/js/admin.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>
        <script type="text/javascript" src="{{ asset('admin/js/toastr.min.js') }}"></script>
       

        {!! Toastr::message() !!}
        
        <div class="modal-overlay"></div>
    </body>
</html>