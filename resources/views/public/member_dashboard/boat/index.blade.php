@extends('public.member_dashboard.dashboard_master')
@section('title', 'Boats')

@section('member_content')
<div class="row">
    <div class="col-md-12 content-area pt-3">
        <h2 style="margin: auto;">Boats
        </h2>
        <div class="mt-2 boat-tabs d-flex justify-content-between align-items-center">
            <div id="filterArea" class="d-inline-flex justify-content-start">
                <ul class="nav nav-pills nav-pills-success"  role="tablist" >
                    <li class="nav-item">
                        <a class="nav-link tab-menu active" href="#" onclick="filterStatus('my_boat', this)">My Boat</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="nav-link tab-menu" href="#" onclick="filterStatus('guest_boat', this)">Guest Boat</a>
                    </li>
                </ul>
            </div>
            <a class="btn btn2-secondary btn-sm add-btn add-boat" href="/member/dashboard/boats/create">Add Boat</a>
        </div>
        <hr>

        <div class="">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Boat Name</th>
                        <th>Skipper</th>
                        <th>Boat Type</th>
                        <th>Fuel Type</th>
                        <th width="250">Action</th>
                    </tr>
                </thead>
                <tbody id="boat-table">
                    @include('public.member_dashboard.boat.boat_rows', ['boats' => $boats])
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            window.filterStatus = function (status, element) {
                $('.tab-menu').removeClass('active');
                $(element).addClass('active');
                $('.add-btn').css('display', 'block');
                $.ajax({
                    url: '{{ route("member.dashboard.boat.index") }}',
                    method: 'GET',
                    data: { status: status },
                    success: function (response) {
                        $('#boat-table').html(response);
                    },
                    error: function () {
                        alert('Something went wrong!');
                    }
                });

                if (status == 'guest_boat') {
                    $('.add-btn').css('display', 'none');
                }
            };
        });
    </script>
@endpush