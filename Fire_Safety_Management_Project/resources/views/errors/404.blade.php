{{-- for custom 404  page for later  --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">
    <div class="text-center">
        <img src="{{ asset('images/danger.png') }}" alt="404 Not Found" class="w-1/2 mx-auto">
        <h1 class="text-7xl font-bold text-red-600 mt-5">Oops! Dont panic! </h1>
        <p class="text-gray-600 mt-3">The page you are looking for does not exist.</p>
        <p class="text-gray-600 mt-3">Action | This action is unauthorized</p>
        <a href="{{ url('/') }}" class="mt-5 inline-block px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            Go back to Homepage
        </a>
    </div>
</body>
</html>
