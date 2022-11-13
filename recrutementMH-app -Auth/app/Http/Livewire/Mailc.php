<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mail;

class Mailc extends Component
{
    public $name;
    public $email;
    public $message;

    public function submitForm(){
        Mail::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        $this->reset(['name', 'email', 'message']);
        $this->success = 'your message has been sent successfully';
    }

    public function render()
    {
        return view("dashboard");
    }

}
