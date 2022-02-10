<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Todo;
use Carbon\Carbon;

class CreateTodo extends Component
{
    public $todo = '';
    public $date_of_event = '';
    public $timezone = '';
    public $todo_data;
    public $updateMode = false;
    protected $listeners = ['updateData'];

    protected $rules = [
        'todo' => 'required|min:3|max:60|string',
        'date_of_event'=>  'required'   
    ];


    public function mount() {
        $this->timezone =  geoip()->getLocation()->timezone;
    }
    private function resetInput(){
        $this->todo = '';
        $this->date_of_event = '';
    }
    public function submit()
    {
        $this->validate();
        Todo::create([
            'todo' => $this->todo,
            'date_of_event' => $this->date_of_event,
            'timezone'=> $this->timezone,
            'created_by'=>auth()->user()->id
        ]);
        session()->flash('status', 'Todo created successfully');
        $this->resetInput();
        return redirect()->to('/');
    }

  
public function getDateLocal($date)
{

    $datetime = Carbon::createFromFormat('Y-m-d H:i:s', $date);
    $datetime->shiftTimezone($this->timezone);
    return $datetime; 
}
    public function update()
    {
        $this->validate();
        $this->todo_data = Todo::findOrFail($this->todo_data['id']);
        $this->todo_data->todo = $this->todo;
        $this->todo_data->date_of_event = $this->date_of_event;
        $this->todo_data->timezone = $this->timezone;
        $this->todo_data->modified_by = auth()->user()->id;
        $this->todo_data->save();
        $this->updateMode=false;
        session()->flash('status', 'Todo updated successfully');
        $this->resetInput();
        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.create-todo');
    }
    public function updateData($data){
        if ($data){
            $this->updateMode = true;
            $this->todo_data = $data;
            $this->todo = $data['todo'];
            $this->date_of_event = $data['date_of_event'];

        }
    }
}
