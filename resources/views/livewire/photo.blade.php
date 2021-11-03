<div class="bg-indigo-500">
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Photos') }}
    </h2>
</x-slot>

<section >
    <div >
        @if(session()->has('success'))
            <div class="alert alert-success d-flex align-items-center alert-dismissible" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill"/>
                </svg>
                <div class="alert-dismissible">
                    {{session('success')}}
                    <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif 
        
        <div class="input-group">
            <select wire:select='render' wire:model.lazy='category_id' class="form-select border-3" id="inputGroupSelect04" aria-label="Example select with button addon">
                @foreach ($categories as $category)
                    <option value="{{ $category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <select wire:select="render" wire:model.lazy='order_by' class="form-select border-3">
                @foreach ($sortings as $sorting)
                    <option value="{{$sorting->code}}">{{$sorting->name}}</option>
                @endforeach
            </select>
            <form wire:submit.prevent='addCategory'>
                <input wire:model.lazy='new_categogy' class="border-3" type="text" required placeholder="Add new category">
            </form>
        </div>
            
        <div class="row">
            <div class="row">
              @forelse ($photos as $photo)
                <div class="card col-md-{{$default_large_size}} col-{{$default_small_size}} p-0 border-1">
                  <div  class="gallery">
                    <a href="{{ asset('storage/'.$photo->url)}}" data-lightbox="mygallery" data-title="{{$photo->name}}"><img  src="{{ asset('storage/'.$photo->url)}}" ></a>
                    <input class="checkbox" type="checkbox" wire:model="checked_photo"  value="{{$photo->id}}" name="checked_photo" id="{{$photo->id}}">  
                  </div>
                </div> 
                @empty
                <h2>You don't have any photos in this category.</h2> 
              @endforelse
            </div>
        </div>
        
        <div class="btn-group px-5" role="group" aria-label="Basic mixed styles example">
            <button type="button" class="btn btn-danger" wire:click='deleteSelected'>Delete <i class="bi bi-basket-fill"></i> </button>
            <button type="button" wire:click="download" class="btn btn-success">Download <i class="bi bi-download"></i></button>
            <input type="checkbox" wire:click="selectAll" {{ sizeof($photos) == sizeof($checked_photo)?'checked':'' }} class="border-5 h-10 w-10 bi bi-check2-all" id="checkAll">
          </div>
        <div class="card">
            <div class="card-header">
                Upload new Photo
            </div>
            <div class="card-body">
                <form wire:submit.prevent='addPhoto' class="" enctype="multipart/form-data">
                    <div
                        x-data="{ isUploading: false, progress: 0 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                    <input class="form-control" type="file" required name='file' wire:model='url' multiple="5">
                    <div x-show="isUploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                    @error('url.*') 
                        <span class="error text-danger">{{ $message }}<br></span>
                    @enderror
                    </div>
                    <select class="form-control mt-3" name="category_id" id="" wire:model.lazy='category_id'>
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id}}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="error text-danger">{{ $message }}<br></span>
                    @enderror
                    <input type="text" wire:dirty.class='border-danger' class="form-control mt-3" name="name" wire:model.lazy='name' placeholder="Name(Optional)">
                    @error('name')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <button wire:loading.attr="disabled" type="submit" class="btn btn-success mt-3">Upload <i class="bi bi-upload"></i>  </button>
                    <div wire:loading wire:target="addPhoto">
                        Saving...
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</section>
</div>
<script>
    
</script>


