<x-app-layout >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="container mx-auto  ">


            <div class="rounded-lg border border-dark text-center p-5 w-full my-2 grid grid-cols-4">

                <div class="text-left">
                    <form method="put" action="{{route('users.edit',$user->id)}}">
                    <p> Name:</p>
                    <input type="text" value="{{$user->name}}" name="name" field="name">
                </div>
                <div class="text-left">
                    <p>Email:</p>
                    <input type="email" value="{{$user->email}}" name="email" field="email" >
                </div>
                <div class="text-left">
                    <p>created:</p>
                    <input type="text" value="{{$user->created_at->diffForHumans()}}" disabled class="bg-gray-200/50 border-0">

                </div>


                <div class="text-right">



                            <button onclick=" return confirm('Are you sure?')" type="submit" class="btn">Confirm</button>
                        </form>


                </div>
            </div>

    </div>
    </div>







</x-app-layout>
