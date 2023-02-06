<div>
   <div class="container">
      <h2 class="text-center bg-teal-800 p-2 text-white my-1">Lead Details</h2>

      <table class="w-full table-auto">
         <tr>
            <th class="text-left border px-4 py-1">ID: </th>
            <th class="text-left border px-4 py-1">{{ $lead_id }}</th>
         </tr>
         <tr>
            <th class="text-left border px-4 py-1">Name:</th>
            <th class="text-left border px-4 py-1">{{ $lead->name }}</th>
         </tr>
         <tr>
            <th class="text-left border px-4 py-1">Email:</th>
            <th class="text-left border px-4 py-1">{{ $lead->email }}</th>
         </tr>
         <tr>
            <th class="text-left border px-4 py-1">Phone:</th>
            <th class="text-left border px-4 py-1">{{ $lead->phone }}</th>
         </tr>
         <tr>
            <th class="text-left border px-4 py-1">Add Date:</th>
            <th class="text-left border px-4 py-1">{{ date('F j Y', strtotime($lead->created_at)) }}</th>
         </tr>
      </table>

      <h2 class="mt-5 text-white bg-teal-800 p-2 mb-1">
         Number of @if (count($notes) >= 2)
            Notes
         @else
            Note
         @endif: {{ count($notes) }}</h2>

      <table class="w-full table-auto">
         <tr class="border rounded-t">
            <th class="text-left border px-4 py-1">Note:</th>
            <th class="text-left border px-4 py-1">Description:</th>
         </tr>
         @php
            $i = 1;
         @endphp
         @foreach ($notes as $note)
            <tr>
               <td class="text-left border px-4 py-1">{{ $i++ }}</td>
               <td class="text-left border px-4 py-1">{{ $note->description }}</td>
            </tr>
         @endforeach
      </table>
   </div>
</div>
