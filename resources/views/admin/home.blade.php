<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/forms@0.5.3/dist/forms.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex">

        <nav class="bg-gray-800 w-64 flex-shrink-0">
            <div class="p-4">
                <h1 class="text-white text-2xl font-semibold">Quizzly Admin</h1>
            </div>
            <ul class="mt-4">
                <li>
                    <a href="{{ route('admin.home') }}"
                        class="block py-2 px-4 text-gray-200 hover:bg-gray-700">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('admin.quizzes') }}"
                        class="block py-2 px-4 text-gray-200 hover:bg-gray-700">Quizzes</a>
                </li>
                <li>
                    <a href="{{ route('admin.users') }}"
                        class="block py-2 px-4 text-gray-200 hover:bg-gray-700">Users</a>
                </li>
            </ul>
        </nav>


        <div class="flex-1 flex flex-col overflow-hidden">

            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
                </div>
            </header>


            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container mx-auto px-6 py-8">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h2 class="text-xl font-semibold mb-2">Total Users</h2>
                            <p class="text-3xl font-bold">{{ $totalUsers }}</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h2 class="text-xl font-semibold mb-2">Total Quizzes</h2>
                            <p class="text-3xl font-bold">56</p>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <script>
    function openAnswersModal() {
        document.getElementById('answersModal').classList.remove('hidden');
    }

    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('answersModal').classList.add('hidden');
    });
    </script>
</body>

</html>