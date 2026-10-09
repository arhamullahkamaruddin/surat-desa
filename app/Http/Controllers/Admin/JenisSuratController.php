<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JenisSuratController extends Controller
{
    public function index()
    {
        $jenisSurats = JenisSurat::latest()->get();

        return view(
            'admin.jenis-surat.index',
            compact('jenisSurats')
        );
    }

    public function create()
    {
        $templates = $this->getTemplates();

        return view(
            'admin.jenis-surat.create',
            compact('templates')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_surat' => ['required', 'string', 'max:255'],
            'kode_surat' => ['required', 'string', 'max:100', 'unique:jenis_surats'],
            'deskripsi' => ['nullable', 'string'],
            'template_view' => ['required', 'string'],
            'is_active' => ['nullable'],
        ]);

        $validated['slug'] = Str::slug(
            $validated['nama_surat']
        );

        $validated['is_active'] =
            $request->boolean('is_active');

        JenisSurat::create($validated);

        return redirect()
            ->route('superadmin.jenis-surat.index')
            ->with(
                'success',
                'Jenis surat berhasil ditambahkan.'
            );
    }

    public function edit(JenisSurat $jenisSurat)
    {
        $templates = $this->getTemplates();

        return view(
            'admin.jenis-surat.edit',
            compact('jenisSurat', 'templates')
        );
    }

    public function update(
        Request $request,
        JenisSurat $jenisSurat
    ) {
        $validated = $request->validate([
            'nama_surat' => ['required', 'string', 'max:255'],
            'kode_surat' => [
                'required',
                'string',
                'max:100',
                'unique:jenis_surats,kode_surat,' . $jenisSurat->id,
            ],
            'deskripsi' => ['nullable', 'string'],
            'template_view' => ['required', 'string'],
            'is_active' => ['nullable'],
        ]);

        $validated['slug'] = Str::slug(
            $validated['nama_surat']
        );

        $validated['is_active'] =
            $request->boolean('is_active');

        $jenisSurat->update($validated);

        return redirect()
            ->route('superadmin.jenis-surat.index')
            ->with(
                'success',
                'Jenis surat berhasil diperbarui.'
            );
    }

    public function destroy(JenisSurat $jenisSurat)
    {
        $jenisSurat->delete();

        return back()
            ->with(
                'success',
                'Jenis surat berhasil dihapus.'
            );
    }

    private function getTemplates(): array
    {
        $path = resource_path('views/surat');

        if (!is_dir($path)) {
            return [];
        }

        return collect(scandir($path))
            ->filter(
                fn($file) => str_ends_with(
                    $file,
                    '.blade.php'
                )
            )
            ->map(
                fn($file) => 'surat.' .
                    str_replace(
                        '.blade.php',
                        '',
                        $file
                    )
            )
            ->values()
            ->toArray();
    }
}
