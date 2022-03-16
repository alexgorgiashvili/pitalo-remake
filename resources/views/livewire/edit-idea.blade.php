

<div x-data class="modal-fixed w-100">
    <div
    x-cloak
    x-data="{ isOpen: false }"
    x-show="isOpen"
    @keydown.escape.window="isOpen = false"
    @custom-show-edit-modal.window="isOpen = true"
    x-transition.origin.bottom.duration.300ms
    x-init="
        window.livewire.on('ideaWasUpdated',() => {
            isOpen = false
        })
    "
    
    class="modal-dialog">
        <form wire:submit.prevent='updateIdea' action=""  method="post" enctype="multipart/form-data" >
            <div class="modal-content">
                <button @click="isOpen = false" class="btn-close ms-auto p-2" ></button>

                <div class="modal-header d-inline ">
                    <input wire:model.defer='title' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    @error('title')
                    <p class="text-danger">{{ $message }}</p>  
                    @enderror
                </div>
                <div class="modal-body">
                    <textarea wire:model.defer='description' maxlength="100" class="form-control" name="idea" id="floatingTextarea" required></textarea>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror     
                </div>
                <div class="modal-footer">
                    <input wire:model.defer='image' name="image" class="form-control" type="file">

                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
  </div>
  
