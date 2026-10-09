@extends('user.layout')

@section('title', $jenisSurat->nama_surat)

@section('content')

    <div class="card border-0 shadow-sm">

        <div class="card-header">
            <h5 class="mb-0">
                {{ $jenisSurat->nama_surat }}
            </h5>
        </div>

        <div class="card-body">

            <div class="alert alert-info">
                Data surat akan menggunakan biodata yang tersimpan pada profil Anda.
                Pastikan data profil sudah benar sebelum mengirim pengajuan.
            </div>

            <form method="POST" action="{{ route('user.pengajuan.store', $jenisSurat) }}">

                @csrf

                @foreach ($jenisSurat->fields as $field)
                    <div class="mb-3">

                        <label class="form-label">
                            {{ $field->label }}

                            @if ($field->is_required)
                                <span class="text-danger">*</span>
                            @endif
                        </label>

                        @if ($field->type === 'text')

                            <input
                                type="text"
                                name="fields[{{ $field->id }}]"
                                class="form-control @error('fields.' . $field->id) is-invalid @enderror"
                                placeholder="{{ $field->placeholder }}"
                                value="{{ old('fields.' . $field->id) }}"
                                {{ $field->is_required ? 'required' : '' }}>

                        @elseif($field->type === 'textarea')

                            <textarea
                                name="fields[{{ $field->id }}]"
                                class="form-control @error('fields.' . $field->id) is-invalid @enderror"
                                rows="4"
                                placeholder="{{ $field->placeholder }}"
                                {{ $field->is_required ? 'required' : '' }}>{{ old('fields.' . $field->id) }}</textarea>

                        @elseif($field->type === 'number')

                            <input
                                type="number"
                                name="fields[{{ $field->id }}]"
                                class="form-control @error('fields.' . $field->id) is-invalid @enderror"
                                placeholder="{{ $field->placeholder }}"
                                value="{{ old('fields.' . $field->id) }}"
                                {{ $field->is_required ? 'required' : '' }}>

                        @elseif($field->type === 'date')

                            <input
                                type="date"
                                name="fields[{{ $field->id }}]"
                                class="form-control @error('fields.' . $field->id) is-invalid @enderror"
                                value="{{ old('fields.' . $field->id) }}"
                                {{ $field->is_required ? 'required' : '' }}>

                        @elseif($field->type === 'select')

                            <select
                                name="fields[{{ $field->id }}]"
                                class="form-select @error('fields.' . $field->id) is-invalid @enderror"
                                {{ $field->is_required ? 'required' : '' }}>

                                <option value="">
                                    -- Pilih --
                                </option>

                                @foreach (array_filter(explode("\n", $field->options ?? '')) as $option)
                                    <option
                                        value="{{ trim($option) }}"
                                        {{ old('fields.' . $field->id) == trim($option) ? 'selected' : '' }}>
                                        {{ trim($option) }}
                                    </option>
                                @endforeach

                            </select>

                        @endif

                        @error('fields.' . $field->id)
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                @endforeach

                <div class="d-flex gap-2">

                    <a href="{{ route('home') }}"
                        class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit"
                        class="btn btn-primary">
                        Kirim Pengajuan
                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection
