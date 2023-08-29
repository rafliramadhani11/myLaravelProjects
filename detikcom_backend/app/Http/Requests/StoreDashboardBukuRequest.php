<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDashboardBukuRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'judul' => 'required|max:100',
            'slug' => 'required|unique:bukus',
            'deskripsi' => 'required|max:255',
            'jumlah' => 'required|integer',
            'kategori_id' => 'required',
            'coverBuku' => 'required|image|file|mimes:png,jpg,jpeg',
            'fileBuku' => 'required|file|mimes:pdf',
        ];
    }
}
