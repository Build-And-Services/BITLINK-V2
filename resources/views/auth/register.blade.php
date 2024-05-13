<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Poppins';
        }
    </style>
    <title>Register Page</title>
</head>

<body
    style="background-image: url({{ url('/img/background/login.jpg') }}); background-repeat: no-repeat; background-size: cover; overflow: hidden;">
    <section class="gradient-custom">
        <div class="container py-5" style="padding: 20px">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-5">
                    <div class="card bg-secondary bg-opacity-75 shadow-lg text-white" style="border-radius: 1rem;">
                        <div class="card-body p-4 ">

                            <form action="{{url('register')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-md-2 mt-md-2">

                                    <h2 class="fw-bold mb-2 text-uppercase text-center">Register</h2>
                                    <p class="text-white-50 mb-5 text-center">Please register your account !</p>

                                    <div data-mdb-input-init class="form-group  mb-4">
                                        <label class="form-label" for="typeEmailX">Name</label>
                                        <input type="text" name="name" id="typeEmailX"
                                            class="form-control form-control" />
                                    </div>
                                    <div data-mdb-input-init class="form-group  mb-4">
                                        <label class="form-label" for="typeEmailX">Username</label>
                                        <input type="text" name="username" id="typeEmailX"
                                            class="form-control form-control" />
                                    </div>
                                    <div data-mdb-input-init class="form-group  mb-4">
                                        <label class="form-label" for="typeEmailX">Email</label>
                                        <input type="email" name="email" id="typeEmailX"
                                            class="form-control form-control" />
                                    </div>
                                    <div data-mdb-input-init class="form-group  mb-4">
                                        <label class="form-label" for="typePasswordX">Password</label>
                                        <input type="password" name="password" id="typePasswordX"
                                            class="form-control form-control" />
                                    </div>

                                    <div class="mb-2">
                                        <p class="mb-0">Already have an account? <a href="/login"
                                                class="text-primary-50 fw-bold">Login</a>
                                        </p>
                                    </div>

                                    <div class="text-center">
                                        <button data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-success px-5" type="submit">Register</button>

                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>
