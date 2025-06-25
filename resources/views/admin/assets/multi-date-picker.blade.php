@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.multidatespicker.css') }}">
@endpush


@push('scripts')
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.multidatespicker.js') }}"></script>

    <script type="text/javascript">

        function initMultiDatesPicker() {
            var selectedDates = [];
            const dayPrice = {{ settings('walks_rate') ?? 20 }}; // Price per day in USD

            var hour = new Date().getHours();
            var minSelectableDate = (hour > 7) ? +1 : -1;
    
            $('#mdp-demo').multiDatesPicker({
                minDate: minSelectableDate,
                dateFormat: "yy-mm-dd",
                altField: '#altField',

                beforeShowDay: function(date) {
                    var currentDate = new Date(date);
                    var formattedDate = $.datepicker.formatDate('yy-mm-dd', date);

                    // Disable Saturday (6) and Sunday (0)
                    if (currentDate.getDay() === 0 || currentDate.getDay() === 6) {
                        return [false, '', 'Weekend disabled'];
                    }

                    // Disable holidays
                    if (holidayDates.includes(formattedDate)) {
                        return [false, '', 'Holiday disabled'];
                    }

                    if (startDate && endDate) {
                        var start = new Date(startDate);
                        var end = new Date(endDate);
                        var currentDate = new Date(formattedDate);

                        // Reset time to midnight (00:00:00)
                        start.setHours(0, 0, 0, 0);
                        end.setHours(23, 59, 59, 999); // Ensure end date is at the end of the day
                        currentDate.setHours(0, 0, 0, 0); // Reset currentDate to midnight

                        // Now compare without time
                        if (currentDate >= start && currentDate <= end) {
                            return [true, '', ''];
                        } else {
                            return [false, '', 'Out of session range'];
                        }
                    }

                    return [true, '', ''];
                },
                onSelect: function(dateText, inst) {
                    var selectedDate = dateText;
                    var sessionId = $('#session_id').val();

                    if (!sessionId) {
                        notify('Please select a session first.', 'error');

                        $('#mdp-demo').multiDatesPicker('removeDates', selectedDate);

                        return; 
                    }

                    if (selectedDates.includes(dateText)) {
                        selectedDates = selectedDates.filter(function(date) {
                            return date !== dateText;
                        });
                    } else {
                        selectedDates.push(selectedDate);
                    }

                    var remainingWalks = $('#remainingWalks').val();
                    if (selectedDates.length > remainingWalks) {
                        $('#payment_method option[value="wallet"]').prop('disabled', true);
                    } else {
                        $('#payment_method option[value="wallet"]').prop('disabled', false);
                    }

                    checkSelectedDates();
                    updateTotalAmount();
                    $('#recurringCount').val('');

                    // check date is available
                    $.ajax({
                        url: BASE_URL + '/bookings/check-date-availability',
                        type: 'GET',
                        data: { 
                            booking_date: selectedDate,
                            session_id: sessionId
                        },
                        success: function(response) {
                            if (response.isBooked) {
                                $('#mdp-demo').multiDatesPicker('removeDates', selectedDate);

                                notify('This date is already booked. Please select another date.', 'error');
                            }
                        },
                        error: function() {
                            notify('Unable to check availability. Please try again later.', 'error');
                        }
                    });

                    // checks if a date (or session) is available or already booked
                    var dogId = $('#dog_id').val();

                    $.ajax({
                        url: BASE_URL + '/bookings/dog-session-status',
                        type: 'GET',
                        data: { 
                            booking_date: selectedDate,
                            session_id: sessionId,
                            dog_id: dogId,
                        },
                        success: function(response) {                            
                            if (response.isBooked) {
                                $('#mdp-demo').multiDatesPicker('removeDates', selectedDate);

                                // Remove the date from selectedDates array
                                selectedDates = selectedDates.filter(function(date) {
                                    return date !== selectedDate;
                                });

                                updateTotalAmount();

                                notify('This date is already booked. Please select another date.', 'error');
                            }
                        },
                        error: function() {
                            notify('Unable to check availability. Please try again later.', 'error');
                        }
                    });
                },
            });

            function checkSelectedDates() {
                if (selectedDates.length < 2) {
                    return;
                }

                var weekStart = getWeekStart(selectedDates[0]);
                var weekEnd = getWeekEnd(selectedDates[0]);

                // Check if any selected date falls outside the first week's range
                var differentWeek = selectedDates.some(function(date) {
                    var currentDate = new Date(date);
                    var currentWeekStart = getWeekStart(currentDate);
                    var currentWeekEnd = getWeekEnd(currentDate);

                    return currentWeekStart.getTime() !== weekStart.getTime() || currentWeekEnd.getTime() !== weekEnd.getTime();
                });

                var allInSameWeek = selectedDates.every(function(date) {
                    var currentDate = new Date(date);
                    var currentWeekStart = getWeekStart(currentDate);

                    return currentWeekStart.getTime() === weekStart.getTime();
                });

                if (allInSameWeek) {
                    $('#isRecurringOpenClosed').prop('disabled', false);
                    $('#recurring_type option[value="weekly"]').prop('disabled', false);

                    // $('#recurringCountDiv').removeClass('d-none');
                } else {
                    $('#isRecurringOpenClosed').prop('disabled', true);
                    $('#recurring_type option[value="weekly"]').prop('disabled', true);

                    $('#recurringCountDiv').addClass('d-none');
                    $('#recurringCount').val('');
                }
            }

            // Helper function to get the start of the week (Sunday)
            function getWeekStart(date) {
                date = new Date(date);
                var start = new Date(date);
                start.setDate(date.getDate() - date.getDay());
                start.setHours(0, 0, 0, 0);

                return start;
            }

            // Helper function to get the end of the week (Saturday)
            function getWeekEnd(date) {
                date = new Date(date);
                var end = new Date(date);
                end.setDate(date.getDate() + (6 - date.getDay()));
                end.setHours(23, 59, 59, 999);

                return end;
            }

            // Function to update the total amount
            function updateTotalAmount() {                
                var totalDays = selectedDates.length; 
                var totalAmount = totalDays * dayPrice; 
                
                $('#amount').val(totalAmount); 
            }

            // If payment method is wallet, check if the selected date is within the purchase expiration date
            $('#payment_method').change(function() {
                var payment_method = $(this).val();

                if (payment_method === 'wallet') {
                    var customerId = $('#customer_id').val();

                    $.ajax({
                        url: BASE_URL + '/bookings/check-date-validity',
                        type: 'GET',
                        data: { 
                            booking_dates: selectedDates,
                            customer_id: customerId
                        },
                        success: function(response) {
                            if (!response.isValid) {
                                $('#mdp-demo').multiDatesPicker('removeDates', selectedDates);
                                selectedDates = [];
                                $('#payment_method').val('');
                                $('#payment_method').trigger('change');
                                $('#amount').val('');

                                notify('The selected date(s) are not within your purchase expiry range. Please select another date.', 'error');
                            }
                        },
                        error: function() {
                            notify('Unable to check date validity. Please try again later.', 'error');
                        }
                    });
                }
            });
        }

        $(document).ready(function() {
            initMultiDatesPicker();
        });

    </script>
    
@endpush
