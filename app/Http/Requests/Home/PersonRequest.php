<?php

namespace App\Http\Requests\Home;

use App\Http\Requests\Request;

class PersonRequest extends Request
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
      'name' => 'required',
      'surname' => 'required',
      'birth_year' => 'required',
      'characteristics' => 'required',
      'gender' => 'required',
      'province_id' => 'required',
      'area' => 'required',
      'year' => 'required',
      'month' => 'required',
      'reporter.reporter_name' => 'required',
      'reporter.relationship' => 'required',
      'reporter.phone' => 'required',
      'reporter.email' => 'required|email',
    ];
  }
}
