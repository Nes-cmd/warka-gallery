<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('All Users') }}
    </h2>
</x-slot>


<section class="p-5"> 
    <div class="container px-5">
      @if (Session::has('success'))
        <div class="alert alert-success d-flex align-items-center alert-dismissible" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div class="alert-dismissible">
                {{session('success')}}
                <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if(sizeof($pendingProcesses))
    <table class="table">
        <h2>Pending payments</h2>
            <thead>
              <tr>
                <th scope="col"> User Id</th>
                <th scope="col">Transaction Id</th>
                <th scope="col">Phone</th>
                <th scope="col">Country</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($pendingProcesses as $process)
                <tr>
                    <th scope="row">{{ $process->user_id }}</th>
                    <td>{{ $process->transaction_code }}</td>
                    <td>{{ $process->phone }}</td>
                    <td>{{ $process->country }}</td>
                    <td>
                      <button wire:click="approvePayed({{$process->id}})"class="btn btn-primary">Approve</button>
                      <button wire:click="cancelProcess({{$process->id}})"class="btn btn-secondary">Deny</button>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @endif
        <table class="table">
            <thead>
              <tr>
                <th scope="col"> Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button wire:click="notifyUpgrade({{$user->id}})"class="btn btn-warning">Upgrade</button>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</section>
