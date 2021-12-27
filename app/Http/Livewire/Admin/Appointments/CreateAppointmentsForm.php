<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use Livewire\Component;
use App\Models\Client;

class CreateAppointmentsForm extends Component
{

    public $state = [];

    public function createAppointment()
    {
        $this->state['time'] = '00:00:00';
        $this->state['status'] = 'Open';
        Appointment::create($this->state);

        $this->dispatchBrowserEvent('alert', ['message' => 'Appointment create Success']);
    }
    

    public function render()
    {
        $clients = Client::all();

        return view('livewire.admin.appointments.create-appointments-form', [
            'clients' => $clients,
        ]);
    }
}