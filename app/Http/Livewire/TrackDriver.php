<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\isEmpty;

class TrackDriver extends Component
{
    public $track_Id;

    public function render()
    {

        $data['content'] = $this->track_driver();

        return view('livewire.track-driver', $data);
    }

    public function track_driver(){
        $response = Http::get('http://trypkg.com/track_driver/'. $this->track_Id);

        return $response->json();
    }
}
