<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use App\Models\SuratField;
use Illuminate\Http\Request;

class SuratFieldController extends Controller
{
    public function index(JenisSurat $jenisSurat)
    {
        $fields = $jenisSurat->fields;

        return view(
            'superadmin.surat-field.index',
            compact('jenisSurat', 'fields')
        );
    }

    public function create(JenisSurat $jenisSurat)
    {
        return view(
            'superadmin.surat-field.create',
            compact('jenisSurat')
        );
    }

    public function store(
        Request $request,
        JenisSurat $jenisSurat
    ) {
        $validated = $request->validate([
            'label' => ['required'],
            'type' => ['required'],
            'placeholder' => ['nullable'],
            'options' => ['nullable'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $validated['name'] = str($validated['label'])
            ->lower()
            ->slug('_');

        $validated['jenis_surat_id'] = $jenisSurat->id;

        $validated['is_required']
            = $request->boolean('is_required');

        SuratField::create($validated);

        return redirect()
            ->route(
                'superadmin.jenis-surat.fields.index',
                $jenisSurat
            )
            ->with(
                'success',
                'Field berhasil ditambahkan.'
            );
    }

    public function edit(
        JenisSurat $jenisSurat,
        SuratField $field
    ) {
        return view(
            'superadmin.surat-field.edit',
            compact('jenisSurat', 'field')
        );
    }

    public function update(
        Request $request,
        JenisSurat $jenisSurat,
        SuratField $field
    ) {
        $validated = $request->validate([
            'label' => ['required'],
            'type' => ['required'],
            'placeholder' => ['nullable'],
            'options' => ['nullable'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $validated['name'] = str($validated['label'])
            ->lower()
            ->slug('_');

        $validated['is_required']
            = $request->boolean('is_required');

        $field->update($validated);

        return redirect()
            ->route(
                'superadmin.jenis-surat.fields.index',
                $jenisSurat
            )
            ->with(
                'success',
                'Field berhasil diperbarui.'
            );
    }

    public function destroy(
        JenisSurat $jenisSurat,
        SuratField $field
    ) {
        $field->delete();

        return back()
            ->with(
                'success',
                'Field berhasil dihapus.'
            );
    }
}
