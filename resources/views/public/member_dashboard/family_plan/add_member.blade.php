@extends('public.member_dashboard.dashboard_master')

@section('member_content')
<div class="row">
    <div class="col-md-12 content-area">
        <h4>Family Plan / Add Family Member</h4>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div id="membership" class="membership mt-3">
                    <div class="container" data-aos="fade-up">
                        <form method="post" class="form" action="/member/dashboard/family-plan/add-member"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-11 col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1 mb-2">
                                    <!-- Subscription ---->
                                    <div id="subscription" class="card pt-4 pb-1 shadow-sm main box-shadow-primary">
                                        <input type="hidden" id="memberIds" name="memberIds" value="">

                                        <div class="p-sm-2">
                                            <div class="form-group row @error('member_id') error @enderror member-div">
                                                <label class="col-sm-3 col-form-label required">{{ __('Add Member') }}</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="add_member">
                                                    @foreach($members as $key => $member)
                                                        @if ($member->age_group == 'intermediate')
                                                            @continue;
                                                        @endif
                                                        <option value="{{ $member }}">
                                                            {{ $member->user->full_name }} - {{ $member->age_group }} - {{ $member->user_id }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('member_id')
                                                    <p class="error-message">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-11 col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-1 mb-2">
                                    <!-- Subscription ---->
                                    <div id="subscription" class="card pb-1 shadow-sm main box-shadow-primary">
                                        <div class="">
                                            <div class="card-body">
                                                <h5 class="card-title text-center">Member Details</h5>
                                                <div class="table-responsive">
                                                    <table id="familyTable" class="table table-bordered">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th>Photo</th>
                                                                <th>Name</th>
                                                                <th>Age Group</th>
                                                                <th width="100px">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row p-sm-3">
                                            <div class="modal-footer justify-content-center col-md-12">
                                                <button type="submit" class="btn buy-btn">Add Member</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div><!-- End Membership Section -->
            </div>
        </div>
        <!------------ End Div ---------->
    </div>
</div>
@endsection

@include('admin.assets.select2')

@push('scripts')

<script>
    var selectedMembers = [];

    $(document).ready(function () {
        $("#add_member").select2({
            placeholder: "Select Member",
            allowClear: true
        });

        // Add placeholder to the search input
        $('#add_member').on('select2:open', function() {
            // Use a small timeout to allow the Select2 elements to render
            setTimeout(function() {
                $('.select2-search__field').attr('placeholder', 'Search'); // Add your search placeholder here
            }, 1);
        });

        var alreadyMembers = <?php echo  $alreadyExistMembers ?>;

        var memberIds = alreadyMembers.map(function(member) {
            selectedMembers.push({
                id: member.member.id,
                ageGroup: member.member.age_group,
                name: member.member.user.full_name,
                avatar: member.member.user.avatar_image,
            });
        });

        var alreadyMemberIds = selectedMembers.map(member => member.id);


        var memberIds = selectedMembers.map(member => member.id);

        $("#memberIds").val('');
        $("#memberIds").val(JSON.stringify(memberIds));

        selectedMembers.forEach(member => {
            let deleteBtn = '<i style="cursor: pointer" data-id="' + member.id +'" class="removeMember fas fa-trash-alt text-danger"></i>'

            if (alreadyMemberIds.includes(member.id)) {
                deleteBtn = ''
            }

            let tableRow = '<tr class="text-center"><td> <img width="40" src="' + member.avatar +'">' + '</td><td>' + member.name + '</td><td>' + member.ageGroup + '</td><td width="100px">' + deleteBtn + '</td></tr>';

            $('#familyTable > tbody').append(tableRow);
        });

        $("#add_member").change(function () {
            let member = JSON.parse($(this).val());

            // $("#add_member").trigger('change');

            let alreadyAdded = selectedMembers.filter(selectedMember => {
                return member.id == selectedMember.id
            });

            if (alreadyAdded.length) {
                alert('This member Already added!');
                return;
            }

            if (member.age_group == 'senior') {
                let seniorMembers = selectedMembers.filter(member => {
                    return member.ageGroup == 'senior';
                });

                if (seniorMembers.length == 2) {
                    alert('You Already Select 2 Senior Member, Now You can add only Junior Member!');
                    return;
                }
            }

            selectedMembers.push({
                id: member.id,
                ageGroup: member.age_group,
                name: member.user.full_name,
                avatar: member.user.avatar_image,
            });

            var memberIds = selectedMembers.map(member => member.id);

            $("#memberIds").val('');
            $("#memberIds").val(JSON.stringify(memberIds));

            $('#familyTable > tbody').empty();

            selectedMembers.forEach(member => {
                let deleteBtn = '<i style="cursor: pointer" data-id="' + member.id +'" class="removeMember fas fa-trash-alt text-danger"></i>'

                if (alreadyMemberIds.includes(member.id)) {
                    deleteBtn = ''
                }

                let tableRow = '<tr class="text-center"><td> <img width="40" src="' + member.avatar +'">' + '</td><td>' + member.name + '</td><td>' + member.ageGroup + '</td><td width="100px">' + deleteBtn + '</td></tr>';

                $('#familyTable > tbody').append(tableRow);
            });
        });

        $(document).on('click', '.removeMember', function (e) {
            var id = $(this).data("id");

            const filteredMembers = selectedMembers.filter(member => {
                return member.id != id;
            });

            $('#familyTable > tbody').empty();

            filteredMembers.forEach(member => {

                let deleteBtn = '<i style="cursor: pointer" data-id="' + member.id +'" class="removeMember fas fa-trash-alt text-danger"></i>'

                if (alreadyMemberIds.includes(member.id)) {
                    deleteBtn = ''
                }

                let tableRow = '<tr class="text-center"><td><img width="40" src="' + member.avatar +'">' + '</td><td>' + member.name + '</td><td>' + member.ageGroup + '</td><td width="100px">' + deleteBtn + '</td></tr>';

                $('#familyTable > tbody').append(tableRow);
            });

            selectedMembers = filteredMembers;

            var memberIds = selectedMembers.map(member => member.id);

            $("#memberIds").val('');
            console.log(memberIds);
            $("#memberIds").val(JSON.stringify(memberIds));
        });
    });
</script>
@endpush
