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
                    <h1 class="uppercase text-center text-2xl pb-5"> Generate fake data</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

        <form method="post" action="{{route('generate')}}">
            @csrf



            <div class="text-right pt-3">
                <button class="btn btn-dark w-full" type="submit"> Submit</button>
            </div>

        </form>
                </div>
            </div>
        </div>
    </div>







</x-app-layout>
