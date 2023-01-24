<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ADD SLIDER
        </h2>
    </x-slot>

    <div class="py-12">
        @if ( session('message') )
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-5">
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">Success alert!</span> {{ session('message') }} 
                </div>
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ url('/sliders/create') }}" enctype = "multipart/form-data">
                        @csrf

                        <div class = "mb-3">
                            <label>Title</label>
                            <input type = "text" name = "title" class = "block mt-1 w-full">
                        </div>
                        <div class = "mb-3">
                            <label>Description</label>
                            <textarea name = "description" class = "block mt-1 w-full" rows = "3"></textarea>
                        </div>
                        <div class = "mb-3">
                            <label>Image</label>
                            <input type = "file" name = "image" class = "block mt-1">
                        </div>
                        <div class = "mb-3">
                            <button type = "Submit"  class = "block mt-1 w-full">Submit</button>
                        </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
 