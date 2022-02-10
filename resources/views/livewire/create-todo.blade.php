<div>
@if($updateMode)
<form wire:submit.prevent="update">

 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Todo</label>
    <textarea  wire:model.debounce.500ms="todo" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    @error('todo') <span class="error">{{ $message }}</span> @enderror  
</div>
<div class="form-group">
<label for="exampleFormControlTextarea1">Deadline for Todo</label>
    <input type="datetime-local" class="form-control" wire:model="date_of_event">
    @error('date_of_event') <span class="error">{{ $message }}</span> @enderror
</div>
<hr />
<div class="form-group">
    <button class="form-control">Submit</button>
</div>
</form>

@else

<form wire:submit.prevent="submit">

 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Todo </label>
    <textarea  wire:model.debounce.500ms="todo" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    @error('todo') <span class="error">{{ $message }}</span> @enderror  
</div>
<div class="form-group">
<label for="exampleFormControlTextarea1">Deadline for Todo</label>
    <input type="datetime-local" class="form-control" wire:model="date_of_event">
    @error('date_of_event') <span class="error">{{ $message }}</span> @enderror
</div>
<hr />
<div class="form-group">
    <button class="form-control">Submit</button>
</div>
</form>
@endif
</div>

