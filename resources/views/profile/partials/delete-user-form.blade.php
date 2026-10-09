<div class="alert alert-warning">
    <strong>Peringatan!</strong><br>
    Akun yang dihapus tidak dapat dikembalikan lagi.
</div>

<form method="POST" action="{{ route('profile.destroy') }}">
    @csrf
    @method('DELETE')

    <div class="mb-3">
        <label for="delete_password" class="form-label">
            Masukkan Password
        </label>

        <input
            type="password"
            id="delete_password"
            name="password"
            class="form-control @error('password', 'userDeletion') is-invalid @enderror"
            required
        >

        @error('password', 'userDeletion')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button
        type="submit"
        class="btn btn-danger"
        onclick="return confirm('Yakin ingin menghapus akun?')"
    >
        Hapus Akun
    </button>
</form>
