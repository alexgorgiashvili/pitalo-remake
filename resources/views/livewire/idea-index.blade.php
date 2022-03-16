<div class="col-lg-4 crd">
    <div class="row crd-row g-0 border rounded overflow-hidden flex-lg-column flex-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="  col-4  col-lg-12 crd-head">
            <div class="h-100">
                <img class='index-image w-100 ' src="{{ url('storage/images',$idea->image ) }}" alt="">

            </div>
        </div>
        <div class=" col-8 col-lg-12 p-2 p-sm-4 d-flex flex-column position-static crd-body">
            <a href="{{ route('idea.show',$idea) }}" class="mb-0 fw-bold text-dark text-decoration-none">{{ $idea->title }}</a>
            <p class="card-text crd-text  pt-3 mb-auto" >{{ $idea->description }}</p>
            
            <div class="votes-div">
                <p class=" m-0 py-2 fw-bold @if ($hasVoted) text-danger @endif">{{ $votesCount }}</p>

                <div class="d-flex justify-content-between">
                    @if($hasVoted)

                    <button wire:click.prevent='vote' type="button" class="btn btn-info" >Voted</button>

                    @else

                    <button wire:click.prevent='vote' type="button" class="btn btn-secondary" >Vote</button>

                    @endif

                    @if($idea->spam > 0)
            
                    <span class="text-danger pt-1">Spam Reports:{{ $idea->spam }}</span>

                    @endif
                </div>

                
            </div>
            <div class="d-flex justify-content-between mt-4">
                <ul class="ps-0 mb-0 comment-ul">
                    <li class="list-unstyled text-secondary pe-4">{{ $idea->created_at->diffForHumans() }}</li>
                   
                </ul>
                <div>
                    <a href="{{ route('idea.show',$idea) }}" class="btn btn-dark ">Open</a>
                </div>
            </div>
        </div>
    
    </div>
</div>
