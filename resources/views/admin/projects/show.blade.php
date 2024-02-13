@extends('admin.adminmaster')
@section('content')

    @if(session('success'))
        <div id="alert-3"
             class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 mt-10 mx-auto w-1/2"
             role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                 viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Success</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}.
            </div>
            <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif



    <main class="w-full flex-grow p-6">
        {{-- <h1 class="text-3xl text-black pb-6">Tables</h1> --}}

       <div class="">
           <div class=" flex justify-center">
               <img src="{{asset("storage/$project->image")}} " class="w-2/5" alt="" >

           </div >
           <h1 class="text-center mt-3 text-3xl">{{$project->title}}</h1>
           <h1 class="text-center mt-3 text-2xl">{{$project->description}}</h1>
           <h1 class="text-center mt-3 text-1xl">
               @foreach($project->users as $user)
               {{$user->name}} ,
               @endforeach
           </h1>
           <div class="  text-center flex justify-center  ">
               <div class="flex items-center justify-center mt-6">
                   <div x-data="{ showModal: false, email: '' }">
                       <!-- Button to open the modal -->
                       <button @click="showModal = true" class="w-full   py-2 text-sm text-white font-medium text-white bg-blue-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500 p-2">  Assign to Artists </button>
                       <!-- Background overlay -->
                       <div x-show="showModal" class="fixed inset-0 transition-opacity" aria-hidden="true" @click="showModal = false">
                           <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                       </div>
                       <!-- Modal -->
                       <div x-show="showModal" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="fixed z-10 inset-0 overflow-y-auto" x-cloak>
                           <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                               <!-- Modal panel -->
                               <div class="w-full inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                  <form method="post" action="{{route('assign.users',$project->id)}}">
                                      @csrf
                                   <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                       <!-- Modal content -->
                                       <div class="sm:flex sm:items-start">

                                           <div class="w-full mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                               <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline"> add Artist </h3>
                                               <input type="hidden" value="{{$project->id}}">
                                               <div class="mt-2">
                                                   <select class="w-full   text-gray-700 bg-gray-200 rounded js-example-basic-multiple select2" id="users" name="users[]" multiple>
                                                       @foreach($users as $user)
                                                           <option value="{{ $user->id }}"   {{ $project->users->contains($user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
                                                       @endforeach
                                                   </select>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                       <!-- Subscribe button -->
                                       <button @click="subscribeToNewsletter" type="submitx" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"> add </button>
                                       <!-- Cancel button -->
                                       <button @click="showModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"> Cancel </button>
                                   </div>
                                  </form>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>


           </div>
           <div>


           </div>

       </div>


    </main>
@endsection

