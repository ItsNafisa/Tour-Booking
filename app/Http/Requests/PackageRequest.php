<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
       
          'city_id'=>'required',
          'state_id'=>'required',
          'start_date'=>'required',
          'end_date'=>'required|after_or_equal:start_date',
          'number_of_people'=>'required',
          'price'=>'required',
          'description'=>'required',
          'image'=>'file'
        ];
    }

    public function messages(): array
    {
        return [
          'city_id.required'=>'please select destination city',
          'state_id.required'=>'please select destination state',
          'start_date.required'=>'please choose starting date',
          'end_date.required'=>'please choose ending date',
          'number_of_people.required'=>'please enter people number',
          'end_date.after_or_equal'=>'the ending date should be greater than starting date'
        ];
    }
}
