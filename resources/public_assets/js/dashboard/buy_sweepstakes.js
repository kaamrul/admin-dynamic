
// Buy Sweepstake
const buySweepstakes = "#buySweepstakes";
window.buySweepstakes = function ()
{
    $(buySweepstakes).modal('show');
}

document.getElementById('buySweepstakesForm').addEventListener('submit', function (e) {
    // Get all the selected sweepstake checkboxes
    const checkboxes = document.querySelectorAll('.sweepstake-checkbox');
    let isAnySelected = false;
    let totalAmount = 0;

    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            isAnySelected = true;
            totalAmount += parseFloat(checkbox.dataset.amount || 0);
        }
    });

    // Prevent form submission if no checkbox is selected or totalAmount <= 0
    if (!isAnySelected || totalAmount <= 0) {
        e.preventDefault(); // Prevent form submission
        alert('Please select at least one sweepstake and ensure the total amount is greater than 0.');
    }
});

// Update total amount dynamically when checkboxes are clicked
document.querySelectorAll('.sweepstake-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        let totalAmount = 0;
        document.querySelectorAll('.sweepstake-checkbox:checked').forEach(selectedCheckbox => {
            totalAmount += parseFloat(selectedCheckbox.dataset.amount || 0);
        });

        // Update the total amount display
        document.getElementById('totalAmount').value = totalAmount;
    });
});