<?php

namespace App\Http\Requests\Home;

use App\Http\Requests\Request;

class ContributionRequest extends Request
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
      'characteristics' => 'required',
      'province_id' => 'required',
      'characteristics' => 'required',
      'contributor.name' => 'required',
      'contributor.phone' => 'required',
      'contributor.email' => 'sometimes|email',
    ];
  }
}
