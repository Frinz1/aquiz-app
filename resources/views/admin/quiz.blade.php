<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzly Admin - Quizzes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/forms@0.5.3/dist/forms.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
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

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold text-gray-900">Quizzes</h1>
                </div>
            </header>

            <!-- Main content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container mx-auto px-6 py-8">
                    <!-- Create Quiz Button -->
                    <div class="mb-4">
                        <button onclick="openNewQuizModal()"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create New Quiz
                        </button>
                    </div>

                    <!-- Quizzes Table -->
                    <div class="bg-white rounded-lg shadow-md">
                        <div class="p-6">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Title
                                        </th>
                                        <th
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">1</td>
                                        <td class="px-6 py-4 whitespace-nowrap">General Knowledge Quiz</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <button class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</button>
                                            <button class="text-red-600 hover:text-red-900 mr-2">Delete</button>
                                            <button class="text-green-600 hover:text-green-900"
                                                onclick="openQuestionsModal()">Questions</button>
                                        </td>
                                    </tr>
                                    <!-- Add more quiz rows as needed -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- New Quiz Modal -->
    <div id="newQuizModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Create New Quiz</h3>
                <div class="mt-2 px-7 py-3">
                    <input type="text" id="newQuizTitle" placeholder="Enter quiz title"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="items-center px-4 py-3">
                    <button onclick="saveNewQuiz()"
                        class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        Save Quiz
                    </button>
                    <button onclick="closeNewQuizModal()"
                        class="mt-3 px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Questions Modal -->
    <div id="questionsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-3/4 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Quiz Questions</h3>
                <!-- Create Question Button -->
                <div class="mb-4">
                    <button onclick="openNewQuestionModal()"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create New Question
                    </button>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">1</td>
                            <td class="px-6 py-4 whitespace-nowrap">Question 1</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</button>
                                <button class="text-red-600 hover:text-red-900 mr-2">Delete</button>
                                <button class="text-green-600 hover:text-green-900 mr-2"
                                    onclick="openMultipleChoiceModal()">Multiple Choice</button>
                                <button class="text-yellow-600 hover:text-yellow-900 mr-2"
                                    onclick="openIdentificationModal()">Identification</button>
                                <button class="text-purple-600 hover:text-purple-900"
                                    onclick="openTrueFalseModal()">True or False</button>
                            </td>
                        </tr>
                        <!-- Add more question rows as needed -->
                    </tbody>
                </table>
                <div class="mt-4">
                    <button onclick="closeQuestionsModal()"
                        class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- New Question Modal -->
    <div id="newQuestionModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Add New Question</h3>
                <div class="mt-2 px-7 py-3">
                    <input type="text" placeholder="Enter question text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="items-center px-4 py-3">
                    <button onclick="saveNewQuestion()"
                        class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        Save Question
                    </button>
                    <button onclick="closeNewQuestionModal()"
                        class="mt-3 px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Multiple Choice Modal -->
    <div id="multipleChoiceModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Multiple Choice Answers</h3>
                <div class="space-y-4">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="answer" value="a">
                            <span class="ml-2">A)</span>
                            <input type="text" class="form-input ml-2 w-full" placeholder="Answer A">
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="answer" value="b">
                            <span class="ml-2">B)</span>
                            <input type="text" class="form-input ml-2 w-full" placeholder="Answer B">
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="answer" value="c">
                            <span class="ml-2">C)</span>
                            <input type="text" class="form-input ml-2 w-full" placeholder="Answer C">
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="answer" value="d">
                            <span class="ml-2">D)</span>
                            <input type="text" class="form-input ml-2 w-full" placeholder="Answer D">
                        </label>
                    </div>
                </div>
                <div class="mt-4">
                    <button onclick="closeMultipleChoiceModal()"
                        class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Identification Modal -->
    <div id="identificationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Identification Answer</h3>
                <div class="mt-2 px-7 py-3">
                    <input type="text" placeholder="Enter correct answer"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="mt-4">
                    <button onclick="closeIdentificationModal()"
                        class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- True or False Modal -->
    <div id="trueFalseModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">True or False Answer</h3>
                <div class="space-y-4">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="truefalse" value="true">
                            <span class="ml-2">True</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="truefalse" value="false">
                            <span class="ml-2">False</span>
                        </label>
                    </div>
                </div>
                <div class="mt-4">
                    <button onclick="closeTrueFalseModal()"
                        class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
    function openNewQuizModal() {
        document.getElementById('newQuizModal').classList.remove('hidden');
    }

    function closeNewQuizModal() {
        document.getElementById('newQuizModal').classList.add('hidden');
    }

    function saveNewQuiz() {
        const title = document.getElementById('newQuizTitle').value;
        // Here you would typically send this data to your backend
        console.log('New quiz created:', title);
        closeNewQuizModal();
        // Optionally, refresh the quiz list or add the new quiz to the table
    }

    function openQuestionsModal() {
        document.getElementById('questionsModal').classList.remove('hidden');
    }

    function closeQuestionsModal() {
        document.getElementById('questionsModal').classList.add('hidden');
    }

    function openNewQuestionModal() {
        document.getElementById('newQuestionModal').classList.remove('hidden');
    }

    function closeNewQuestionModal() {
        document.getElementById('newQuestionModal').classList.add('hidden');
    }

    function saveNewQuestion() {
        // Implement saving new question logic here
        closeNewQuestionModal();
    }

    function openMultipleChoiceModal() {
        document.getElementById('multipleChoiceModal').classList.remove('hidden');
    }

    function closeMultipleChoiceModal() {
        document.getElementById('multipleChoiceModal').classList.add('hidden');
    }

    function openIdentificationModal() {
        document.getElementById('identificationModal').classList.remove('hidden');
    }

    function closeIdentificationModal() {
        document.getElementById('identificationModal').classList.add('hidden');
    }

    function openTrueFalseModal() {
        document.getElementById('trueFalseModal').classList.remove('hidden');
    }

    function closeTrueFalseModal() {
        document.getElementById('trueFalseModal').classList.add('hidden');
    }
    </script>
</body>

</html>