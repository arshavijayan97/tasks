<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <!-- resources/views/invoice_form.blade.php -->
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Enter The Details') }}
        </h2>

    </header>
    @if ($errors->has('error'))
    <div class="alert alert-danger">{{ $errors->first('error') }}</div>
@endif

<!-- Display errors for the 'title', 'description', and 'category' fields -->

@error('title')
    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
@enderror

@error('description')
    <div class="alert alert-danger"  style="color: red;">{{ $message }}</div>
@enderror

@error('category')
    <div class="alert alert-danger"  style="color: red;">{{ $message }}</div>
@enderror
@error('due_date')
    <div class="alert alert-danger"  style="color: red;">{{ $message }}</div>
@enderror

    <form id="myForm" method="post" action="{{ route('tasks.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
 @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

        
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title"  required class="mt-1 block w-full">
        <span id="titleError" class="error-message"></span>
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description"  required class="mt-1 block w-full">
        </textarea>
        {{-- <input type="text" name="description" id="description"  required class="mt-1 block w-full"> --}}
        <span id="descriptionError" class="error-message"></span>
    </div>
    <div>
        <label for="category">Category:</label>
        <select name="category_id" id="category_id" required class="mt-1 block w-full">
            <option value=" "> --Choose category--</option>
            @foreach ($categories as $category )
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            
           
        </select>
    </div>
    
    <div>
        <label for="due_date">Due Date</label>
        <input type="date" name="due_date" id="due_date" value=""  class="mt-1 block w-full" required>
    </div>

    

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

        </div>
    </form>
</section>
                </div>
            </div>
        </div>
    </div>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
    <!-- Script for handling input changes -->

@if(session('success'))
    <script>
        setTimeout(function() {
            document.querySelector('.alert').style.display = 'none';
        }, 1800); 
        
        
    </script>
    @else
    <script>
        setTimeout(function() {
            document.querySelector('.alert').style.display = 'none';
        }, 1800); 
        
        
    </script>

@endif
</x-app-layout>















