<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateProjectRequest extends FormRequest
{
    public function project()
    {
        // return $this->route('project'); // route binding from controller
        return Project::findOrFail($this->route('project')); // controller have no route binding
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('update', $this->project());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'notes' => 'nullable',
        ];
    }

    public function save()
    {
        return tap($this->project())->update($this->validated());
    }
}
