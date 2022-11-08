<x-app-layout >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg container">
                <div class="">
                    <h1 class="uppercase text-center text-2xl pb-5"> Create a user</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
        <form method="post" action="{{route('users.store')}}">
            @csrf

            <div class="form-control">
                <div class="input-group">
                <label class="input-group">
                    <span>Name</span>
                    <input type="text" placeholder="New name" class="input input-bordered " field="name" name="name"/>
                </label>
                <label class="input-group ">
                    <span>Email</span>
                    <input type="email" placeholder="New email" class="input input-bordered " field="email" name="email"/>
                </label>
                <label class="input-group ">
                    <span>password</span>
                    <input type="password" placeholder="New password" class="input input-bordered " field="password" name="password"/>
                </label>
                </div>
            </div>

            <div class="text-right pt-3">
                <button class="btn btn-dark " type="submit"> Submit</button>
            </div>

        </form>
                </div>
            </div>
        </div>
    </div>







</x-app-layout>
