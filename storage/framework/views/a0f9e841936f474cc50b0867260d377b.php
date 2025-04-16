<?php
    App::setLocale(getUserLanguage());
    $gs = generalSetting();
?>
<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo app('translator')->get('auth.login'); ?> - <?php echo e($gs->system_name); ?></title>
    <link rel="icon" href="<?php echo e(asset($gs->favicon)); ?>" type="image/png" />
    <meta name="_token" content="<?php echo csrf_token(); ?>" />

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

    <!-- Toastr -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #e0e6ed;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-wrapper {
            min-height: 100vh;
        }

        .login-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.08);
        }

        .left-side {
            background: #fff;
            padding: 2rem;
            text-align: center;
        }


        .left-side img {
            width: 133px;
            max-width: 320px;
        }

        .login-logo {
            height: 50px;
            width: 20px;
            margin-bottom: 1rem;
        }

        .right-side {
            padding: 2.5rem;
        }

        .form-control {
            font-size: 0.95rem;
        }

        .social-btn {
            margin: 0 5px;
            font-size: 1rem;
        }

        .footer {
            background-color: #002366;
            color: white;
            padding: 1rem;
            font-size: 0.85rem;
        }

        .footer a {
            color: white;
            margin-left: 10px;
        }

        .login-btn {
            width: 100%;
        }

        @media (max-width: 768px) {
            .left-side {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container login-wrapper d-flex align-items-center justify-content-center">
        <div class="row login-card mx-2" style="width: 500px;">


            <div class="col-md-12 right-side">

                <div class="col-md-12 left-side d-flex flex-column align-items-center justify-content-center">
                    <img src="<?php echo e(asset($gs->logo)); ?>" alt="Logo" class="login-logo">
                    
                </div>

                <h4 class="mb-4 text-center"><?php echo app('translator')->get('auth.login'); ?></h4>

                <div class="d-flex justify-content-center mb-3">
                    <a href="#" class="btn btn-outline-secondary social-btn"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-outline-secondary social-btn"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="btn btn-outline-secondary social-btn"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>

                <form action="<?php echo e(route('login')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3">
                        <label class="form-label"><?php echo app('translator')->get('Email Adress'); ?></label>
                        <input type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>"
                            placeholder="Enter email">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><?php echo app('translator')->get('auth.password'); ?></label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="remember"
                                <?php echo e(old('remember') ? 'checked' : ''); ?>>
                            <label class="form-check-label"><?php echo app('translator')->get('auth.remember_me'); ?></label>
                        </div>
                        <a href="<?php echo e(route('recoveryPassord')); ?>" class="text-decoration-none"><?php echo app('translator')->get('auth.forget_password'); ?>?</a>
                    </div>

                    <button type="submit" class="btn btn-primary login-btn"><?php echo app('translator')->get('auth.login'); ?></button>

                    <div class="text-center mt-3">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        <?php if(Session::has('toast_message')): ?>
            toastr.<?php echo e(Session::get('toast_message')['type']); ?>('<?php echo e(Session::get('toast_message')['message']); ?>');
        <?php endif; ?>
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\school\resources\views/frontEnd/theme/edulia/login/login.blade.php ENDPATH**/ ?>