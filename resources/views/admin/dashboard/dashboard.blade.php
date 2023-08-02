@extends('admin.layout.master')

@section('title', 'Dashboard')

@section('content')
    <div class="content full-page dashboard">
        <div class="page-header">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>

            <div class="page-action">
                <div id="calender-destop">
                    <div class="control-group date">
                        <span>
                            <input type="text" id="start_date" value="2023-06-14" placeholder="From" class="control flatpickr-input">
                        </span>
                    </div>
                    <div class="control-group date">
                        <span>
                            <input type="text" id="end_date" value="2023-07-14" placeholder="To" class="control flatpickr-input">
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">

            <div class="dashboard-stats">

                <div class="dashboard-card">
                    <div class="title">
                        Total Customer
                    </div>
                    <a href="/">
                        <div class="data">
                            0
                            <span class="progress">
                                <span class="icon graph-down-icon"></span>
                            </span>
                        </div>
                    </a>
                </div>

                <div class="dashboard-card">
                    <div class="title">
                        TOTAL ORDERS
                    </div>
                    <a href="/">
                        <div class="data">
                            0
                            <span class="progress">
                                <span class="icon graph-down-icon"></span>
                            </span>
                        </div>
                    </a>
                </div>

                <div class="dashboard-card">
                    <div class="title">
                        TOTAL SALE
                    </div>

                    <div class="data">
                        0

                        <span class="progress">
                            <span class="icon graph-down-icon"></span>
                        </span>
                    </div>
                </div>

                <div class="dashboard-card">
                    <div class="title">
                        AVERAGE ORDER SALE
                    </div>

                    <div class="data">
                        0

                        <span class="progress">
                            <span class="icon graph-down-icon"></span>
                        </span>
                    </div>
                </div>

                <div class="dashboard-card">
                    <div class="title">
                        TOTAL UNPAID INVOICES
                    </div>

                    <div class="data">
                        0

                        <span class="progress">
                            <span class="icon graph-down-icon"></span>
                        </span>
                    </div>
                </div>

            </div>

            <div class="graph-stats">

                <div class="left-card-container graph">
                    <div class="card" style="overflow: hidden;">
                        <div class="card-title" style="margin-bottom: 30px;">
                            SALES
                        </div>

                        <div class="card-info" style="height: 100%;">

                            <canvas id="myChart" style="width: 100%; height: 87%"></canvas>

                        </div>
                    </div>
                </div>

                <div class="right-card-container category">
                    <div class="card">
                        <div class="card-title">
                            TOP PERFORMING CATEGORIES
                        </div>

                        <div class="card-info center">
                            <div class="no-result-found">

                                <i class="icon no-result-icon"></i>
                                <p>We could not find any records.</p>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop

@push('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
@endpush
