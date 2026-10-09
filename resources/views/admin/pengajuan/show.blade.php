@extends('admin.layout')

@section('title', 'Detail Pengajuan')
@section('page-title', 'Detail Pengajuan Surat')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }} </div>
    @endif

    @php
        $badge = match ($pengajuanSurat->status) {
            'menunggu' => 'warning',
            'diproses' => 'primary',
            'selesai' => 'success',
            'ditolak' => 'danger',
            default => 'secondary',
        };
    @endphp

    <div class="row">

        {{-- Informasi Pengajuan --}}
        <div class="col-lg-6">

            <div class="card border-0 mb-3">

                <div class="card-header">
                    Informasi Pengajuan
                </div>

                <div class="card-body">

                    <table class="table">

                        <tr>
                            <th width="180">
                                Nomor Pengajuan
                            </th>
                            <td>
                                {{ $pengajuanSurat->nomor_pengajuan }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Jenis Surat
                            </th>
                            <td>
                                {{ $pengajuanSurat->jenisSurat->nama_surat }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Status
                            </th>
                            <td>
                                <span class="badge bg-{{ $badge }}">
                                    {{ ucfirst($pengajuanSurat->status) }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Tanggal Pengajuan
                            </th>
                            <td>
                                {{ $pengajuanSurat->created_at->format('d-m-Y H:i') }}
                            </td>
                        </tr>

                        @if ($pengajuanSurat->editor)
                            <tr>
                                <th>
                                    Terakhir Diedit
                                </th>
                                <td>
                                    {{ $pengajuanSurat->editor->name }}
                                </td>
                            </tr>
                        @endif

                    </table>

                </div>

            </div>

        </div>

        {{-- Data Pemohon --}}
        <div class="col-lg-6">

            <div class="card border-0 mb-3">

                <div class="card-header">
                    Data Pemohon
                </div>

                <div class="card-body">

                    <table class="table">

                        <tr>
                            <th width="180">
                                Nama
                            </th>
                            <td>
                                {{ $pengajuanSurat->user->name }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                NIK
                            </th>
                            <td>
                                {{ $pengajuanSurat->user->nik }}
                            </td>
                        </tr>

                        <tr>

                            <th>
                                Nomor WA
                            </th>

                            <td>

                                @if ($pengajuanSurat->user->nomor_wa)
                                    @php

                                        $wa = preg_replace('/[^0-9]/', '', $pengajuanSurat->user->nomor_wa);

                                        if (str_starts_with($wa, '0')) {
                                            $wa = '62' . substr($wa, 1);
                                        }

                                    @endphp

                                    <div class="d-flex align-items-center gap-2">

                                        <span>
                                            {{ $pengajuanSurat->user->nomor_wa }}
                                        </span>

                                        <a href="https://wa.me/{{ $wa }}" target="_blank"
                                            class="btn btn-success btn-sm">

                                            <i class="bi bi-whatsapp"></i>
                                            Chat

                                        </a>

                                    </div>
                                @else
                                    -
                                @endif

                            </td>

                        </tr>

                        <tr>
                            <th>
                                Alamat
                            </th>
                            <td>
                                {{ $pengajuanSurat->user->alamat }}

                                @if ($pengajuanSurat->user->rt || $pengajuanSurat->user->rw)
                                    <br>
                                    RT {{ $pengajuanSurat->user->rt }}
                                    /
                                    RW {{ $pengajuanSurat->user->rw }}
                                @endif
                            </td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

    </div>

    {{-- Data Surat --}}

    <div class="card border-0 mb-3">

        <div class="card-header">
            Data Surat
        </div>

        <div class="card-body">

            <form action="{{ route('admin.pengajuan.detail.update', $pengajuanSurat) }}" method="POST">

                @csrf
                @method('PUT')

                <table class="table align-middle">

                    @foreach ($pengajuanSurat->details as $detail)
                        <tr>

                            <th width="250">
                                {{ $detail->field->label }}
                            </th>

                            <td>

                                @if ($detail->field->type === 'textarea')
                                    <textarea name="fields[{{ $detail->id }}]" rows="4" class="form-control">{{ $detail->value }}</textarea>
                                @elseif($detail->field->type === 'date')
                                    <input type="date" name="fields[{{ $detail->id }}]" value="{{ $detail->value }}"
                                        class="form-control">
                                @elseif($detail->field->type === 'number')
                                    <input type="number" name="fields[{{ $detail->id }}]" value="{{ $detail->value }}"
                                        class="form-control">
                                @elseif($detail->field->type === 'select')
                                    <select name="fields[{{ $detail->id }}]" class="form-select">

                                        @foreach (array_filter(explode("\n", $detail->field->options ?? '')) as $option)
                                            <option value="{{ trim($option) }}"
                                                {{ $detail->value == trim($option) ? 'selected' : '' }}>
                                                {{ trim($option) }}
                                            </option>
                                        @endforeach

                                    </select>
                                @else
                                    <input type="text" name="fields[{{ $detail->id }}]" value="{{ $detail->value }}"
                                        class="form-control">
                                @endif

                            </td>

                        </tr>
                    @endforeach

                </table>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan Data
                </button>

            </form>

        </div>

    </div>

    @if ($pengajuanSurat->status === 'selesai')
        @php

            $wa = preg_replace('/[^0-9]/', '', $pengajuanSurat->user->nomor_wa);

            if (str_starts_with($wa, '0')) {
                $wa = '62' . substr($wa, 1);
            }

            $pesan = urlencode(
                "Halo {$pengajuanSurat->user->name},\n\n" .
                    "Pengajuan {$pengajuanSurat->jenisSurat->nama_surat} telah selesai diproses.\n\n" .
                    "Nomor Surat:\n" .
                    "{$pengajuanSurat->nomor_surat}\n\n" .
                    "Silakan mengambil surat di Kantor Desa pada jam kerja.\n\n" .
                    'Terima kasih.',
            );

        @endphp

        <div class="mb-3 d-flex gap-2 flex-wrap">

            <a href="{{ route('admin.pengajuan.preview', $pengajuanSurat) }}" target="_blank" class="btn btn-primary">

                Preview PDF

            </a>

            <a href="{{ route('admin.pengajuan.download', $pengajuanSurat) }}" class="btn btn-danger">

                Download PDF

            </a>

            <a href="https://wa.me/{{ $wa }}?text={{ $pesan }}" target="_blank" class="btn btn-success">

                <i class="bi bi-whatsapp"></i>
                Kirim WA

            </a>

        </div>
    @endif

    {{-- Status Pengajuan --}}

    <div class="card border-0">

        <div class="card-header">
            Status Pengajuan
        </div>

        <div class="card-body">

            <form action="{{ route('admin.pengajuan.status', $pengajuanSurat) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status" class="form-select">

                        <option value="menunggu" {{ $pengajuanSurat->status == 'menunggu' ? 'selected' : '' }}>
                            Menunggu
                        </option>

                        <option value="diproses" {{ $pengajuanSurat->status == 'diproses' ? 'selected' : '' }}>
                            Diproses
                        </option>

                        <option value="selesai" {{ $pengajuanSurat->status == 'selesai' ? 'selected' : '' }}>
                            Selesai
                        </option>

                        <option value="ditolak" {{ $pengajuanSurat->status == 'ditolak' ? 'selected' : '' }}>
                            Ditolak
                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Catatan Admin
                    </label>

                    <textarea name="catatan_admin" rows="4" class="form-control">{{ $pengajuanSurat->catatan_admin }}</textarea>

                </div>

                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-success">
                        Simpan Status
                    </button>

                    @if ($pengajuanSurat->status === 'selesai')
                        <a href="#" class="btn btn-danger">
                            Download PDF
                        </a>
                    @endif

                </div>

            </form>

        </div>

    </div>

@endsection
