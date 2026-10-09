<div class="mb-3">
    <label class="form-label">
        Label Field
    </label>

    <input
        type="text"
        name="label"
        class="form-control @error('label') is-invalid @enderror"
        value="{{ old('label', $field->label ?? '') }}"
        required>

    @error('label')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">
        Tipe Field
    </label>

    <select
        name="type"
        class="form-select @error('type') is-invalid @enderror"
        required>

        <option value="">-- Pilih --</option>

        @foreach([
            'text',
            'textarea',
            'number',
            'date',
            'select',
            'email',
            'tel'
        ] as $type)

            <option
                value="{{ $type }}"
                {{ old('type', $field->type ?? '') == $type ? 'selected' : '' }}>
                {{ ucfirst($type) }}
            </option>

        @endforeach

    </select>

    @error('type')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">
        Placeholder
    </label>

    <input
        type="text"
        name="placeholder"
        class="form-control"
        value="{{ old('placeholder', $field->placeholder ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">
        Opsi Select
    </label>

    <textarea
        name="options"
        rows="4"
        class="form-control">{{ old('options', $field->options ?? '') }}</textarea>

    <small class="text-muted">
        Isi hanya jika tipe = select.<br>
        Satu opsi per baris.
    </small>
</div>

<div class="mb-3">
    <label class="form-label">
        Urutan Tampil
    </label>

    <input
        type="number"
        name="sort_order"
        class="form-control"
        value="{{ old('sort_order', $field->sort_order ?? 0) }}">
</div>

<div class="form-check mb-4">

    <input
        type="checkbox"
        name="is_required"
        value="1"
        class="form-check-input"
        {{ old('is_required', $field->is_required ?? true) ? 'checked' : '' }}>

    <label class="form-check-label">
        Wajib Diisi
    </label>

</div>

<button type="submit" class="btn btn-primary">
    Simpan
</button>

<a href="{{ route('superadmin.jenis-surat.fields.index', $jenisSurat) }}"
   class="btn btn-secondary">
    Kembali
</a>
