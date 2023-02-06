<div>
   <div class="container">
      <h2 class="text-center bg-slate-800 p-2 text-white my-1">Question: {{ $question->name }}</h2>

      <table class="w-full table-auto">
         <tr>
            <th class="text-left border px-4 py-1">Option A:</th>
            <th class="text-left border px-4 py-1">{{ $question->answer_a }}</th>
         </tr>
         <tr>
            <th class="text-left border px-4 py-1">Option B:</th>
            <th class="text-left border px-4 py-1">{{ $question->answer_b }}</th>
         </tr>
         <tr>
            <th class="text-left border px-4 py-1">Option C:</th>
            <th class="text-left border px-4 py-1">{{ $question->answer_c }}</th>
         </tr>
         <tr>
            <th class="text-left border px-4 py-1">Option D:</th>
            <th class="text-left border px-4 py-1">{{ $question->answer_d }}</th>
         </tr>
      </table>
      <h2 class="text-center bg-teal-800 p-2 text-white my-1">Correct Answer: {{ $question->correct_answer }}</h2>

   </div>
</div>
