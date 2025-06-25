@foreach ($notes as $note)
<div class="card">
    <div class="card-header d-flex" role="tab" id="heading-{{ $note->id }}">
        <h6 class="mb-0" style="width:100%">
            <a class="text-center note-collapse" data-toggle="collapse" href="#collapse-{{ $note->id }}" aria-expanded="true"
                aria-controls="collapse-{{ $note->id }}">
                <span class="float-left">
                    <i class="ti-calendar mr-1"></i>
                    {{ getFormattedDate($note->created_at) }}
                </span>
                <span class="text-center">{{ $note->title }}</span>
            </a>
        </h6>
        
        <span class="text-center btn-section" style="display: flex; position: absolute; right: 7%;">

            @if(\App\Library\Helper::hasAuthRolePermission('employee_note_delete') && now() < $note->created_at->addHour(settings('note_editable_duration', 24)))
            <a href="{{ route('admin.user.employee.note.edit', [$user->id, $note->id]) }}" class="text-muted">
                <i class="fas fa-edit"></i>
            </a>
            @endif

            @if(\App\Library\Helper::hasAuthRolePermission('employee_note_update'))
            <button class="btn btn-sm text-muted"
                onclick="confirmFormModal('{{ route('admin.user.employee.note.delete', [$user->id, $note->id]) }}', 'Confirmation', 'Are you sure to delete operation?')">
                <i class="fas fa-trash-alt"></i> 
            </button>
            @endif

        </span>

    </div>

    <div id="collapse-{{ $note->id }}" class="collapse" role="tabpanel" aria-labelledby="heading-{{ $note->id }}"
        data-parent="#note-accordion" style="">
        <div class="card-body p-3">
            <div class="profile-feed">
                <div class="profile-feed-item">

                    <div class="row">
                        <div class="col-md-3 p-3 bg-light-secondary rounded">
                            <span class="text-muted">
                                <i class="ti-time mr-1"></i>
                                {{ $note->created_at->diffForHumans() }}
                            </span>
                            <p class="span text-muted mt-2">
                                @foreach($note->attachments as $attachment)
                                <a href="{{ $attachment->getAttachment() }}" target="_blank" class="text-decoration-none text-muted">
                                    @if(! str_contains($attachment->attachment, '.pdf'))
                                        <i class="ti-image mr-1"></i>
                                    @else
                                        <i class="ti-file mr-1"></i>
                                    @endif
                                </a>
                                @endforeach
                            </p>
                            <span class="text-muted mt-2">
                                <i class="ti-calendar mr-1"></i>
                                {{ getFormattedDateTime($note->created_at) }}
                            </span>
                            <p class="span text-muted mt-2">
                                <i class="fas fa-user mr-1"></i>
                                {{ $note->operator->full_name }}
                            </p>
                        </div>
                        <div class="col-md-9">
                            <h6> {{ $note->category }}</h6>
                            <p>
                                {!! $note->description !!}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endforeach


@push('styles')
    <style>
        .btn-section a, .btn-section button {
            margin: 0.95rem 1.25rem 0rem 0rem !important;
            padding: 0rem 0rem 0rem 0rem !important;
        }
        .btn-section a:hover, .btn-section a:focus {
            color: #13c31d !important;
        }
        .btn-section button:hover, .btn-section button:focus {
            color: #ff4747 !important;
        }
    </style>
@endpush