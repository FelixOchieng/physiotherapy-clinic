<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name') ?? $role->name }}" placeholder="Enter role name...">
    @error('name')
        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
    @enderror
</div>
<div class="form-group">
    <label>Assign Permissions:</label>
    <div class="form-row">
        @foreach ($permissions as $permission)
            <div class="col-md-3">
                <div class="form-check">
                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                    <label> {{ $permission->name }}</label>
                </div>
            </div>
        @endforeach
    </div>

</div>
