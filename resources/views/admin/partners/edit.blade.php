@extends('admin.adminmaster')
@section('content')
    <main class="w-full flex-grow p-6 mx-auto bg-amber-500">
        <h1 class="w-full text-4xl text-black pb-6 text-center ">Edit  Partners</h1>
        <div class="w-2/3 lg:w-1/2 my-6 pr-0 lg:pr-2 bg-amber-950 mx-auto">
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl" enctype="multipart/form-data"  method="POST" action="{{ route('partners.update',$partner->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="name">name</label>
                        <input class="w-full px-5 py-4 text-gray-700 bg-gray-200 rounded" id="name" name="name"
                               type="text" value="{{old('name',$partner->name)}}" placeholder="Your name" aria-label="name">
                        @error('name')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>


                        <label class="block text-sm text-gray-600" for="name">Password</label>
                        <input class="w-full px-5 py-4 text-gray-700 bg-gray-200 rounded" id="image" name="image"
                               type="file" value="{{old('image')}}" placeholder="Your image"
                               aria-label="password">
                        @error('image')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mt-6">
                        <button class="px-4 py-1 w-full text-white font-light tracking-wider bg-gray-900 rounded"
                                type="submit">Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </main>
@endsection
