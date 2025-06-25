<!-- Add address modal box start -->
@foreach ($addresses as $address)
    <div class="modal fade theme-modal" id="update-address{{$address->id}}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Update Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('checkout.address.update', $address->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group @error('home_street_address') error @enderror">
                                    <input type="text" class="form-control" name="home_street_address"
                                        value="{{ old('home_street_address', $address?->home_street_address ) }}"
                                        placeholder="{{ __('Street Name & Number ') }}" id="homeStreetAddress"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group @error('home_suburb') error @enderror">
                                    <input type="text" class="form-control" name="home_suburb"
                                        value="{{ old('home_suburb', $address?->home_suburb ) }}"
                                        placeholder="{{ __('Suburb') }}" id="homeSubRoad">
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <div class="form-group @error('home_city') error @enderror">
                                    <input type="text" class="form-control" name="home_city"
                                        value="{{ old('home_city', $address?->home_city ) }}"
                                        id="homeCity" placeholder="{{ __('City') }}">
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <div class="form-group @error('home_post_code') error @enderror">
                                    <input type="number" class="form-control" name="home_post_code"
                                        id="homePostCode"
                                        value="{{ old('home_post_code', $address?->home_post_code ) }}"
                                        placeholder="{{ __('Post Code') }}">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-md mt-3 border" style="background-color: #000; color: #ffffff;">Update Address</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- Add address modal box end -->
