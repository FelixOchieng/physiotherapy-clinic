<div class="form-group">
    <label for="client_id">Client:</label>
    <select class="form-control @error('client_id') is-invalid @enderror" id="client_id" name="client_id">
        <option value="">--Select client--</option>
        @foreach ($clients as $client)
            <option value="{{ $client->id }}" {{ old('client_id') ?? $appointment->client_id ? 'selected' : '' }}>
                {{ $client->name }}
            </option>
        @endforeach
    </select>
    @error('client_id')
        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group">
    <label for="user_id">Therapist:</label>
    <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
        <option value="">--Select therapist--</option>
        @foreach ($therapists as $therapist)
            <option value="{{ $therapist->id }}" {{ old('user_id') ?? $appointment->user_id ? 'selected' : '' }}>
                {{ $therapist->name }}
            </option>
        @endforeach
    </select>
    @error('user_id')
        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group">
    <label for="therapy_room_id">Therapy Room:</label>
    <select class="form-control @error('therapy_room_id') is-invalid @enderror" id="therapy_room_id" name="therapy_room_id">
        <option value="">--Select therapy room--</option>
        @foreach ($freeRooms as $freeRoom)
            <option value="{{ $freeRoom->id }}" {{ old('therapy_room_id') ?? $appointment->therapy_room_id ? 'selected' : '' }}>
                {{ $freeRoom->name }}
            </option>
        @endforeach
    </select>
    @error('therapy_room_id')
        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group">
    <label for="timestamp">Date and Time:</label>
    <input type="datetime-local" name="timestamp" id="timestamp" class="form-control @error('timestamp') is-invalid @enderror"
        value="{{ old('timestamp') ?? Carbon::parse($appointment->timestamp)->format('Y-m-d\TH:i') }}" placeholder="Enter time">
    @error('timestamp')
        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
    @enderror
</div>


