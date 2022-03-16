

<div class="show-ideas-container">

    <div class="col">
        <div class="row g-0 border rounded  flex-lg-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col-4 crd-head ">
                <div class="h-100">
                    <img class='index-image w-100 h-100 ' src="{{ url('storage/images',$idea->image ) }}" alt="">
    
                </div>
            </div>
            <div class="col-8 p-2 p-sm-4 d-flex flex-column position-static crd-body">
                <h3 class="mb-0">{{ $idea->title }}</h3>
                <p class="card-text crd-text pt-3 mb-auto">{{ $idea->description }}</p>
                @if($idea->spam > 0)
            
                <p class="text-danger bounceInDown">Spam Reports:{{ $idea->spam }}</p>

                @endif
                <div class="votes-div">
                    <p class=" m-0 py-2 fw-bold @if  ( $hasVoted )  text-danger @endif"> {{ $votesCount }}</p>
                    @if ($hasVoted)
                        <button wire:click.prevent='vote' type="button" class="btn btn-info text-dark" >Voted</button>
                    @else
                        <button wire:click.prevent='vote' type="button" class="btn btn-secondary" >Vote</button>
                    @endif



                    
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <ul class="d-md-flex ps-0 mb-0">
                        @if($idea->hide_name == null || $idea->hide_name == 0)
                        <li class="list-unstyled fw-bold pe-3">{{ $idea->user->name }}</li> 
                        
                        @endif

                        <li class="list-unstyled text-secondary pe-3">comments</li>  
                        <li class="list-unstyled text-secondary pe-3">{{ $idea->created_at->diffForHumans() }}</li>                    </ul>
                    
                    @auth
                    <div class='edit-btns d-flex' x-data>

                        @can('update', $idea)
                            <a href="#" 
                            @click="$dispatch('custom-show-edit-modal')" 
                            class="btn btn-secondary">Edit</a>
                        @endcan 
                        

                        <div class="dropdown ms-1">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                              Menu
                            </button>
                            <ul class="dropdown-menu spam-dropdown" aria-labelledby="dropdownMenuButton1">
                                @can('delete', $idea)
                                <li class="dropdown-item"><button class=" btn"  
                                    @click="$dispatch('custom-show-delete-modal')" 
                                    >Delete</button>
                                </li>
                                @endcan
                                <li class="dropdown-item"><button class=" btn"  
                                    @click="$dispatch('custom-show-spam-modal')" 
                                    >Mark As Spam</button>
                                </li>
                                @admin
                                <li class="dropdown-item"><button class=" btn"  
                                    @click="$dispatch('custom-show-clear-spam-modal')" 
                                    >Clear Spam</button>
                                </li>
                                @endadmin
                            </ul>
                        </div>
                       
                       
                    </div>
                    @endauth
                    
                        
                    
                </div>
            </div>
        
        </div>
    </div>

    {{-- Reply  --}}
    <div class="col">
        <div class="dropdown d-inline">
            <button class="btn btn-primary " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Reply
            </button>
            
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">

                    <form action="#" method="post">
                        <textarea class="comment-area form-control dropdown-item text-wrap" name="reply" id="floatingTextarea"></textarea>
                        <button class="  btn btn-success"type="submit">Comment</button>
                    </form>
                </div>

                
            
        </div>
        <div class="dropdown d-inline">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Set Status
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
    </div>
</div>
