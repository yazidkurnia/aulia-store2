<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .half-background {
            background-color: #f8f9fa;
            /* Set your desired background color */
            height: 50vh;
            /* Set the height to 50% of the viewport height */
            width: 100%;

        }
    </style>

    <title>Register</title>
</head>

<body>

    <div class="container-fluid half-background">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8  pt-5 mt-5">
                <div class="card w-100">
                    <div class="card-header">
                        Sign Up
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter email">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email
                                            with
                                            anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Password Confirmation</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="Password Confirmation">
                                    </div>
                                    <div class="form-group">
                                        {{-- <button type="submit" class="btn btn-warning w-100 text-light"
                                            style="border-radius: 50px;">Submit</button> --}}
                                        <button type="submit" class="btn btn-warning w-100 text-light"
                                            style="border-radius: 50px;">Submit</button>
                                    </div>
                                    <div class="form-group">
                                        <span>

                                        </span> Already have an ccount ? <button type="submit" class="btn btn-sm">Sign
                                            Up
                                            Know</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjU" crossorigin="anonymous"></script>

</body>

</html>
