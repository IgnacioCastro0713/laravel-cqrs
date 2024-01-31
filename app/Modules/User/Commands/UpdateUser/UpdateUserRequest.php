<?php

namespace App\Modules\User\Commands\UpdateUser;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        ];
    }

    public function toUpdateUserCommand(int $id): UpdateUserCommand
    {
        return new UpdateUserCommand($this, $id);
    }
}
