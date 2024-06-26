<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Naara - Porto</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type='text/css' href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css" />
          
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('porto')}}/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">Annisa'U</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">About</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#skills">Skills</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#experience">Experience</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#education">Education</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="{{ asset('photo'). '/' . get_value('_photo')}}" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Annisa Portofolio</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">AR/VR enthusiast - Web Developer - Illustrator</p>
            </div>
        </header>
        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <h1 class="mb-0 text-center">
                    {{ $home->title}}
                </h1>
                <div class="subheading mb-5 text-center">
                    {{ get_value('_city') }} · {{ get_value('_province') }} · {{ get_value('_number') }} ·
                    <a class="text-white" href="mailto:naaracanv@email.com" target="blank">naaracanv@gmail.com</a>
                </div>
                <p class="lead mb-5 text-center">{!! $home->content !!}</p>
                <div class="social-icons text-center">
                    <a class="social-icon" href="{{ get_value ('_linkedin') }}" target="blank"><i class="fab fa-linkedin-in"></i></a>
                    <a class="social-icon" href="{{ get_value ('_github') }}" target="blank"><i class="fab fa-github"></i></a>
                    <a class="social-icon" href="{{ get_value ('_ig') }}" target="blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </section>
        <section class="page-section skills" id="skills">
            <div class="container">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Skills</h2>
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Icon Divider-->
                <div class="subheading mb-3">Programming Languages & Tools</div>
                <ul class="list-inline dev-icons">
                    @foreach (explode(', ', get_value('_language')) as $item)
                        <li class="list-inline-item"><i class="devicon-{{ strtolower($item) }}-plain"></i></li>
                    @endforeach
                </ul>
                <div class="subheading mb-3">Workflow</div>
                {!! set_list_workflow(get_value('_workflow')) !!}
            </div>
        </section>
        <!-- Portfolio Section-->
        <section class="page-section Experience" id="experience">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Experience</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                @foreach ($experience as $item)
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">{{ $item->title }}</h3>
                        <div class="subheading mb-3-info">{{ $item->information1 }}</div>
                        {!! $item->content !!}    
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">{{$item->tgl_mulai_new}} - {{$item->tgl_akhir_new}}</span></div>
                </div>
                @endforeach
            </div>
        </section>
        <!-- Contact Section-->
        <section class="education" id="education">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Education</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                @foreach ($education as $item)
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">{{$item->title}}</h3>
                        <div class="subheading mb-3-info">{{$item->information1}}</div>
                        <div>{{$item->information2}}</div>
                        <p>{{$item->information3}}</p>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">{{$item->tgl_mulai_new}} - {{$item->tgl_akhir_new}}</span></div>
                </div>    
                @endforeach
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Location</h4>
                        <p class="lead mb-0">
                            Bareng Raya
                            <br />
                            Malang, 65116
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">Find Me On</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="{{ get_value ('_ig') }}" target="blank"><i class="fab fa-fw fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="{{ get_value ('_github') }}" target="blank"><i class="fab fa-fw fa-github"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="{{ get_value ('_linkedin') }}" target="blank"><i class="fab fa-fw fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="mailto:naaracanv@email.com" target="blank"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Naara 2024</small></div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('porto')}}/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
