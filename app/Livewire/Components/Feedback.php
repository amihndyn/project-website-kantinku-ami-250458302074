<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Feedback as FeedbackModel;

class Feedback extends Component
{
    public $name = '';
    public $email = '';
    public $message = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ];

    public function submitFeedback()
    {
        $this->validate();

        // Simpan ke database
        FeedbackModel::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
            'status' => 'pending',
        ]);

        // Reset form
        $this->reset(['name', 'email', 'message']);

        // Success message
        session()->flash('feedback_success', 'Terima kasih! Feedback Anda telah dikirim dan akan segera kami tinjau.');
    }

    public function render()
    {
        return view('livewire.components.feedback');
    }
}