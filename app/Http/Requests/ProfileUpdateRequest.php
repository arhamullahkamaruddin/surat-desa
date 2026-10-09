<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],

            'nik' => [
                'nullable',
                'digits:16',
                Rule::unique('users')->ignore($this->user()->id),
            ],

            'no_kk' => [
                'nullable',
                'digits:16',
            ],

            'tempat_lahir' => [
                'nullable',
                'string',
                'max:255',
            ],

            'tanggal_lahir' => [
                'nullable',
                'date',
            ],

            'jenis_kelamin' => [
                'nullable',
                Rule::in(['Laki-laki', 'Perempuan']),
            ],

            'agama' => [
                'nullable',
                'string',
                'max:255',
            ],

            'pekerjaan' => [
                'nullable',
                'string',
                'max:255',
            ],

            'alamat' => [
                'nullable',
                'string',
            ],

            'rt' => [
                'nullable',
                'max:3',
            ],

            'rw' => [
                'nullable',
                'max:3',
            ],

            'nomor_wa' => [
                'nullable',
                'regex:/^[0-9]+$/',
                'max:20',
            ],
        ];
    }
}
