<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function PHPUnit\Framework\assertTrue;

class NotifikasiRequest extends FormRequest
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

            'wanotif'  => ["boolean"],
            'emailnotif'  => ["boolean"],


        ];
    }

    public function messages()
    {
        return [
            'wanotif.boolean'  => 'Data harus berupa true atau false',
            'emailnotif.boolean'  => 'Data harus berupa true atau false',


        ];
    }
}
