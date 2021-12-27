<?php

namespace App\Http\Livewire\Admin\Appointments;

use Livewire\Component;
use App\Models\Client;

class CreateAppointmentsForm extends Component
{

    public $state = [];

    public function createAppointment()
    {
        dd($this->state);
    }
    

    public function render()
    {
        $clients = Client::all();

        return view('livewire.admin.appointments.create-appointments-form', [
            'clients' => $clients,
        ]);
    }
}
