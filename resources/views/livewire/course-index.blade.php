<div>
   <div>
      <table class="w-full table-auto">
         <tr class="bg-gray-200 rounded-t">
            <th class="text-left border px-4 py-1">Sl:</th>
            <th class="text-left border px-4 py-1">Name:</th>
            <th class="text-left border px-4 py-1">Description:</th>
            <th class="text-left border px-4 py-1">Image:</th>
            <th class="text-center border px-4 py-1">Price:</th>
            <th class="text-center border px-4 py-1">Added By:</th>
            <th class="text-center border px-4 py-1">Instructor:</th>
            <th class="text-center border px-4 py-1">Actions:</th>
         </tr>
         @php
            $i = 1;
         @endphp
         @foreach ($courses as $course)
            <tr>
               <td class="text-left border px-4 py-1">{{ $i++ }}</td>
               <td class="text-left border px-4 py-1">{{ $course->name }}</td>
               <td class="text-left border px-4 py-1">{{ $course->description }}</td>
               <td class="border">
                  <img class="w-10 h-10" src="{{ $course->image }}" alt="{{ $course->name }}" />
               </td>
               <td class="text-left border px-4 py-1">{{ $course->price }}</td>
               <td class="text-center border px-4 py-1">{{ $course->user->name }}</td>
               <td class="text-center border px-4 py-1">
                  @foreach ($course->teachers as $teacher)
                     <p class="py-1 bg-yellow-500 my-1">{{ $teacher->name }}</p>
                  @endforeach
               </td>
               <td class="border px-4 py-1">
                  <div class="flex justify-center text-center items-center space-x-2">
                     <a class="bg-green-600 text-white p-1 rounded" href="{{ route('courses.edit', $course->id) }}">
                        @include('components.icons.edit')
                     </a>
                     <a class="bg-yellow-600 text-white p-1 rounded"href="{{ route('courses.show', $course->id) }}">
                        @include('components.icons.eye')
                     </a>
                     <form onsubmit="return confirm('Are you sure?');"
                        wire:submit.prevent="courseDelete({{ $course->id }})"
                        class="bg-red-600 text-white p-1 w-7 h-7 rounded">
                        <button type="submit">
                           @include('components.icons.delete')
                        </button>
                     </form>
                  </div>
               </td>
            </tr>
         @endforeach

      </table>
      <div class="mt-4">
         {{ $courses->links() }}
      </div>
   </div>

</div>
