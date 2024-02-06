@extends('admin.adminmaster')
@section('content')
    <main class="w-full flex-grow p-6 mx-auto bg-amber-500">
        <h1 class="w-full text-4xl text-black pb-6 text-center ">Add Book</h1>
        <div class="w-2/3 lg:w-1/2 my-6 pr-0 lg:pr-2 bg-amber-950 mx-auto">
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl" method="POST"
                      action="{{ route('users.update' ,$user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="name">Name</label>
                        <input class="w-full px-5 py-4 text-gray-700 bg-gray-200 rounded" id="name" name="name"
                               type="text" value="{{old('name',$user->name)}}" placeholder="Your Name"
                               aria-label="Name">
                        @error('name')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="name">Email</label>
                        <input class="w-full px-5 py-4 text-gray-700 bg-gray-200 rounded" id="email" name="email"
                               type="email" value="{{old('email' ,$user->email)}}" placeholder="Your email"
                               aria-label="email">
                        @error('email')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="name">Password</label>
                        <input class="w-full px-5 py-4 text-gray-700 bg-gray-200 rounded" id="password" name="password"
                               type="password" disabled value="{{old('password',$user->password)}}"
                               placeholder="Your Password" aria-label="password">
                        @error('password')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600">Password Confirmation</label>
                        <select class="w-full px-5 py-4 text-gray-700 bg-gray-200 rounded" name="role_id">
                            <option value="">Select Role</option>
                            <option value="2" <?= $user->role_id == 2 ? 'selected' : '' ?> >User</option>
                            <option value="1" <?= $user->role_id == 1 ? 'selected' : '' ?>>Admin</option>
                        </select>
                        @error('role_id')
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
