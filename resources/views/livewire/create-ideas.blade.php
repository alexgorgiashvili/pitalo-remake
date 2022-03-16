<div 
x-cloak
    x-data="{ isOpen: false }"
    x-show="isOpen"
    @keydown.escape.window="isOpen = false"
    @custom-show-poll2-modal.window="isOpen = true"
    @custom-show-poll1-modal.window="isOpen = false"

    x-transition.origin.bottom.duration.300ms
class="position-absolute w-100">
    

<form wire:submit.prevent='createIdeas' class="add-form " action='#' method="POST" enctype="multipart/form-data">
    @csrf
    

    <div class="mb-3">
      <label  class="form-label">Add Poll </label>
      <input wire:model.defer='title1' type="text" class="form-control"  aria-describedby="emailHelp" >
      @error('title')
      <p class="text-danger">{{ $message }}</p>  
      @enderror
    </div>
    <div class="mb-3">
        <label  class="form-label">Add Poll </label>
        <input wire:model.defer='title2' type="text" class="form-control"  aria-describedby="emailHelp" >
        @error('title')
        <p class="text-danger">{{ $message }}</p>  
        @enderror
      </div>

    <div class="form-floating mb-3">
        <textarea wire:model.defer='description'     data-gramm="false"
        class="form-control txt-area p-2" name="idea" maxlength="100"></textarea>
        @error('description')
        <p class="text-danger">{{ $message }}</p>
          
        @enderror
    </div>

        <input wire:model='image1' name="image" class="form-control" type="file">

        <input wire:model='image2' name="image" class="form-control" type="file">


        <button type="submit" class="btn btn-primary mt-2 d-block ms-auto">Add</button>

        @if (session('success_message'))

        <div
        x-data="{ show: true }" x-show="show"
        x-init="setTimeout(() => show = false, 3000)"
        class="alert alert-success mt-2" role="alert">
            <strong>{{ session('success_message') }}</strong>
        </div>
            
        @endif
</form>

</div>