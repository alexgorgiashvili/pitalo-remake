<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Vote;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Response;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Request;

class CreateIdea extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $image;
    public $hide_name;

    // protected $rules = [
    //     'title' => 'required|min:4|max:25',
    //     'description' => 'required|min:4',
    //     'image' => 'required'
        
    // ];

    public function createIdea()
    {
        $val = $this->validate([
            'title' => 'required|min:4|max:40',
            'description' => 'required|min:4',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:3072', 
  
        ]);
        // dd($this);
    

        $ident = Idea::where('title', '=', $this->title)->first();
        

        if($ident){
            $id = $ident->slug;
            return redirect()->route('idea.show', $id);
        }

        $image = $this->image;
        $name = $image->getClientOriginalName();
        $input['image'] = time().'.'.$name;
        
        $destinationPath = public_path('storage/images');
        
        Image::make($image->getRealPath())
                ->resize(500, 500, function ($constraint) {
		            $constraint->aspectRatio();
		       })->save($destinationPath.'/'.$input['image']);

            $survey = new Idea;
            $survey->title = $this->title;
            $survey->user_id = auth()->id();
            $survey->description = $this->description;
            $survey->hide_name = $this->hide_name;
            $survey->image = $input['image'];
            $survey->save();


        session()->flash('success_message', 'Survey was added successfully.');
        $this->reset();
        return redirect()->route('idea.index');
    }

    public function render()
    {
        return view('livewire.create-idea');
    }
}

