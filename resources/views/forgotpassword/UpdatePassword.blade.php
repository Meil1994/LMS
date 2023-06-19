<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/12e77b0106.js" crossorigin="anonymous"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        body{
            font-family: 'Montserrat', sans-serif;
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <div class="h-screen p-3" style="background-color:#033c59;">
        <div>
            <x-alert-script/>
        </div>
        <h1 class="text-center text-white text-2xl mt-28">New Password Form</h1>
        <div class="flex justify-center">
            <div class="bg-white p-4 mt-10 rounded-lg md1:w-400 ">
                <p class="text-blue-600 text-center mb-4">Forgot Password</p>
                <form action="/reset/password/{{ $token }}" method="POST">
                    @csrf
                
                   
                    <input 
                    class="h-10 mb-2 rounded-lg w-100 border border-slate-500 pl-2"
                    type="password" 
                    name="password" 
                    placeholder="New Password" 
                    required>
                    
    
                    <input 
                    class="h-10 mb-2 rounded-lg w-100 border border-slate-500 pl-2"
                    type="password" 
                    name="password_confirmation" 
                    placeholder="Confirm Password" 
                    required>
                    
                
                    <div class="flex justify-center pt-4 mb-5">
                        <button type="submit" class="mt-2 w-60 bg-blue-400 p-2 rounded-lg text-white">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>




