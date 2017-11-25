<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationRequest extends FormRequest
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
          'title' => 'required|max:225',
          'image' => 'required',
          'body' => 'required'
        ];
    }

    public function messages()
    {
      return [
        'title.required' => 'Judul gak boleh kosong',
        'title.max' => 'Judul maksimal 255 karakter',
        'image.required' => 'Gambar tidak boleh kosong',
        'body.required' => 'Isi gak boleh kosong'
      ];
    }
}
