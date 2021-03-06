<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Response;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;

class EditIdea extends Component
{
    use WithFileUploads;
    public $idea;
    public $title;
    public $description;
    public $image;

    // protected $rules = [
    //     'title' => 'required|min:4|max:25',
    //     'description' => 'required|min:6|max:150',
    //     'image' => 'required'
    // ];

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->title = $idea->title;
        $this->description = $idea->description;
    }

    public function updateIdea()
    {
        if (auth()->guest() || auth()->user()->cannot('update', $this->idea)) {
            abort(403);
        }
            
       $this->validate([
            'title' => 'required|min:4|max:40',
            'description' => 'required|min:6|max:100',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:3072'
            
        ]);
        $image = $this->image;
        $name = $image->getClientOriginalName();
        $input['image'] = time().'.'.$name;
        $destinationPath = public_path('storage/images');
        $oldimg = $destinationPath.'/'.$this->idea->image;
        $pathname = $destinationPath.'/'.$input['image'];
        
        if(!empty($image)){
            if(File::exists($oldimg)){
                File::delete($oldimg);
            }
            $this->idea->update([
                'title' => $this->title,
                'description' => $this->description,
                'image' => $input['image'],
            ]);
        }else{
            $this->idea->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);
        }
        Image::make($image->getRealPath())
                ->resize(500, 500, function ($constraint) {
		            $constraint->aspectRatio();
		       })->save($pathname);


        $this->emit('ideaWasUpdated');
    }

    public function render()
    {
        return view('livewire.edit-idea');
    }
}
