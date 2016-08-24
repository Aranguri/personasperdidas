<?php

namespace App\Http\Requests\Panel;

use App\Http\Requests\Request;

class ContactDetailRequest extends Request
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
      'public_email' => 'required|email',
      'private_email' => 'required|email',
      'facebook' => 'sometimes|facebook_active_url',
      'twitter' => 'sometimes|twitter_active_url',
      'instagram' => 'sometimes|instagram_active_url',
    ];
  }
}
