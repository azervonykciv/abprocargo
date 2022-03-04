<?php

namespace App\Http\Livewire\Admin\Appointments;

use Livewire\Component;
use App\Models\Appointment;

class ListAppointments extends Component
{
    public function render()
    {

        $appointments = Appointment::with('client')->latest()->paginate();

        return view('livewire.admin.appointments.list-appointments', [
            'appointments' => $appointments,
        ]);
    }
}
