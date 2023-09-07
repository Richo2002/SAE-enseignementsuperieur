<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Archivist extends Component
{

    public function enableOrDisable(int $i)
    {dd('ok');
        $archivist = User::where('type', '<>', 'Super Administrateur')->findOrfail(intval($i));

        $archivist->status ? $archivist->update(['status' => false]) : $archivist->update(['status' => true]);

        session()->flash('message', $archivist->status ? 'Compte activé avec succès' : 'Compte désactivé avec succès');
        $this->emit('closeModal');
    }

    public function render()
    {
        $archivists = User::where('type', '<>', 'Super Administrateur')->get();
        return view('livewire.archivist', [
            'archivists' => $archivists
        ]);
    }

}
