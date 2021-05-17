<?php

namespace App\Http\Requests;

use App\Models\Image;
use App\Rules\Color;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class ImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'color' => [new Color()],
            'pattern' => Rule::in(Image::getPatterns()),
            'blend' => Rule::in(Image::$blendModes),
            'invert' => 'boolean',
            '2x' => 'boolean',
            'intensity' => 'integer',
            'noise' => 'integer',
            'crop' => 'boolean',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
