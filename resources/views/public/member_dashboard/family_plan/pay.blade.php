@extends('public.member_dashboard.dashboard_master')

<style>
    #amount {
        background: #dddddd;
    }
</style>

@section('member_content')
<div class="row">
    <div class="col-md-12 content-area">
        <h2>Pay</h2>
        <hr>

        <div class="row">
            <div class="col-md-12">
                <form method="get" action="{{ route('public.member.dashboard.payment.index') }}" class="php-email-form" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row @error('membership_id') error @enderror">
                        <label class="col-sm-3 col-form-label required" for="name">{{ __('Membership Type') }}</label>
                        <div class="col-sm-9">
                            <select id="memberType" class="form-control" name="membership_id" required >
                                <option value="" class="selected highlighted">Select One</option>
                                @foreach($membership_types as $key => $data)
                                    <option value="{{ $data->id }}" {{ ( old("membership_id", $data->id) == Auth::user()->membership->id ) ? "selected" : "" }} data-params="{{ $data->amount }}">
                                        {{ $data->type }}</option>
                                @endforeach
                            </select>

                            @error('membership_id')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row @error('amount') error @enderror">
                        <label class="col-sm-3 col-form-label required"> {{ __('Amount ($)') }}</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="amount" id="amount" step="0.01"
                                value="{{ old('amount', $due) }}" placeholder="{{ __('Write Amount') }}" required readonly>

                            @error('amount')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row @error('note') error @enderror">
                        <label class="col-sm-3 col-form-label"> {{ __('Notes') }} </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="note" id="note" rows="4"></textarea>
                            @error('note')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <button class="btn btn-success btn-md btn-block" style="font-size: 16px;" type="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection



@push('scripts')


<script type="text/javascript">

    $('#memberType').on('change', function() {
        var params = $(this).children(':selected').data('params');
        $("#amount").val(params);
    });

</script>
@endpush
