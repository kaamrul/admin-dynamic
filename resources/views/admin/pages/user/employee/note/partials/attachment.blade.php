<div class="table-responsive">
    <table class="table table-bordered role-data-table">
        <thead>
            <tr class="text-center">
                <th>File Name</th>
                <th>File</th>
                <th>Date</th>
                <th>Operator</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($attachments as $attachment)
            <tr class="">
                <td class="p-1">{{ $attachment->name }}</td>

                <td class="p-1 text-center">
                    @if(! str_contains($attachment->attachment, '.pdf'))
                    <img src="{{ $attachment->getAttachment() }}" class="img-lg rounded border border-secondary"  alt="profile">
                    @else <i class="far fa-file-pdf icon-lg"></i>@endif
                </td>

                <td class="p-1 text-center">{{ getFormattedDateTime($attachment->created_at) }}</td>
                <td class="p-1 text-center">{{ $attachment->load('operator')->operator?->full_name }}</td>

                <td class="text-center py-1">
                    <a href="{{ $attachment->getAttachment() }}" target="_blank" class="btn btn-light btn-sm mr-2">
                        <i class="ti-eye text-primary"></i> View
                    </a>

                    <a href="{{ $attachment->getAttachment() }}" download class="btn btn-light btn-sm mr-2">
                        <i class="ti-download text-danger"></i> Download
                    </a>

                    @if(App\Library\Helper::hasAuthRolePermission('prescription_attachment_update'))
                        <button href="{{ $attachment->getAttachment() }}" class="btn btn-light btn-sm mr-2" onclick="showAttachment({{ $attachment->id }})">
                            <i class="far fa-edit text-info"></i> Edit
                        </button>
                    @endif

                    @if(App\Library\Helper::hasAuthRolePermission('prescription_attachment_delete'))
                        <a class="btn btn-light btn-sm" href="#" onclick="confirmFormModal('{{ route('admin.member.prescription.delete.attachment', $attachment->id) }}', 'Confirmation', 'Are you sure to delete operation?')"><i class="far fa-trash-alt text-danger"></i> Delete</a>
                    @endif
                </td>
            </tr>
            @empty
            <p class="text-center">No attachment found</p>
            @endforelse
        </tbody>
    </table>
    <hr>
</div>
