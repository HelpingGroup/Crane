<?php

namespace App\Http\Requests;

use \DateTime;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'publish_at' => DateTime::createFromFormat('d-m-y H:i', $this->publish_at),
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
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'file' => 'nullable|image',
            'approved_by' => 'nullable|integer',
            'publish_at' => 'date|after:today',
        ];
    }
}
