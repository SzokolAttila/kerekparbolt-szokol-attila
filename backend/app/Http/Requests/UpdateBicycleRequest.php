<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBicycleRequest extends FormRequest
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
            "name" => ["required", "string", "max:80"],
            "wheel_size" => ["required", "numeric"],
            "gears" => ["required", "integer", "between:1,30"],
            "sex" => ["required", "string", "in:férfi,női,unisex"],
            "type" => ["required", "string", "in:MTB,városi,országúti,cross"],
            "manufacturer_id" => ["required", "integer", "exists:manufacturers,id"],
            "size" => ["nullable", "string", "max:10"],
            "color" => ["nullable", "string", "max:20"]
        ];
    }
}
