    <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <!-- component -->
             <div class="mx-auto p-4 text-gray-800">
                <div class="">
                   <h1 class="font-bold mb-1 underline">{{ strtoupper($course->name) }}</h1>
                   <div class="py-2">
                      <img class="h-48 w-full object-center" src="{{ $course->image }}" alt="{{ $course->name }}">
                   </div>
                   <div class="flex gap-20">
                      <div class="py-2 inline-flex gap-2">
                         <h2 class="">Price: </h2>
                         <p class="italic">${{ $course->price }}</p>
                      </div>

                      <div class="py-2 inline-flex gap-2">
                         <h2 class="">Number of class: </h2>
                         <p class="italic">{{ count($course->curriculums) }}</p>
                      </div>
                   </div>
                   <div class="py-3">
                      <h2 class="mb-3">Descriptions</h2>
                      <p class="italic text-justify">{{ $course->description }}</p>
                   </div>
                </div>
                <h2 class="font-bold py-2">Teachers</h2>
                <div class="flex flex-wrap gap-4 mb-3">
                   @if (count($course->teachers) == 0)
                      <p class="py-2 text-red-600">Please Asign New Teacher</p>
                   @else
                      <table class="w-full table-auto">
                         <tr class="bg-gray-200">
                            <th class="border px-4 py-2 text-left">Sl</th>
                            <th class="border px-4 py-2 text-left">Name</th>
                            <th class="border px-4 py-2 text-left">Email</th>
                            <th class="border px-4 py-2 text-center">Actions</th>
                         </tr>
                         @php
                            $ti = 1;
                         @endphp
                         @foreach ($course->teachers as $teacher)
                            <tr>
                               <td class="border px-4 py-2">{{ $ti++ }}</td>
                               <td class="border px-4 py-2">{{ $teacher->name }}</td>
                               <td class="border px-4 py-2">{{ $teacher->email }}</td>
                               <td class="border px-4 py-2">
                                  <div class="flex justify-center text-center items-center space-x-2">
                                     <a class="bg-green-600 text-white p-1 rounded"
                                        href="{{ route('curriculums.edit', $teacher->id) }}">
                                        @include('components.icons.edit')
                                     </a>
                                     <a
                                        class="bg-yellow-600 text-white p-1 rounded"href="{{ route('leads.show', $teacher->id) }}">
                                        @include('components.icons.eye')
                                     </a>
                                     <form onsubmit="return confirm('Are you sure?');"
                                        wire:submit.prevent="teacherDelete({{ $teacher->id }})"
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
                   @endif
                </div>

                <h2 class="font-bold py-2">Class Details</h2>
                <table class="w-full table-auto">
                   <tr class="bg-gray-200">
                      <th class="border px-4 py-2 text-left">Sl</th>
                      <th class="border px-4 py-2 text-left">Topic</th>
                      <th class="border px-4 py-2 text-left">Date</th>
                      <th class="border px-4 py-2 text-left">Day</th>
                      <th class="border px-4 py-2 text-left">Time</th>
                      <th class="border px-4 py-2 text-center">Actions</th>
                   </tr>
                   @php
                      $i = 1;
                   @endphp
                   {{-- @foreach ($allClass as $class) --}}
                   @foreach ($course->curriculums as $class)
                      <tr>
                         <td class="border px-4 py-2">{{ $i++ }}</td>
                         <td class="border px-4 py-2">{{ $class->name }}</td>
                         <td class="border px-4 py-2">{{ $class->class_date }}</td>
                         <td class="border px-4 py-2">{{ $class->class_day }}</td>
                         <td class="border px-4 py-2">{{ $class->class_time }}</td>
                         <td class="border px-4 py-2">
                            <div class="flex justify-center text-center items-center space-x-2">
                               <a class="bg-green-600 text-white p-1 rounded"
                                  href="{{ route('curriculums.edit', $class->id) }}">
                                  @include('components.icons.edit')
                               </a>
                               <a
                                  class="bg-yellow-600 text-white p-1 rounded"href="{{ route('curriculums.show', $class->id) }}">
                                  @include('components.icons.eye')
                               </a>
                               <form onsubmit="return confirm('Are you sure?');"
                                  wire:submit.prevent="curriculumDelete({{ $class->id }})"
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
             </div>
          </div>
       </div>
    </div>
