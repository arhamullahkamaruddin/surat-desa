<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')

    <div class="row g-3">

        {{-- Data Akun --}}
        <div class="col-12">
            <h5 class="border-bottom pb-2 mb-3">
                Data Akun
            </h5>
        </div>

        <div class="col-md-6">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}" required>

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email) }}" required>

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        @if ($user->role === 'user')
            {{-- Data Kependudukan --}}
            <div class="col-12 mt-4">
                <h5 class="border-bottom pb-2 mb-3">
                    Data Kependudukan
                </h5>
            </div>

            <div class="col-md-6">
                <label class="form-label">NIK</label>
                <input type="text" name="nik" maxlength="16"
                    class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik', $user->nik) }}">

                @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Nomor KK</label>
                <input type="text" name="no_kk" maxlength="16"
                    class="form-control @error('no_kk') is-invalid @enderror" value="{{ old('no_kk', $user->no_kk) }}">

                @error('no_kk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control"
                    value="{{ old('tempat_lahir', $user->tempat_lahir) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control"
                    value="{{ old('tanggal_lahir', optional($user->tanggal_lahir)->format('Y-m-d')) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Jenis Kelamin</label>

                <select name="jenis_kelamin" class="form-select">
                    <option value="">-- Pilih --</option>

                    <option value="Laki-laki"
                        {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                        Laki-laki
                    </option>

                    <option value="Perempuan"
                        {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                        Perempuan
                    </option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Agama</label>

                <select name="agama" class="form-select @error('agama') is-invalid @enderror">
                    <option value="">-- Pilih Agama --</option>

                    <option value="Islam" {{ old('agama', $user->agama) == 'Islam' ? 'selected' : '' }}>
                        Islam
                    </option>

                    <option value="Kristen" {{ old('agama', $user->agama) == 'Kristen' ? 'selected' : '' }}>
                        Kristen
                    </option>

                    <option value="Katolik" {{ old('agama', $user->agama) == 'Katolik' ? 'selected' : '' }}>
                        Katolik
                    </option>

                    <option value="Hindu" {{ old('agama', $user->agama) == 'Hindu' ? 'selected' : '' }}>
                        Hindu
                    </option>

                    <option value="Buddha" {{ old('agama', $user->agama) == 'Buddha' ? 'selected' : '' }}>
                        Buddha
                    </option>

                    <option value="Konghucu" {{ old('agama', $user->agama) == 'Konghucu' ? 'selected' : '' }}>
                        Konghucu
                    </option>

                    <option value="Kepercayaan Nenek Moyang" {{ old('agama', $user->agama) == 'Kepercayaan Nenek Moyang' ? 'selected' : '' }}>
                        Kepercayaan Nenek Moyang
                    </option>
                </select>

                @error('agama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control"
                    value="{{ old('pekerjaan', $user->pekerjaan) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Nomor WhatsApp</label>
                <input type="text" name="nomor_wa" class="form-control @error('nomor_wa') is-invalid @enderror"
                    placeholder="08xxxxxxxxxx" value="{{ old('nomor_wa', $user->nomor_wa) }}">

                @error('nomor_wa')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label">Alamat</label>

                <textarea name="alamat" rows="3" class="form-control">{{ old('alamat', $user->alamat) }}</textarea>
            </div>

            @if (!$village || $village->uses_rt_rw)
                <div class="col-md-6">
                    <label class="form-label">RT</label>

                    <input type="text" name="rt" maxlength="3" class="form-control"
                        value="{{ old('rt', $user->rt) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">RW</label>

                    <input type="text" name="rw" maxlength="3" class="form-control"
                        value="{{ old('rw', $user->rw) }}">
                </div>
            @endif
        @endif
        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>
        </div>

    </div>
</form>
