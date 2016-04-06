<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RelationshipCreateRequest extends Request
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
            'following_id' => 'required|exists:users,id',
            'follower_id' => 'required|exists:users,id'
        ];
    }

    public function messages()
    {
        return [
            'following_id.require' => trans('relationship.validate.following_id.require'),
            'following_id.exists' => trans('relationship.validate.following_id.exists'),
            'follower_id.require' => trans('relationship.validate.follower_id.require'),
            'follower_id.exists' => trans('relationship.validate.follower_id.exists')
        ];
    }
}
