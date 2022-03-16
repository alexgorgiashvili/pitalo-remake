

<x-app-layout>
    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
          Choose Poll
        </a>
      
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" x-data>
          <li><button
             @click="$dispatch('custom-show-poll1-modal')" 
             class="dropdown-item" href="#">Poll-1
             </button>
          </li>
          <li><button
             @click="$dispatch('custom-show-poll2-modal')" 
             class="dropdown-item" href="#">Poll-2
             </button>
          </li>
         
        </ul>
      </div>
                    @auth

                    <div class="position-relative">
                        <livewire:create-idea/>
                        <livewire:create-ideas/>
                    </div>
                    

                    @else
                        <div class="text-center ">
                            <p>Login or Register To Add Poll</p>
                            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                        </div>
                        
                    @endauth

</x-app-layout>
