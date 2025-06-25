@extends('public.member_dashboard.dashboard_master')
@section('title', 'Boat | Details')
@php
    use App\Library\Enum;
@endphp
@section('member_content')

<div class="row ">
    <div class="col-md-12 content-area pt-3">

        <h2>Boat Details</h2>
        <hr>

        <div class="row">
        <div class="col-md-6 mb-4">
            <!-- Home Content -->
            <div class="card shadow-sm">
                <div class="card-body pt-sm-4">
                    <div class="text-center">
                        <div class="text-center boat-image">
                            <img src="{{ $boat->getImage() }}" alt="profile" class="img-thumbnail mb-2"
                            onclick="clickImage('{{ $boat->getImage() }}')" width="68%">
                        </div>
                        {{-- <div class="mb-3"> --}}
                            {{-- <h6>{{ $boat?->boat_name }}</h6>
                            <h5>{{$boat?->load('owner')?->owner?->full_name}}</h5>
                            <h6>{{ $boat?->skipper?->full_name }}</h6> --}}
                        {{-- </div> --}}
                    </div>
                    
                    @if ($showButton && $boat->status != Enum::BOAT_STATUS_SOLD && $boat->owner_id == authId())
                        <div class="text-center">
                            <a href="#" class="btn btn-sm btn-success py-1 px-2" onclick="confirmFormModal('{{ route('member.dashboard.boat.makeBoatSale', $boat->id) }}', 'Confirmation', 'Are you sure you want to Boat Sale?')"><i class="fas fa-money-bill"></i> Sale</a>
                        </div>
                    @else
                        <a href="#" style="visibility: hidden" class="btn btn-sm btn-success py-1 px-2"><i class="fas fa-money-bill"></i>Sale</a>
                    @endif
                </div>
            </div>
            <!-- End Home Content-->
            <div class="card shadow-sm mt-4">
                <div class="card-body">
                    <table class="table org-data-table table-bordered">
                        {{-- <thead>
                            <tr>
                                <th>Boat</th>
                                <th>Owner</th>
                                <th>Skipper</th>
                            </tr>
                        </thead> --}}
                        <tbody>
                            <tr>
                                <td style="width: 50px">Boat</td>
                                <td class="text-start text-wrap">{{ $boat?->boat_name }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50px">Owner</td>
                                <td class="text-start text-wrap">{{$boat?->load('owner')?->owner?->full_name}}</td>
                            </tr>
                            <tr>
                                <td style="width: 50px">Skipper</td>
                                <td class="text-start text-wrap">{{ $boat?->skipper?->full_name }}</td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td>{{ Enum::getBoatType($boat->type) ?? 'N/A' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table org-data-table table-bordered">
                        <tbody>
                            {{-- <tr>
                                <td>Boat Name</td>
                                <td>{{ $boat->boat_name }}</td>
                            </tr> --}}
                            {{-- <tr>
                                <td> Registration Number </td>
                                <td> {{ $boat->registration_number }} </td>
                            </tr> --}}

                            {{-- <tr>
                                <td>Skipper</td>
                                <td>{{ $boat?->skipper?->full_name }}</td>
                            </tr> --}}
                            {{-- <tr>
                                <td>Type</td>
                                <td>{{ Enum::getBoatType($boat->type) ?? 'N/A' }}</td>
                            </tr> --}}
                            <tr>
                                <td>Size</td>
                                <td class="text-wrap">{{ $boat->size ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>Make</td>
                                <td class="text-wrap">{{ $boat->make ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>Motor</td>
                                <td class="text-wrap">{{ $boat->motor ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>Fuel Type</td>
                                <td class="text-wrap">{{ Enum::getBoatFuelType($boat->fuel_type) ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>Color</td>
                                <td class="text-wrap">{{ $boat->color ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>Safety Equipment</td>
                                <td class="text-wrap">{{ $boat->safety_equipment ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>Call Sign</td>
                                <td class="text-wrap">{{ $boat->call_sign ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>Operator</td>
                                <td class="text-wrap">{{ $boat?->operator->full_name }}</td>
                            </tr>

                            <tr>
                                <td>Created At</td>
                                <td class="text-wrap">{{ getFormattedDateTime($boat->created_at) }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            {{-- <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="card-title">Boat Note</h4>
                </div>
                <div class="card-body py-sm-4">
                    @if($boat->note)
                    <p>{{ $boat->note }}</p>
                    @else
                    <p class="text-center">No data</p>
                    @endif
                </div>
            </div>
            <div class="card shadow-sm mt-4">
                <div class="card-header">
                    <h4 class="card-title">Short Description</h4>
                </div>
                <div class="card-body py-sm-4">
                    @if($boat->short_description)
                    <p>{{ $boat->short_description }}</p>
                    @else
                    <p class="text-center">No data</p>
                    @endif
                </div>
            </div> --}}
            <div class="card shadow-sm  mt-4">
                <div class="card-header">
                    <h4 class="card-title">Description</h4>
                </div>
                <div class="card-body">
                    @if($boat->description)
                    <p>{!! $boat->description !!}</p>
                    @else
                    <p class="text-center">No data</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@include('public.components.preview-image')
@endsection