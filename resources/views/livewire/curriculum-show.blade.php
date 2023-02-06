    <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <!-- component -->
             <div class="mx-auto p-4 text-gray-800">
                <div class="">
                   <h1 class="font-bold mb-5 underline">{{ strtoupper($curriculum->course->name) }}</h1>
                   <div class="py-3">
                      <img class="h-48 w-full object-center" src="{{ $curriculum->course->image }}"
                         alt="{{ $curriculum->course->name }}">
                   </div>
                   <div class="flex gap-20">
                      <div class="py-3 inline-flex gap-2">
                         <h2 class="">Price: </h2>
                         <p class="italic">${{ $curriculum->course->price }}</p>
                      </div>

                      <div class="py-3 inline-flex gap-2">
                         <h2 class="">Number of class: </h2>
                         <p class="italic">{{ count($curriculum->course->curriculums) }}</p>
                      </div>
                   </div>
                   <div class="py-3">
                      <h2 class="mb-3">Descriptions</h2>
                      <p class="italic text-justify">{{ $curriculum->course->description }}</p>
                   </div>
                </div>

                <h2 class="font-bold py-2 mt-3">Class Schedule</h2>
                <table class="w-full table-auto">
                   <tr>
                      <th class="border px-2 py-2 text-left">Topic</th>
                      <th class="border px-2 py-2 text-left">Date</th>
                      <th class="border px-2 py-2 text-left">Day</th>
                      <th class="border px-2 py-2 text-left">Time</th>
                      <th class="border px-2 py-2 text-center">Action</th>
                   </tr>
                   <tr>
                      <td class="border px-2 py-2"> {{ $curriculum->name }} </td>
                      <td class="border px-2 py-2"> {{ $curriculum->class_day }}</td>
                      <td class="border px-2 py-2"> {{ $curriculum->class_time }}</td>
                      <td class="border px-2 py-2"> {{ date('F j, Y', strtotime($curriculum->class_date)) }}</td>
                      <td class="border px-2 py-2">
                         <div class="flex justify-center text-center items-center space-x-2">
                            <a class="bg-green-600 text-white p-1 rounded"
                               href="{{ route('curriculums.edit', $curriculum->id) }}">
                               @include('components.icons.edit')
                            </a>
                            <form onsubmit="return confirm('Are you sure?');"
                               wire:submit.prevent="curriculumDelete({{ $curriculum->id }})"
                               class="bg-red-600 text-white p-1 w-7 h-7 rounded">
                               <button type="submit">
                                  @include('components.icons.delete')
                               </button>
                            </form>
                         </div>
                      </td>
                   </tr>
                </table>

                <h2 class="font-bold py-2 mt-10">Student Attendence</h2>
                <h2>Enrolled Students - {{ $curriculum->course->students()->count() }} || Present -
                   {{ $curriculum->presentStudents() }} || Absent -
                   {{ $curriculum->course->students()->count() - $curriculum->presentStudents() }}
                </h2>
                <table class="w-full table-auto">
                   @php
                      $i = 1;
                   @endphp
                   <tr>
                      <th class="border px-2 py-2 text-left">Roll</th>
                      <th class="border px-2 py-2 text-left">Name</th>
                      <th class="border px-2 py-2 text-left">Email</th>
                      <th class="border px-2 py-2 text-center">Attendence</th>
                   </tr>

                   {{-- {{ $course }} --}}
                   @foreach ($curriculum->course->students as $student)
                      <tr>
                         <td class="border px-2 py-2"> {{ $i++ }} </td>
                         <td class="border px-2 py-2"> {{ $student->name }} </td>
                         <td class="border px-2 py-2"> {{ $student->email }} </td>
                         <td class="border px-2 py-2">
                            <div class="flex justify-center text-center items-center space-x-2">
                               @if ($student->is_present($curriculum->id))
                                  <button title="AttendTheClass" class="bg-green-800 text-white p-1 rounded">
                                     @include('components.icons.attendance')
                                  </button>
                                  <button title="Present" wire:click="attendance({{ $student->id }})"
                                     class="bg-gray-500 text-white p-1 rounded" disabled>
                                     @include('components.icons.present')
                                  </button>
                               @else
                                  <button title="Absent" class="bg-red-600 text-white p-1 rounded" disabled>
                                     @include('components.icons.absent')
                                  </button>
                                  <button title="Present" wire:click="attendance({{ $student->id }})"
                                     class="bg-green-600 text-white p-1 rounded">
                                     @include('components.icons.present')
                                  </button>
                               @endif
                            </div>
                         </td>
                      </tr>
                   @endforeach
                </table>
             </div>
          </div>
       </div>
    </div>
