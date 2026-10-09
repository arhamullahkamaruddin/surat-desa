<form method="POST" action="{{ route('password.update') }}">
    @csrf
    @method('PUT')

    @if (session('status') === 'password-updated')
        <div class="alert alert-success">
            Password berhasil diperbarui.
        </div>
    @endif

    <div class="mb-3">
        <label for="current_password" class="form-label">
            Password Saat Ini
        </label>

        <input
            type="password"
            id="current_password"
            name="current_password"
            class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
        >

        @error('current_password', 'updatePassword')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">
            Password Baru
        </label>

        <input
            type="password"
            id="password"
            name="password"
            class="form-control @error('password', 'updatePassword') is-invalid @enderror"
        >

        @error('password', 'updatePassword')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">
            Konfirmasi Password Baru
        </label>

        <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            class="form-control"
        >
    </div>

    <button type="submit" class="btn btn-primary">
        Simpan Password
    </button>
</form>
