<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name') ?? $client->name }}" placeholder="Enter client name...">
    @error('name')
        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group">
    <label for="age">Age:</label>
    <input type="number" name="age" id="age" class="form-control @error('age') is-invalid @enderror"
        value="{{ old('age') ?? $client->age }}" min="0" step="1" placeholder="Enter client age...">
    @error('age')
        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group">
    <label for="residence">Residence:</label>
    <input type="text" name="residence" id="residence" class="form-control @error('residence') is-invalid @enderror"
        value="{{ old('residence') ?? $client->residence }}" min="0" step="1" placeholder="Enter client residence...">
    @error('residence')
        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group">
    <label for="gender">Gender:</label>
    <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
        <option value="">--Select client gender--</option>
        <option value="male" {{ (old('gender') ?? $client->gender) === 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ (old('gender') ?? $client->gender) === 'female' ? 'selected' : '' }}>Female</option>
        <option value="other" {{ (old('gender') ?? $client->gender) === 'other' ? 'selected' : '' }}>Other</option>
    </select>
    @error('gender')
        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
    @enderror
</div>
