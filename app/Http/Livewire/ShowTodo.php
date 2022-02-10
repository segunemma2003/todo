<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Todo;

class ShowTodo extends Component
{
    public $todos;
  
    public $timezone;

    public function mounted() {
        
        $myl =geoip()->getLocation()->timezone;
        $this->timezone =  $my1;
    }


    public function render()
    {
        $this->todos = Todo::latest()->get();
        return view('livewire.show-todo');
    }

    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return $this->emit('updateData',$todo);
    }

    public function delete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        session()->flash('status', 'Todo deleted successfully');
        return redirect()->back();
    }
    public function getDateLocal($date)
    {

        $datetime = Carbon::createFromTimestamp($date);
        $datetime->setTimezone($this->timezone)->isoFormat("MMMM Do YYYY, h:mm:ss a");
        return $datetime; 
    }
 
}
