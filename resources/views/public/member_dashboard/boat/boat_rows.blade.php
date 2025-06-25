@php
    use App\Library\Enum;
@endphp

@foreach($boats as $key => $boat)
<tr class="text-center">
    <td>{{ $boat->id }}</td>
    <td><a href="{{ route('member.dashboard.boat.show', $boat->id) }}" class="text-primary pr-2">{{ $boat->boat_name }}</a></td>
    <td>{{ $boat?->load('skipper')->skipper?->full_name }}</td>
    <td>{{ Enum::getBoatType($boat?->type) }}</td>
    <td>{{ Enum::getBoatFuelType($boat?->fuel_type) }}</td>
    <td>
        <div class="dropdown">
            <button style="background-color: #1c006a; color: #fff; padding: 6px; font-size: 14px;" class="btn dropdown-toggle" type="button" id="dropdownActiove" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-tools me-1"></i> Action
            </button>
            <ul style="min-width: 6rem; font-size: 14px;" class="dropdown-menu" aria-labelledby="dropdownActiove">
                <a href="{{ route('member.dashboard.boat.show', $boat->id) }}" class="dropdown-item"><i class="fas fa-eye me-1"></i>Show</a>
                @if ($status == 'my_boat')
                <a href="{{ route('member.dashboard.boat.edit', $boat->id) }}" class="dropdown-item"><i class="fas fa-edit me-1"></i>Edit</a>
                <a href="{{ route('member.dashboard.boat.delete', $boat->id) }}" class="dropdown-item text-danger"><i class="fas fa-trash-alt me-1"></i>Delete</a>
                @endif
            </ul>
        </div>
    </td>
</tr>
@endforeach