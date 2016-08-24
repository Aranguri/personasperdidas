<?php

namespace App\Http\Requests\Panel;

use App\Http\Requests\Request;

class StoreUserRequest extends Request
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
      'email' => 'required|email|unique:users,email,' . $this->users,
      'password' => 'required|min:8|confirmed',
      'hierarchy' => 'required',
      'country_id' => 'required_if:hierarchy,2',
      'province_id' => 'required_if:hierarchy,3',
    ];
  }
}
