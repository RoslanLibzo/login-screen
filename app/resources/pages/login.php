<?php
// Check if there's an error parameter in the URL
$error = isset($_GET['error']) ? $_GET['error'] : '';

// Display error message if invalid credentials
if ($error === 'invalid_credentials') {
    echo '<p style="color: red;">Invalid username or password. Please try again.</p>';
}
;?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="app/public/css/app.css">

</head>

<body>
    <div class="app container-sm">
        <div class="row mt-5">
            <div class="col"></div>
            <div class="col mt-5  bg-body-secondary p-5">
                <h1 class="title">Login to your account</h1>
                <?php
                    // Display error messages based on the 'error' query parameter
                    if (isset($_GET['error'])) {
                        echo '<div class="error mt-5 mb-3 text-danger">';
                        switch ($_GET['error']) {
                            case 'invalid_user':
                                $error = 'username';
                                echo "Invalid username or password try again.";
                                break;
                            case 'invalid_pass':
                                $error = "password";
                                echo "Invalid password try again.";
                                break;
                            default:
                                $error = "both";
                                echo "Username or password incorrect try again.";
                                break;
                        }
                        echo '</div>';
                    }
                ?>
                <form id="loginForm" action="/login/access" method="post" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input class="form-control username-form <?php if($error == 'username' || $error == 'both'){ echo 'is-invalid'; }?>" name="username" id="username" aria-describedby="userName" required>
                        <?php if($error == 'username'){ ?><div class="text-danger mb-4 fs-6 border-bottom border-danger">Username incorrect</div><?php }; ?>
                    </div>
                    <div class="mb-3 password-field">
                        <label for="password" class="form-label password-label pb-2 pt-2">Password</label>
                        <input id="password" type="password " class="form-control password-form <?php if($error == 'password' || $error == 'both' || $error =="username"){ echo 'is-invalid'; } ?>" name="password" id="password" required>
                        <button type="button" class="btn btn-dark" id="togglePassword">Show</button>
                        <?php if($error == 'password' || $error =='user'){ ?><div class="text-danger mb-4 fs-6 border-bottom border-danger">Password incorrect</div><?php }; ?>
                        <div class="invalid-feedback">
                        Your password must be at least 8 characters long and include uppercase, lowercase, number, and special character.
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <button id="submitButton"type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            
            <div class="col"></div>
        </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="app/public/js/app.js"></script>
</body>
</html>