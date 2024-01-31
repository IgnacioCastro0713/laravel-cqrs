<?php

namespace App\Modules\User\Commands\AddUser;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string'
        ];
    }


    public function toAddUserCommand(): AddUserCommand
    {
        return new AddUserCommand($this);
    }

}
