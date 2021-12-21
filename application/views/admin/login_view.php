<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.6/examples/sign-in/signin.css">

    <title>Login</title>
</head>

<body>
    <form class="form-signin bg-white" action="<?= base_url() . 'admin/login/login_post'; ?>" method="POST">

        <?php

        if ($error != "No_Error") {
            echo '<div class="alert alert-danger" role="alert">';
            echo "$error";
            echo '</div>';
        }

        ?>

        <h1 class="h3 mb-3 font-weight-normal text-center">Login</h1>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Username" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
        <div class="checkbox mb-3 text-center">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted text-center">© 2017-2021</p>
    </form>

    <?php $this->load->view('admin/footer_view'); ?>