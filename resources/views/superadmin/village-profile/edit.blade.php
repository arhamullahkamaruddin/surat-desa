@extends('admin.layout')

@section('title', 'Profil Desa')
@section('page-title', 'Profil Desa')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('superadmin.village-profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card border-0 mb-3">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    Informasi Desa
                </h5>
            </div>

            <div class="card-body">
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Desa</label>
                        <input type="text" name="nama_desa" class="form-control @error('nama_desa') is-invalid @enderror"
                            value="{{ old('nama_desa', $village->nama_desa) }}">

                        @error('nama_desa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kode Pos</label>
                        <input type="text" name="kode_pos" class="form-control"
                            value="{{ old('kode_pos', $village->kode_pos) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Nomor WhatsApp Admin
                        </label>
                        <input type="text" name="nomor_wa" class="form-control"
                            value="{{ old('nomor_wa', $village->nomor_wa) }}">

                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Alamat Desa</label>
                        <textarea name="alamat_desa" rows="3" class="form-control @error('alamat_desa') is-invalid @enderror">{{ old('alamat_desa', $village->alamat_desa) }}</textarea>

                        @error('alamat_desa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Kecamatan</label>
                        <input type="text" name="kecamatan" class="form-control"
                            value="{{ old('kecamatan', $village->kecamatan) }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Kabupaten</label>
                        <input type="text" name="kabupaten" class="form-control"
                            value="{{ old('kabupaten', $village->kabupaten) }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Provinsi</label>
                        <input type="text" name="provinsi" class="form-control"
                            value="{{ old('provinsi', $village->provinsi) }}">
                    </div>

                </div>
            </div>
        </div>

        <div class="card border-0 mb-3">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    Pejabat Desa
                </h5>
            </div>

            <div class="card-body">
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Kepala Desa</label>
                        <input type="text" name="kepala_desa" class="form-control"
                            value="{{ old('kepala_desa', $village->kepala_desa) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">NIP Kepala Desa</label>
                        <input type="text" name="nip_kepala_desa" class="form-control"
                            value="{{ old('nip_kepala_desa', $village->nip_kepala_desa) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Sekretaris Desa</label>
                        <input type="text" name="sekretaris_desa" class="form-control"
                            value="{{ old('sekretaris_desa', $village->sekretaris_desa) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">NIP Sekretaris Desa</label>
                        <input type="text" name="nip_sekretaris_desa" class="form-control"
                            value="{{ old('nip_sekretaris_desa', $village->nip_sekretaris_desa) }}">
                    </div>

                    <div class="col-md-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="uses_rt_rw" value="1" id="uses_rt_rw"
                                {{ $village->uses_rt_rw ? 'checked' : '' }}>

                            <label class="form-check-label" for="uses_rt_rw">
                                Gunakan RT/RW pada surat
                            </label>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>
        </div>
    </form>

@endsection
