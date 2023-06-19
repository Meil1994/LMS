<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <script src="https://kit.fontawesome.com/12e77b0106.js" crossorigin="anonymous"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
        
    <style>
        body{
            font-family: 'Montserrat', sans-serif;
            font-family: 'Poppins', sans-serif;
        }

        @keyframes slideIn {
            from {
                right: -100%;
            }
            to {
                right: 0%;
            }
        }
        
        @keyframes slideOut {
            from {
                right: 0%;
            }
            to {
                right: -100%;
            }
        }
        
        .slide-enter {
            animation: slideIn .5s forwards;
        }
        
        .slide-exit {
            animation: slideOut .5s forwards;
        }
    </style>
    
</head>
<body>

        <div>
            @yield('content')
        </div>

  

    <script>
        const burger = document.querySelector('#burger');
        const menu = document.querySelector('#menu');
        const close = document.querySelector('#close');

        burger.addEventListener('click', () => {
            menu.classList.remove('hidden');
            menu.classList.remove('slide-exit');
            menu.classList.add('slide-enter');
        });

        close.addEventListener('click', () => {
            menu.classList.remove('slide-enter');
            menu.classList.add('slide-exit');
        });
    </script>



</body>
</html>