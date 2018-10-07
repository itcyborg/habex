<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasRole('ROLE_ADMIN');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'employee'=>'required|unique:salaries,employeeid',
            'idnumber'=>'required|unique:salaries,idnumber',
            'jobgroup'=>'required',
            'salary'=>'required'
        ];
    }

    public function messages(){
        return [
            'employee.unique'=>'The Salary for this employee has already been updated',
            'idnumber.unique'=>'The Salary for this employee has already been updated'
        ];
    }
}
