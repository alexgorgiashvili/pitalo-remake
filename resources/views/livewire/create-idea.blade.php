<div
x-cloak
    x-data="{ isOpen: true }"
    x-show="isOpen"
    @keydown.escape.window="isOpen = false"
    @custom-show-poll1-modal.window="isOpen = true"
    @custom-show-poll2-modal.window="isOpen = false"

    x-transition.origin.bottom.duration.300ms
class="position-absolute w-100">
    

<form wire:submit.prevent='createIdea' class="add-form "  method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    {{-- <div class="alert alert-primary" role="alert">
        This is a primary alert—check it out!
      </div> --}}
    <div class="mb-3">
      <label for="title" class="form-label">Add Poll </label>
      <input  wire:model.defer='title' name="title" lang="is" type="text" class="form-control geo_input " ondragstart="return false;" ondrop="return false;" onpaste="return false" >
      @error('title')
      <p class="text-danger">{{ $message }}</p>  
      @enderror
      <p class="text-danger geo_key"></p>
    </div>
    <div class="form-floating mb-3">
        <textarea wire:model.defer='description'  data-gramm="false"
        class="form-control txt-area p-2 geo_input_area" name="description" maxlength="100"></textarea>
        @error('description')
        <p class="text-danger">{{ $message }}</p>
          
        @enderror
        <p class="text-danger geo_key_area"></p>
    </div>

        <input wire:model='image' name="image" class="form-control" type="file">
        <div class="form-check pt-3">
            {{-- <input  wire:model.defer='hide_name' name='hide_name' type="hidden" value="1" > --}}
            <input class="form-check-input no-focus cursor-pointer" wire:model.defer='hide_name' name='hide_name' type="checkbox" value="1"  >
            <label class="form-check-label" >
              Check For Hide Name
            </label>
        </div>
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