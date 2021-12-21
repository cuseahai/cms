<?php

namespace Haitech\ACL\Http\Requests;

use Haitech\Support\Http\Requests\Request;
use RvMedia;

class AvatarRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'avatar_file' => RvMedia::imageValidationRule(),
            'avatar_data' => 'required',
        ];
    }
}
