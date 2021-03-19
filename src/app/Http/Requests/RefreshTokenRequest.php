<?php

namespace Bluewing\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefreshTokenRequest extends FormRequest
{
    const REFRESH_TOKEN_KEY = 'refreshToken';

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
            self::REFRESH_TOKEN_KEY  => ['required', 'size:64', 'exists:RefreshTokens,token']
        ];
    }
}
