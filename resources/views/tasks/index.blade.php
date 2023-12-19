</!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border-radius: 2px;
}

.pagination a:hover:not(.active) {
  background-color: blue;
  border-radius: 5px;
}
</style>


</head>
<body>

</body>
</html>
<x-app-layout>

    <!-- Optional theme -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             @if(session('success'))
    <div class="alert alert-success" style="align-content: center; color:black;">
        {{ session('success') }}
    </div>
@endif

 <a href="{{ route('tasks.create') }}"
       style="color: white; text-decoration: none; background-color: blue; border: 1px solid green; padding: 5px 8px; border-radius: 6px; align"
       class="hover:text-green-800" >
        Add
    </a> 
   
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(count($tasks) > 0)
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-2"># </th>
                                <th class="px-6 py-2">Title</th>
                                <th class="px-6 py-2">Description</th>
                                <th class="px-6 py-2">Category</th>
                                <th  class="px-6 py-2"> Created Date</th>
                                <th class="px-6 py-2">Due Date</th>
                                <th class="px-6 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            @foreach($tasks as $task)
                              
                                    <tr class="bg-gray-100">
                                        <td class="border px-6 py-2">{{ $tasks->firstItem() + $loop->index }}</td>
                                        <td class="px-6 py-3">{{ $task->title }}</td>
                                        <td class="px-6 py-3">{{ $task->description }}</td>
                                        <td class="px-6 py-3">{{ $task->category->name }}</td>
                                        <td class="px-6 py-3">{{ $task->created_at }}</td>
                                        <td class="px-6 py-3">{{ $task->due_date }}</td>

                                        <td class="px-6 py-3">  <a href="{{ route('tasks.edit', $task->id) }}"
       style="color: white; text-decoration: none; background-color: #00A550; border: 1px solid green; padding: 4px 8px; border-radius: 4px;"
       class="hover:text-green-700">
        Edit
    </a> &nbsp;
    
    <form action="{{ route('tasks.destroy', $task->id) }}" method="post" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit"
                style="color: white; border: 1px solid red; background-color:  #B22222; padding: 4px 8px; border-radius: 4px;"
                class="text-red-500 hover:text-red-700">
            Delete
        </button>
    </form>
</td>
                                        
                                    
                                    </tr>
                                    
                                    
                                   
               
                                      @php
                                        $counter++;
                                        @endphp
                                 
                            @endforeach
                        </tbody>

               
                       
                    </table>

                    @else
                    <p style="align: center"><b>No Tasks found </b> </p>
                  @endif
                   
                     {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
@if(session('success'))
    <script>
        setTimeout(function() {
            document.querySelector('.alert').style.display = 'none';
        }, 1400); 
        
    </script>
@endif
