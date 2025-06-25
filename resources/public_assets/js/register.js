// public/js/script.js

document.addEventListener('DOMContentLoaded', function () {
    const steps = document.querySelectorAll('.step');
    const progressBarFill = document.querySelector('.progress-bar-fill');
    const formSections = document.querySelectorAll('.form-section');
    let currentStep = 0;
    var f_error = false;
    var l_error = false;
    var e_error = false;
    var p_error = false;
    var pc_error = false;
    var m_error = false;
    var dob_error = false;
    var cn_error = false;
    var ci_error = false;
    var n1_error = false;
    var n2_error = false;

    window.nextStep = function () {
        if (currentStep < steps.length - 1) {
            // first name
            if ($("#fname").val() == "") {
                $("#error-fname").text("Enter your first name.");
                $("#fname").addClass("box_error");
                f_error = true;
            } else {
                var fname = $("#fname").val();
                if (fname != fname) {
                    $("#error-fname").text("First name is required.");
                    f_error = true;
                } else {
                    // error = false;
                    $("#error-fname").text("");
                    $("#fname").removeClass("box_error");
                }
                if (!isNaN(fname)) {
                    $("#error-fname").text("Only characters are allowed.");
                    f_error = true;
                } else {
                    $("#fname").removeClass("box_error");
                    f_error = false;
                }
            }

            // last name
            if ($("#lname").val() == "") {
                $("#error-lname").text("Enter your last name.");
                $("#lname").addClass("box_error");
                l_error = true;
            } else {
                var lname = $("#lname").val();
                if (lname != lname) {
                    $("#error-lname").text("Last name is required.");
                    l_error = true;
                } else {
                    // error = false;
                    $("#error-lname").text("");
                    $("#lname").removeClass("box_error");
                }
                if (!isNaN(lname)) {
                    $("#error-lname").text("Only Characters are allowed.");
                    l_error = true;
                } else {
                    $("#lname").removeClass("box_error");
                    l_error = false;
                }
            }

            // email
            if ($("#email").val() == "") {
                $("#error-email").text("Please enter an email address.");
                $("#email").addClass("box_error");
                e_error = true;
            } else {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if (!emailReg.test($("#email").val())) {
                    $("#error-email").text("Please insert a valid email address.");
                    e_error = true;
                } else {
                    $("#error-email").text("");
                    $("#email").removeClass("box_error");
                    e_error = false;
                }
            }

            // phone
            if ($("#mobile").val() == "") {
                $("#error-mobile").text("Please enter an phone number.");
                $("#mobile").addClass("box_error");
                m_error = true;
            } else {
                var phoneReg = /^[0-9]+$/;
                var phone = $("#mobile").val();
                if (!phoneReg.test($("#mobile").val())) {
                    $("#error-mobile").text("Please insert a valid phone number.");
                    m_error = true;
                } else {
                    $("#error-mobile").text("");
                    $("#mobile").removeClass("box_error");
                }
                if (phone.length <= 7 || phone.length > 15) {
                    $("#error-mobile").text(
                        "Mobile number must be between 8 - 15 Digits only."
                    );
                    m_error = true;
                    $("#mobile").addClass("box_error");
                } else {
                    $("#mobile").removeClass("box_error");
                    m_error = false;
                }
            }

            // password
            if ($("#pass").val() == "") {
                $("#error-pass").text("Please enter a password.");
                $("#pass").addClass("box_error");
                p_error = true;
            }
            if ($("#cpass").val() == "") {
                $("#error-cpass").text("Please enter a confirm password.");
                $("#cpass").addClass("box_error");
                pc_error = true;
            } else {
                var pass = $("#pass").val();
                var cpass = $("#cpass").val();

                if (pass != cpass) {
                    $("#error-cpass").text("Please enter the same password as above.");
                    pc_error = true;
                } else {
                    $("#error-cpass").text("");
                    $("#pass").removeClass("box_error");
                    $("#cpass").removeClass("box_error");
                    p_error = false;
                    pc_error = false;
                }

                if (pass.length < 8 && cpass.length < 8) {
                    $("#error-pass").text("Password must be minimum 8 character.");
                    $("#pass").addClass("box_error");
                    p_error = true;
                } else {
                    $("#pass").removeClass("box_error");
                    p_error = false;
                }
            }

            // DOB
            let dob = document.getElementById("dob").value;
            if (dob == "" || dob == null) {
                $("#error-dob").text("Please enter your Date of Birth.");
                $("#dob").addClass("box_error");
                dob_error = true;
            } else {
                $("#error-dob").text("");
                $("#dob").removeClass("box_error");
                dob_error = false;
            }

            if ($('input[name="user_type"]:checked').val() == 'affiliated-club-member') {
                if ($("#affiliatedClub").val() == null) {
                    $("#error-cm").text("Please select club name.");
                    $("#affiliatedClub").addClass("box_error");
                    cn_error = true;
                } else {
                    $("#error-cm").text("");
                    $("#affiliatedClub").removeClass("box_error");
                    cn_error = false;
                }

                if ($("#clubName").val() == "") {
                    $("#error-cmi").text("Enter club member ID.");
                    $("#affiliatedClub").addClass("box_error");
                    ci_error = true;
                } else {
                    $("#error-cmi").text("");
                    $("#affiliatedClub").removeClass("box_error");
                    ci_error = false;
                }
            }

            if ($('input[name="user_type"]:checked').val() == 'member') {
                if ($("#searchBox1").val() == null || $("#searchBox1").val() == '') {
                    $("#error-n1").text("Please select nominee 1.");
                    $("#searchBox1").addClass("box_error");
                    n1_error = true;
                } else {
                    $("#error-n1").text("");
                    $("#searchBox1").removeClass("box_error");
                    n1_error = false;
                }

                if ($("#searchBox2").val() == null || $("#searchBox2").val() == '') {
                    $("#error-n2").text("Please select nominee 2.");
                    $("#searchBox2").addClass("box_error");
                    n2_error = true;
                } else {
                    $("#error-n2").text("");
                    $("#searchBox2").removeClass("box_error");
                    n2_error = false;
                }
            }

            if (!f_error && !l_error && !e_error && !p_error && !pc_error && !m_error && !dob_error && !cn_error && !ci_error && !n1_error && !n2_error) {
                formSections[currentStep].classList.remove('active');
                currentStep++;
                steps[currentStep].classList.add('active');
                formSections[currentStep].classList.add('active');
                updateProgressBar();
            }
        }
    };

    window.prevStep = function () {
        if (currentStep > 0) {
            steps[currentStep].classList.remove('active');
            formSections[currentStep].classList.remove('active');
            currentStep--;
            steps[currentStep].classList.add('active');
            formSections[currentStep].classList.add('active');
            updateProgressBar();
        }
    };

    function updateProgressBar() {
        const progress = (currentStep + 1) * 25;
        progressBarFill.style.width = `${progress}%`;
    }

    updateProgressBar();
});


$(document).ready(function() {
    $('input[type="checkbox"]').on('change', function() {
        if ($('#policy1').is(':checked') &&
            $('#policy2').is(':checked') &&
            $('#policy3').is(':checked')) {
            $('#submit').removeAttr('disabled');
        } else {
            $('#submit').attr('disabled', 'disabled');
        }
    });

    $("#affiliatedClub").select2({
        placeholder: "Select your club",
        allowClear: true
    });

    function toggleFields() {

        if ($('#affiliatedClubMember').is(':checked')) {
            $('#mbgfcMemberFields').hide();
            $('#affiliatedClubMemberFields').show();
        }
        else if($('#mbgfcMember').is(':checked')) {
            $('#affiliatedClubMemberFields').hide();
            $('#mbgfcMemberFields').show();
        }
        else{
            $('#mbgfcMemberFields').hide();
            $('#affiliatedClubMemberFields').hide();
        }
    }

    toggleFields();

    $('input[name="user_type"]').on('change', toggleFields);
});

$(document).ready(function() {
    let activeSearchBox = null;

    function searchMembers(query, searchBoxId) {
        activeSearchBox = searchBoxId;
        axios.get('/search-members', { params: { query: query } })
            .then(response => {
                const members = response.data;
                const searchResults = $('#searchResults');
                searchResults.empty();
                if (members.length > 0) {
                    members.forEach(member => {
                        searchResults.append(`<option value="${member.full_name} - ${member.id}">${member.full_name} - (${member.email} - ${member.user_name})</option>`);
                    });
                    $('#noResults').hide();
                } else {
                    $('#noResults').show();
                }
                $('#searchModal').modal('show');
            })
            .catch(error => {
                console.error('Error fetching members:', error);
                $('#noResults').show();
                $('#searchModal').modal('show');
            });
    }

    $('#searchBtn1').on('click', function(e) {
        e.preventDefault();
        const query = $('#searchBox1').val();
        searchMembers(query, '#searchBox1');
    });

    $('#searchBtn2').on('click', function(e) {
        e.preventDefault();
        const query = $('#searchBox2').val();
        searchMembers(query, '#searchBox2');
    });

    $('#selectMemberBtn').on('click', function() {
        const selectedMember = $('#searchResults').val();
        if (activeSearchBox && selectedMember) {
            let arr =[$('[name=nominee1]').val(),  $('[name=nominee2]').val()];

            if (arr.includes(selectedMember)) {
                alert('Both nominee can not be same member')
            } else {
                $(activeSearchBox).val(selectedMember);
                $('#searchModal').modal('hide');
            }
        }
    });

    $('.closeModal').on('click', function() {
        $(activeSearchBox).val('');
        $('#searchModal').modal('hide');
    });

    $('input[name="user_type"]').on('change', function() {
        if ($(this).val() == 'member') {
            $("#searchBox1").prop('required', true);
            $("#searchBox2").prop('required', true);
        }else{
            $("#searchBox1").prop('required', false);
            $("#searchBox2").prop('required', false);
        }
    })
});
