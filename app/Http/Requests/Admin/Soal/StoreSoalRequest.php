<?php

namespace App\Http\Requests\Admin\Soal;

use Illuminate\Foundation\Http\FormRequest;

class StoreSoalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'paket_soal_id' => 'required|exists:paket_soal,id',
            'jenis' => 'required|in:pilihan_ganda,essai',
            'pertanyaan' => 'required',
            'media' => 'mimes:mp3,mp4'
        ];
    }

    public function messages()
    {
        return [
            'paket_soal_id.required' => 'Paket Soal harus dipilih',
            'jenis.required' => 'Jenis Soal belum dipilih',
            'pertanyaan.required' => 'Pertanyaan belum diisi'
        ];
    }
}
