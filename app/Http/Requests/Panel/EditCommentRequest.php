<?php

namespace App\Http\Requests\Panel;

use App\Http\Requests\Request;

class EditCommentRequest extends Request
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
      'edit_comment_description' => 'required',
    ];
  }
}
