<?php

declare(strict_types=1);

namespace App\Http\Requests\Nudge;

use App\Models\Nudge;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        /** @var Nudge $nudge */
        $nudge = $this->nudge;

        return [
            'title' => ['required', 'unique:nudges,title,'.$nudge->id, 'min:3', 'max:100'],
            'content' => 'required|string|min:10|max:500',
            'code' => 'required|string',
            'draft' => 'required|boolean',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'draft' => $this->boolean('draft'),
        ]);
    }
}
