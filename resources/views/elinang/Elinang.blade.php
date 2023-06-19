<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Saliksik</title>
    @vite('resources/css/app.css')
    @include('components.Links') 

    @include('components.Script')
    <style>
        h2{
            font-size: 1.5rem;
        }
        body{
            font-family: "Poppins", sans-serif !important;;
        }
        .hero-left img{
            width: 95px;
            aspect-ratio: 1;
        }
        .card img{
            width: 100%;
            aspect-ratio: 1;
            align-items: center;
            text-align: center;
            position: relative;
        }
        .card{
            border: 0 !important;
            position: relative;
        }
        .card .back{
            content: "" !important;
            width: 100% !important;
            height: 200px !important;
            position: absolute !important;      
            top: 5.5em;
            left: 0;
            border-top-left-radius: 2em;
            border-top-right-radius: 2em;
        }
        .card .back-1{
            background: orangered !important;  
        }
        .card .back-2{
            background: palevioletred !important;  
        }
        .card .back-3{
            background: plum !important;            
            
        }
        .card .back-4{
            background: aquamarine !important;  
        }
    </style>
</head>
<body>
    <section class="top">
        @include('components.Nav') <!--original file: php include 'index-nav.php-->
    </section>
    <main class="py-5">
        <!-- HERO SECTION -->
        <div class="upper-body">
            <div class="container d-block d-lg-flex justify-content-center align-items-center">
                <div class="hero-right col order-2">
                        <img class="w-100" src="https://media.istockphoto.com/id/1171911961/vector/female-teacher-with-books-and-chalkboard-concept-illustration-for-school-education.jpg?s=612x612&w=0&k=20&c=PF5bNlFhW9b9I-5aXwp03yYkuWjk9x_FuPK0YsRcesA=" alt="">
                </div>
                <div class="hero-left col order-lg-1 gap-4">
                    <div class="d-flex">
                        <img src="img/E-LINANG.png" alt="">
                            <h1 class="d-flex flex-column justify-content-between pt-3 mt-1 px-2">
                                <span>E-Linang</span>
                            </h1>                   
                    </div>
                    <h2 class="d-flex flex-column">
                        <p class="mt-5 mb-5 text-6xl">Coming Soon!!</p>
                    </h2>
                    <div class="hero-btn">
                        <button class="btn btn-primary">Mag-Enroll</button>
                        <a href="#"><button class="btn btn-secondary">Mga Riserts</button></a>
                    </div>
                </div>                
            </div>
        </div>
        <!-- SECTION training-->
        <!-- <div class="lower-body py-3">
            <div class="container gap-5 d-flex flex-column">
                <div class="title-link d-flex justify-content-between align-items-center">
                    <h2 class="w-50">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam, aspernatur.</h2>
                    <a class="pe-5" href="#">Browse Courses</a>
                </div>
                <div class="card-group gap-5">
                    <div class="card">
                        <div class="back-1 back"></div>
                        <img src="https://assets.website-files.com/5bff8886c3964a992e90d465/5c00fa3ad82b40e853c9952f_hero-3.svg" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                        <p class="card-text"></p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="back-2 back"></div>
                        <img src="https://assets.website-files.com/5bff8886c3964a992e90d465/5c00fa0eb8b0816e1a10dfe6_hero-2.svg" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                        <p class="card-text"></p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="back-3 back"></div>
                        <img src="https://assets.website-files.com/5bff8886c3964a992e90d465/5c0080fe9e397d3325abcf93_hero-1.svg" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                        <p class="card-text"></p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="back-4 back"></div>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d6/Humaaans-standing-3.svg" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                        <p class="card-text"></p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </main>
    @include('components.Footer') <!--original file: php include 'footer.php'-->
</body>
</html>