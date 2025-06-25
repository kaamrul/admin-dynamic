<!-- Modal -->
<div class="modal fade" id="buySweepstakes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    
    <form method="post" action="{{ route('member.dashboard.tournament.team.buy.sweepstakes', [$tournament_team->tournament->id, $tournament_team->id]) }}" enctype="multipart/form-data" id="buySweepstakesForm">
      @csrf

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="text-transform: capitalize"> {{ __('Buy Sweepstakes') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            
            <div class="w-100">

              @php
                $purchasedSweepstakeIds = $sweepstakeOrders
                                          ->flatMap(fn($order) => $order->OrderDetails->pluck('sweepstake.id'))
                                          ->toArray() ?? [];
              @endphp

              @foreach ($tournament_team?->tournament->sweepstakes->whereNotIn('id', $purchasedSweepstakeIds) ?? [] as $sweepstake)
                <label for="sweepstake1" class="w-100 angler-item" data-value="${selectedValue}">
                  <div class="w-100 d-flex align-items-center justify-content-between border p-2 mt-2 px-3">
                    <h5 class="m-0">{{ $sweepstake->name }}</h5>
                    <div class="d-flex align-items-center gap-4">
                      <p class="m-0 mr-2">${{ $sweepstake->amount }}</p>
                      <input type="checkbox" class="sweepstake sweepstake-checkbox"
                        data-amount="{{ $sweepstake->amount }}"
                        value="{{ $sweepstake->id }}" name="sweepstake_id[]"
                        id="sweepstake{{ $sweepstake->id }}">
                    </div>
                  </div>
                </label>
              @endforeach

            </div>
            <hr>

            <div class="mb-3 mt-4">
              <div class="form-group row @error('total_amount') error @enderror">
                <label class="col-sm-4 col-form-label required">{{ __('Total Amount') }}</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="total_amount"
                  id="totalAmount" value="{{ old('total_amount') }}"
                  placeholder="{{ __('0.00') }}" required readonly>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer justify-content-center pb-3">
          <button type="button" class="btn btn2-light-secondary mr-3" data-dismiss="modal"><i class="fas fa-times"></i> {{ __('Close') }}</button>
          <button class="btn btn2-secondary">Pay</button>
        </div>
      </div>
    </form>
  </div>
</div>
