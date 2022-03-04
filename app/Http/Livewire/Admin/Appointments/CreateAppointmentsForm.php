<?php

namespace App\Http\Livewire\Admin\Appointments;
use Illuminate\Support\Facades\Validator;

use App\Models\Appointment;
use Livewire\Component;
use App\Models\Client;

class CreateAppointmentsForm extends Component
{

    public $state = [
        'status' => 'SCHEDULED'
    ];

    public function createAppointment()
    {
        Validator::make($this->state, [
            'client_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'note' => 'nullable',
            'status' => 'required|in:SCHEDULED,CLOSED',
        ], 
        [
            'client_id.required' => 'The Client Field Is Required.'
        ])->validate();

        
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
