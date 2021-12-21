<?php

namespace Haitech\Slug\Http\Requests;

use Haitech\Support\Http\Requests\Request;

class SlugRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'required',
            'slug_id' => 'required',
        ];
    }
}
