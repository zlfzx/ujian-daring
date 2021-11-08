<?php

namespace App\Http\Requests\Ujian;

use App\Models\UjianSiswa;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class MulaiUjianRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    protected function prepareForValidation()
    {
        $ujianId = $this->ujian_id;

        // CEK UJIAN AKTIF
        $isUjian = UjianSiswa::where([
            'ujian_id' => $ujianId,
            'siswa_id' => auth()->id(),
            'status' => 0
        ])->where('selesai', '>=', now())->count();

        $this->merge([
            'is_ujian' => $isUjian
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ujian_id' => [
                'required',
                Rule::exists('ujian', 'id')->where('rombel_id', auth()->user()->rombel_id)
            ],
            'is_ujian' => [
                'in:0'
            ]
        ];
    }

    public function messages()
    {
        return [
            'ujian_id.exists' => 'Ujian tidak ditemukan',
            'is_ujian.in' => 'Sedang ada ujian yang aktif'
        ];
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(
    //         response()->json()
    //     );
    // }
}
