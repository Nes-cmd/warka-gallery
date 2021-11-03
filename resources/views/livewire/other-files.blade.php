<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Files') }}
    </h2>
</x-slot>
<div class="container">
    @if (Session::has('success'))
            <div class="alert alert-success d-flex align-items-center alert-dismissible" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div class="alert-dismissible">
                    {{session('success')}}
                    <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
        @endif
    <div class="card col-lg-12">
        <div class="card-header">
            All files you have
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col" width="2%">Id</th>
                    <th scope="col-sm-2" width="15%">Name</th>
                    <th scope="col" width="10%">Uploaded_at</i></th>
                    <th scope="col" width="10%">Size</th>
                    <th scope="col" width="20%">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($files as $file)
                    <tr>
                        <th scope="row">{{$file->id}}</th>
                        <td scope="row">{{$file->name}}</td>
                        <td>{{$file->created_at->diffForHumans()}}</td>
                        <td>{{$file->size/1024 < 1 ? $file->size .' Kb':number_format($file->size/1024,3).' Mb'}}   </td>
                        <td>
                            <a href="{{ asset('storage/'.$file->url)}}" class="btn btn-success" download="{{$file->name}}"><i class="d-none d-sm-block">Download</i> <i class="bi bi-download"></i></a>
                            <button class="btn btn-danger" wire:click="daleteFile({{$file->id}})"><i class="d-none d-sm-block">Delete</i> <i class="bi bi-basket2"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <th width="100%" colspan="4" >
                            <h2>You don't have any files</h2>
                        </th>
                    </tr>
                    
                   @endforelse
                </tbody>
              </table>
        </div>
        <div class="card-footer">
            <form wire:submit.prevent='uploadFile'>
                <div class="mb-2 col-md-6">
                    <div
                        x-data="{ isUploading: false, progress: 0 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                    <input type="file" wire:model='url' class="form-control mb-3" id="inputGroupFile02" required>
                    <div x-show="isUploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                    <input type="text" wire:model='name' class="form-control mb-3" id="inputGroupFile02" placeholder="Name(Optional)">
                    <button type="submit" wire:loading.attr="disabled" class="btn btn-primary" for="inputGroupFile02">Upload <i class="bi bi-upload"> </i> </button>
                </div>
                @error('url')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </form>
        </div>
    </div>
</div>
