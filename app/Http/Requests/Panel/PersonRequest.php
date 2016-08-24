<?php

namespace App\Http\Requests\Panel;

use App\Http\Requests\Request;

class PersonRequest extends Request
{
  //protected $redirectRoute = ['panel.people.create', 'missing'];
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
      'status' => 'required',
      'name' => 'required',
      'surname' => 'required',
      'birth_year' => 'required',
      'gender' => 'required',
      'country_id' => 'required_if_present',
      'missing_at' => 'required_if:status,missing_to_validate,missing,missing_found_with_life,missing_found_without_life,closed',
      'found_at' => 'required_if:status,found_to_validate,found,found_refound,closed',
      'closure_at' => 'required_if:status,missing_found_with_life,missing_found_without_life,found_refound,closed',
      'reporter.email' => 'sometimes|email',
    ];
  }
}
