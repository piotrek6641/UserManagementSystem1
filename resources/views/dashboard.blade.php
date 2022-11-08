<x-app-layout >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>

            <div class="container mx-auto  ">
                <div class="form-control">
                    <form method="get" action="{{route('search')}}">
                        @csrf
                    <div class="input-group pt-5">
                    <select class="select select-bordered" name="option">
                        <option disabled selected>Search By:</option>
                        <option value="id">ID</option>
                        <option value="name">Name</option>
                        <option value="email">E-Mail</option>
                    </select>
                        <input type="text" placeholder="Search" class="input input-bordered w-full" field="text" name="text" />
                        <button class="btn" type="submit"> Go!</button>

                </div>
                    </form>
                </div>
                <form method="get" action="{{route('filter')}}">
                    @csrf
                    <div class="input-group pt-5">
                        <select class="select select-bordered" name="option">
                            <option disabled selected>Filter By:</option>
                            <option value="id">ID</option>
                            <option value="name">Name</option>
                            <option value="email">E-Mail</option>
                            <option value="updated_at">Updated at</option>
                        </select>

                        <button class="btn" type="submit"> Go!</button>

                    </div>
                </form>
            @foreach($users as $user)
                <div class="rounded-lg border border-dark text-center p-5 w-full my-2 grid grid-cols-6">
                    <div class="text-left">
                        <p> Name:</p>
                    <p>{{$user->name}}</p>
                    </div>
                    <div class="text-left">
                        <p>Email:</p>
                        <p>{{$user->email}}</p>
                    </div>
                    <div class="text-left">
                        <p>created:</p>
                        <p>{{$user->created_at->diffForHumans()}}</p>
                    </div>
                    <div class="text-left">
                        <p>updated:</p>
                        <p>{{$user->updated_at->diffForHumans()}}</p>
                    </div>
                    <div class="text-left">
                        <p>baned?</p>
                        <p>@if($user->isbaned==1)Yes @else No @endif</p>
                    </div>
                    <div class="text-right ">
                        <div class="btn-group w-5/6">
                            <form method="post" class="btn bg-red-500 " action="{{route('users.destroy',$user->id)}}">
                            @csrf
                                @method('delete')

                        <button onclick="return confirm('Are you sure?')" class="">Remove</button>
                            </form>
                            <form method="get" action="{{route('users.show',$user->id)}}" class="btn w-1/3"> @csrf <button class="w-full" type="submit"> Edit</button></form>
                        <form class="btn bg-purple-500 w-1/3" method="post" action="{{route('ban',$user->id)}}"> @csrf @method('put') <button type="submit"> @if($user->isbaned==1)Unban @else Ban @endif</button> </form >
                    </div>
                    </div>
                </div>
            @endforeach
                <div>{{ $users->links() }} </div>
            </div>

        </div>







</x-app-layout>
