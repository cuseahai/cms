<?php

namespace Haitech\Table\Http\Requests;

use Haitech\Support\Http\Requests\Request;

class BulkChangeRequest extends Request
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'class' => 'required',
        ];
    }
}
