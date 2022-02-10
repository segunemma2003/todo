<div>

<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Todo</th>
        <th scope="col">Deadline</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if(!is_null($todos))
        @foreach($todos as $todo)
        <tr>
        <th scope="row">{{$loop->index+1}}</th>
        <td>{{$todo->todo}}</td>
        <td>{{ \Carbon\Carbon::parse($todo->date_of_event,'UTC')->setTimezone($timezone)->isoFormat("MMMM Do YYYY, h:mm:ss a") }}</td>
        <td>
            <button wire:click="edit({{$todo->id}})" class="btn btn-primary btn-sm">Edit</button>
            <button wire:click="delete({{$todo->id}})" class="btn btn-danger btn-sm">Delete</button>
        </td>
        </tr>
        @endforeach
        @endif
       
    </tbody>
    </table>
</div>
