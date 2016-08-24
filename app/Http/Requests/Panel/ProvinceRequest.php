<?php

namespace App\Http\Requests\Panel;

use App\Http\Requests\Request;

class ProvinceRequest extends Request
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
     'name' => 'required|unique:provinces,name,' . $this->provinces,
     'country_id' => 'required_if_present',
    ];
  }
}
