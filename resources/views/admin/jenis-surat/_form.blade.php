<div class="mb-3">
    <label class="form-label">
        Nama Surat
    </label>

    <input
        type="text"
        name="nama_surat"
        class="form-control @error('nama_surat') is-invalid @enderror"
        value="{{ old('nama_surat', $jenisSurat->nama_surat ?? '') }}"
        required>

    @error('nama_surat')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">
        Kode Surat
    </label>

    <input
        type="text"
        name="kode_surat"
        class="form-control @error('kode_surat') is-invalid @enderror"
        value="{{ old('kode_surat', $jenisSurat->kode_surat ?? '') }}"
        required>

    @error('kode_surat')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">
        Deskripsi
    </label>

    <textarea
        name="deskripsi"
        class="form-control @error('deskripsi') is-invalid @enderror"
        rows="3">{{ old('deskripsi', $jenisSurat->deskripsi ?? '') }}</textarea>

    @error('deskripsi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">
        Template Surat
    </label>

    <select
        name="template_view"
        class="form-select @error('template_view') is-invalid @enderror"
        required>

        <option value="">
            -- Pilih Template --
        </option>

        @foreach($templates as $template)
            <option
                value="{{ $template }}"
                {{ old('template_view', $jenisSurat->template_view ?? '') == $template ? 'selected' : '' }}>
                {{ $template }}
            </option>
        @endforeach

    </select>

    @error('template_view')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-check mb-3">

    <input
        type="checkbox"
        name="is_active"
        value="1"
        class="form-check-input"
        {{ old('is_active', $jenisSurat->is_active ?? true) ? 'checked' : '' }}>

    <label class="form-check-label">
        Aktif
    </label>

</div>

<button
    type="submit"
    class="btn btn-primary">
    Simpan
</button>

<a href="{{ route('superadmin.jenis-surat.index') }}"
   class="btn btn-secondary">
    Kembali
</a>
