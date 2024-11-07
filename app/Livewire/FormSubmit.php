<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Submission;

class FormSubmit extends Component
{
    public $full_name;
    public $gender = 'na';
    public $phone_number;
    public $location = 'Not Decided Yet';

    public $successMessage;

    // Validation rules
    protected $rules = [
        'full_name' => 'required|string|max:255',
        'gender' => 'required|in:male,female,na',
        'phone_number' => 'required|string|max:15',
        'location' => 'required|in:Sen Sok,Chroy Chongvar,Not Decided Yet',
    ];

    public function submitForm()
    {
        // Validate the request data
        $this->validate();

        // Store the form data
        Submission::create([
            'full_name' => $this->full_name,
            'gender' => $this->gender,
            'phone_number' => $this->phone_number,
            'location' => $this->location,
        ]);

        // Reset form fields
        $this->reset(['full_name', 'gender', 'phone_number', 'location']);

        // Set success message
        $this->successMessage = 'Form submitted successfully!';
    }
    public function render()
    {
        return view('livewire.form-submit');
    }
}