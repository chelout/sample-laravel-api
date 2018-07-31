<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexUser extends FormRequest
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
            'limit' => 'integer|max:100',
            'offset' => 'integer',
            'q' => 'string',
        ];
    }

    public function getValidatorInstance()
    {
        $this->merge([
            'limit' => $this->limit ?? 10,
            'offset' => $this->offset ?? 0,
            'q' => $this->q ?? '',
        ]);

        return parent::getValidatorInstance();
    }
}
