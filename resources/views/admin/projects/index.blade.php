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

        <a class="px-6  py-4 bg-blue-800 rounded-2xl text-blue-50 float-right " href="{{route('projects.create')}}">Add Projects</a>

        <div class="w-full mt-20">
            <p class="text-xl pb-3 flex items-center float-right">
                {{-- <i class="fas fa-list mr-3"></i> Table Example --}}


            </p>
            <div class="bg-white overflow-auto">
                <table class="min-w-full leading-normal mb-4 ">
                    <thead>
                    <tr>
                        <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Id
                        </th>
                        <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Title
                        </th>
                        <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            description
                        </th>

                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            date create
                        </th>
                        <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            image
                        </th>
                        <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Actions
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{$project->id}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{$project->title}}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{$project->description}}
                                </p>
                            </td>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{$project->created_at->format('Y-m-d') }}
                                </p>
                            </td>
                            <td class="py-5 border-b border-gray-200 bg-white text-sm">

                                <img class="h-10 rounded-3xl" src="{{asset('storage/'.$project->image)}}" alt="{{$project->title}}" >

                            </td>


                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm flex ">

                                <form action="{{route('projects.edit', $project->id)}}" method="get">
                                    @csrf
                                    <input type="submit" value="edit"
                                           class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                </form>
                                <form action="{{route('projects.show', $project->id)}}" method="get">
                                    @csrf
                                    <input type="submit" value="Show"
                                           class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                </form>
                                <form action="{{route('projects.destroy', $project->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="delete" onclick="return confirm('are you sure ')"
                                           class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                </form>

                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $projects->links() }}

            </div>
        </div>
    </main>
@endsection

