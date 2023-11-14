<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublisherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "kode_penerbit" => "required|min:5|max:5|unique:publishers,kode_penerbit",
            "nama" => "required|min:3",
            "alamat" => "required|min:10",
            "kota" => "required|min:4",
            "telepon" => "required|min:10|numeric"
        ];
    }
}
