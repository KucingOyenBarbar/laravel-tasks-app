<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title' => 'required|max:120|min:3',
            'description' => 'required'
        ];
    }


    /**
     * Get the validation rules message that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required'   => 'Bidang ini wajib di isi',
            'min'        => 'Jumlah karakter terlalu pendek',
            'max'        => 'Jumlah karakter sudah mencapai batas'
        ];
    }
}
