<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E-Taguyod</title>
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="Home.css">
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
        
        @include('components.Links') 

        @include('components.Script') 
    </head>
    <body>  
        <div class="wrapper" id="wrapper">
        <!-- Hero Images, Navigation, Texts -->
            <section class="top">
                @include('components.Nav') <!--original file: php include 'index-nav.php-->
            </section>
            <section class="top">
                @include('home.Home-carousel') <!--original file: php include 'carousel.php-->
                @include('home.Home-body') <!--original file: php include 'body.php'-->
                @include('home.Lower')
                @include('home.Home-partnership') <!--original file: php include 'partnership.php'-->
            </section>

        <!-- Footer -->
        @include('components.Footer') <!--original file: php include 'footer.php'-->
        </div>
        
        <script>
             AOS.init();
        </script>

    </body>
</html>