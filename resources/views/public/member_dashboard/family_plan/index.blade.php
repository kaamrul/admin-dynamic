@extends('public.member_dashboard.dashboard_master')

@section('member_content')
<div class="row">
    <div class="col-md-12 content-area">
        <h4>Family Plan / Family Members</h4>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12" style="text-align: right">
                        <a href="/member/dashboard/family-plan/add-member" class="btn btn-md btn-success me-2">
                            Add Member
                        </a>

                        <a href="/member/dashboard/family-plan/create-member" class="btn btn-md btn-success me-2">
                            Create New Member
                        </a>
                    </div>
                </div>

                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered  align-middle">
                        <thead>
                            <tr class="text-center">
                                <th scope="col"> SN </th>
                                <th scope="col"> Name </th>
                                <th scope="col"> Age Group </th>
                                <th scope="col"> Purchased By </th>
                                {{-- <th scope="col"> Date </th>
                                <th scope="col"> Payment Status </th>--}}
                                <th scope="col"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($familyMembers as $key => $familyMember)
                            <tr class="text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                <th scope="row"> {{ ++$key }} </th>
                                <td>{{ $familyMember->load('member.user')->member?->user?->full_name }}</td>
                                <td>{{ $familyMember->member?->age_group }}</td>
                                <td>{{ $familyMember->load('purchasedBy.user')->purchasedBy?->user?->full_name }}</td>
                                <td class="text-center text-danger">
                                    <form action="{{ route('member.dashboard.family.member.delete') }}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $familyMember->id }}" />
                                        <button style="background: no-repeat; border: none;" type="submit"><span class="text-danger"><i class="fa fa-trash-alt"></i></span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!------------ End Div ---------->
    </div>
</div>
@endsection
