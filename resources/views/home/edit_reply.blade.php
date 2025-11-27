<!DOCTYPE html>
<html lang="en"></html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50">

<div class="max-w-xl mx-auto mt-20 bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-xl font-bold mb-4 text-slate-800">Edit Your Reply</h2>

    <form action="{{ route('update_reply', $reply->id) }}" method="POST">
        @csrf
        <textarea 
            name="reply" 
            rows="4" 
            class="w-full border border-slate-300 p-3 rounded-lg focus:ring-blue-300 focus:border-blue-500"
        >{{ $reply->reply }}</textarea>

        <div class="mt-4 flex justify-between">
            <a href="{{ url('/') }}" class="text-slate-600 hover:underline">Cancel</a>

            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Update</button>
        </div>
    </form>
</div>

</body>
</html>
