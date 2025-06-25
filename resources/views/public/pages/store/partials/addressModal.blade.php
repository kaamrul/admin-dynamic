
<!-- Add address modal box start -->
<div class="modal fade theme-modal" id="add-address" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Add a new address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('checkout.address.create') }}" enctype="multipart/form-data"
                    class="client-signup-form">
                    @csrf
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group @error('home_street_address') error @enderror">
                                <input type="text" class="form-control" name="home_street_address"
                                    placeholder="{{ __('Street Name & Number ') }}" id="homeStreetAddress"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group @error('home_suburb') error @enderror">
                                <input type="text" class="form-control" name="home_suburb"
                                    placeholder="{{ __('Suburb') }}" id="homeSubRoad">
                            </div>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="form-group @error('home_city') error @enderror">
                                <input type="text" class="form-control" name="home_city"
                                    id="homeCity" placeholder="{{ __('City') }}">
                            </div>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="form-group @error('home_post_code') error @enderror">
                                <input type="number" class="form-control" name="home_post_code"
                                    id="homePostCode"
                                    placeholder="{{ __('Post Code') }}">
                            </div>
                        </div>

                        {{-- <div class="col-sm-6 mt-3">
                            <div class="form-group @error('home_latitude') error @enderror">
                                <input type="number" class="form-control" name="home_latitude"
                                    step="0.00001"
                                    placeholder="{{ __('Latitude (optional)') }}" id="homeLatitude">
                            </div>
                        </div>

                        <div class="col-sm-6 mt-3">
                            <div class="form-group @error('home_longitude') error @enderror">
                                <input type="number" class="form-control" name="home_longitude"
                                    step="0.00001"
                                    placeholder="{{ __('Longitude (optional)') }}" id="homeLoggitude">
                            </div>
                        </div> --}}
                    </div>
                    <button class="btn btn-md mt-3 border" style="background-color: #000; color: #ffffff;">Add Address</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add address modal box end -->
