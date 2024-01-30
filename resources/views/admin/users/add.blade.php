@extends('adminmaster')
@section('content')
    <main class="w-full flex-grow p-6 mx-auto bg-amber-500">
        <h1 class="w-full text-4xl text-black pb-6 text-center ">Add Book</h1>
        <div class="w-2/3 lg:w-1/2 my-6 pr-0 lg:pr-2 bg-amber-950 mx-auto">
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('register') }}" >
                    @csrf
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="name">title</label>
                        <input class="w-full px-5 py-4 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" value="{{old('name')}}"  placeholder="Your Name" aria-label="Name">
                        @error('name')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">author</label>
                        <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" value="{{old('author')}}" id="email" name="author" type="text"  placeholder="Your Email" aria-label="Email">
                        @error('author')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">genre</label>
                        <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="email" name="genre" value="{{old('genre')}}" type="text"  placeholder="Your Email" aria-label="Email">
                        @error('genre')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="message">description</label>
                        <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="message"  name="description" rows="6"  placeholder="Your inquiry.." aria-label="Email">{{old('description')}}</textarea>
                        @error('description')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">total copies</label>
                        <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="email" name="total_copies" type="number" value="{{old('total_copies')}}"  placeholder="Your Email" aria-label="Email">
                        @error('total_copies')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">available copies</label>
                        <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="email" name="available_copies" type="number" value="{{old('available_copies')}}" placeholder="Your Email" aria-label="Email">
                        @error('available_copies')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">publication year</label>
                        <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="email" name="publication_year" type="date" value="{{old('publication_year')}}"  placeholder="Your Email" aria-label="Email">
                        @error('publication_year')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-6">
                        <button class="px-4 py-1 w-full text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </main>
@endsection
