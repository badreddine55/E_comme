<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white">
    <div class="flex min-h-screen flex-col items-center justify-center p-6 md:p-10">
        <div class="w-full max-w-sm md:max-w-3xl">
            <div class="flex flex-col gap-6">
                <div class="overflow-hidden rounded-lg shadow-lg bg-white md:bg-transparent">
                    <div class="grid p-0 md:grid-cols-2">
                        <form class="p-6 md:p-8 bg-white rounded-l-lg md:rounded-none" action="{{ route('register.submit') }}" method="POST">
                            @csrf
                            <div class="flex flex-col gap-6">
                                <div class="flex flex-col items-center text-center">
                                    <h1 class="text-2xl font-bold text-gray-800">Create an Account</h1>
                                    <p class="text-balance text-gray-500">Sign up to get started.</p>
                                </div>
                                <div class="grid gap-2">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input id="name" type="text" name="name" placeholder="John Doe" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-gray-500">
                                </div>
                                <div class="grid gap-2">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input id="email" type="email" name="email" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-gray-500">
                                </div>
                                <div class="grid gap-2">
                                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                    <input id="password" type="password" name="password" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-gray-500">
                                </div>
                                <div class="grid gap-2">
                                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                    <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-gray-500">
                                </div>
                                <button type="submit" class="w-full px-4 py-2 bg-indigo-600 sm:text-sm rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Register
                                </button>
                                <div class="text-balance text-gray-500">
                                    Already have an account? <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-500">Login</a>
                                </div>
                            </div>
                        </form>
                        <div class="hidden md:block relative bg-black p-4 rounded-r-md overflow-hidden">
                            <img src="https://render.fineartamerica.com/images/images-profile-flow/400/images/artworkimages/mediumlarge/2/3-flowers-in-a-metal-vase-abraham-mignon.jpg" alt="Image" class="absolute inset-0 h-full w-full object-cover rounded-r-lg dark:brightness-[0.2] dark:grayscale">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>