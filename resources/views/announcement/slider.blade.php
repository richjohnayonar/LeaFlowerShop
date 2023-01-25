<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Announcement') }}
        </h2>
    </x-slot>

    <div class = "py-12">
        <div class = "col-md-12">
            @if ( session('status') )
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-5">
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">Success alert!</span> {{ session('status') }} 
                </div>
            </div>
        @endif

        <div class="">
    <h3 class="text-center text-2xl font-medium">Slider List</h3>
</div>
<div class="flex items-center justify-center my-8">
    <a href="{{ url('/sliders/create')}}" class="bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg">
        Add Slider
    </a>
</div>


    <div class="mx-auto mt-8">
                    <table class="table-auto w-full text-center">
                        <thead>
                            <tr>
                            <th class = "border-solid border-2 border-light-blue-500 p-1 bg-red-300">ID</th>
                            <th class = "border-solid border-2 border-light-blue-500 p-1 bg-red-300">Title</th>
                            <th class = "border-solid border-2 border-light-blue-500 p-1 bg-red-300">Description</th>
                            <th class = "border-solid border-2 border-light-blue-500 p-1 bg-red-300">Image</th>
                            <th class = "border-solid border-2 border-light-blue-500 p-1 bg-red-300">Status</th>
                            <th class = "border-solid border-2 border-light-blue-500 p-1 bg-red-300">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach ($sliders as $slider)
                        <tr class="mb-2">
                        <td class="p-1">{{$slider->id}}</td>
                            <td class="p-1">{{$slider->title}}</td>
                            <td class="p-1">{{$slider->description}}</td>
                            <td class="p-1">
                            <img src="{{ asset($slider->image)}}" class="h-32 w-full object-cover" alt="Slider">
                            </td>
                            <td class="p-1">{{$slider->status == '0' ? 'Visible':'Hidden' }}</td>
                            <td class="p-1">
                            <a href = "{{ url('/sliders/'.$slider->id.'/edit')}}" class = "btn btn-success bg-green-500 text-white">Edit</a>
                            <a href = "{{ url('/sliders/'.$slider->id.'/delete')}}" 
                            onclick="return confirm('Are you sure you want to delete this Slider?');"
                            class = "btn btn-danger bg-red-500 text-white">
                            Delete</a>
                            </td> 
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
        

</x-app-layout>