
<?php $__env->startSection('title', 'MXM | Enjoy Shopping!'); ?>
<?php $__env->startSection('content'); ?>

<?php if(Session::has('success')): ?>
    <script>
        swal({
            title: "Success! You have been successfully added new user!",
            icon: "success",
            button: true,
        }) 
        .then(
            function() {
                window.location.href = "<?php echo e(url('/add')); ?>";
            }
        );
    </script>
<?php endif; ?>

<div class="container">

    <div class="row">   
        <div class="col-md-12 mt-2 py-3">
            <h6><a href="/home" class="text-dark">Home</a> > Add new Admin, Employee, CSR</h6>
        </div>
    </div>

    <!-- <div class="row justify-content-center" style="margin-bottom: 0;">
        <div class="col-md-8"> -->

            <div class="card-body">

                <ul class="nav nav-tabs" style="float: center">
                    <li class="nav-item" style="width: 50%">
                        <a href="#adminR" class="nav-link active" data-toggle="tab" style="color: green; text-align: center; width: 50%">
                                
                            Admin Registration

                        </a>
                    </li>
                    <li class="nav-item" style="width: 50%;">
                        <a href="#empR" class="nav-link" data-toggle="tab" style="color: green; text-align: center; width: 50%">
                            
                            Employee and CSR Registration

                        </a>
                    </li>

                    <!-- <li class="nav-item" style="width: 35%;">
                        <a href="#customerS" class="nav-link" data-toggle="tab" style="color: green; text-align: center; width: 50%">
                            
                            Customer Service

                        </a>
                    </li> -->
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="adminR">
                        <div class="card">
                            <!-- <div id="overflowTest3"> -->
                                <div class="card-body">
                                    <form method="POST" action="<?php echo e(route('ad.register')); ?>">
                                        <?php echo csrf_field(); ?>

                                        <input type="hidden" name="uType" id="uType" value="5">

                                        <div class="row mb-3">
                                            <label for="lastname" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Last Name')); ?></label>

                                            <div class="col-md-6">
                                                <input id="lastname" type="text" class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="lastname" value="<?php echo e(old('lastname')); ?>" required autocomplete="lastname" autofocus>

                                                <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="firstname" class="col-md-4 col-form-label text-md-right"><?php echo e(__('First Name')); ?></label>

                                            <div class="col-md-6">
                                                <input id="firstname" type="text" class="form-control <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="firstname" value="<?php echo e(old('firstname')); ?>" required autocomplete="firstname" autofocus>

                                                <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="middlename" class="col-md-4 col-form-label text-md-right">Middle Name</label>

                                            <div class="col-md-6">
                                                <input id="middlename" type="text" class="form-control" name="middlename" value="<?php echo e(old('middlename')); ?>" autofocus>

                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="username" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Username')); ?></label>

                                            <div class="col-md-6">
                                                <input id="username" type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="username" value="<?php echo e(old('username')); ?>" required autocomplete="username" autofocus>

                                                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Email Address')); ?></label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

                                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?></label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary" style="background: #00FF00; border-color: #00FF00">
                                                    <?php echo e(__('Register')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <!-- </div> -->
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="empR">
                         <div class="card">
                                <!-- <div id="overflowTest3"> -->
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo e(route('ad.register')); ?>">
                                            <?php echo csrf_field(); ?>

                                            

                                            <div class="row mb-3">
                                                <label for="lastname" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Last Name')); ?></label>

                                                <div class="col-md-6">
                                                    <input id="lastname" type="text" class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="lastname" value="<?php echo e(old('lastname')); ?>" required autocomplete="lastname" autofocus>

                                                    <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="firstname" class="col-md-4 col-form-label text-md-right"><?php echo e(__('First Name')); ?></label>

                                                <div class="col-md-6">
                                                    <input id="firstname" type="text" class="form-control <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="firstname" value="<?php echo e(old('firstname')); ?>" required autocomplete="firstname" autofocus>

                                                    <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="middlename" class="col-md-4 col-form-label text-md-right">Middle Name</label>

                                                <div class="col-md-6">
                                                    <input id="middlename" type="text" class="form-control" name="middlename" value="<?php echo e(old('middlename')); ?>" autofocus>

                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="username" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Username')); ?></label>

                                                <div class="col-md-6">
                                                    <input id="username" type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="username" value="<?php echo e(old('username')); ?>" required autocomplete="username" autofocus>

                                                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Email Address')); ?></label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

                                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="uType" class="col-md-4 col-form-label text-md-right"><?php echo e(__('User Type')); ?></label>

                                                <div class="col-md-6">
                                                    <input type="radio" name="uType" id="uType" value="4" required autofocus> Employee <br>
                                                    <input type="radio" name="uType" id="uType" value="3" required autofocus> Customer Service

                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="uAsgn" class="col-md-4 col-form-label text-md-right">Scope</label>

                                                <div class="col-md-6">
                                                    <select class="form-control" name="uAsgn" id="uAsgn" required autofocus>
                                                        <option disabled selected value>-Select-</option>
                                                        <option value="Bulacan">Bulacan</option>
                                                        <option value="Caloocan City">Caloocan City</option>
                                                        <option value="Malabon City">Malabon City</option>
                                                        <option value="Valenzuela City">Valenzuela City</option>
                                                    </select>
                                                    
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

                                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?></label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>

                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary" style="background: #00FF00; border-color: #00FF00">
                                                        <?php echo e(__('Register')); ?>

                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                    <!-- <div class="tab-pane fade show" id="customerS">
                         <div class="card">
                                <!-- <div id="overflowTest3"> 
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo e(route('ad.register')); ?>">
                                            <?php echo csrf_field(); ?>

                                            <input type="hidden" name="uType" id="uType" value="3">

                                            <div class="row mb-3">
                                                <label for="lastname" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Last Name')); ?></label>

                                                <div class="col-md-6">
                                                    <input id="lastname" type="text" class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="lastname" value="<?php echo e(old('lastname')); ?>" required autocomplete="lastname" autofocus>

                                                    <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="firstname" class="col-md-4 col-form-label text-md-right"><?php echo e(__('First Name')); ?></label>

                                                <div class="col-md-6">
                                                    <input id="firstname" type="text" class="form-control <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="firstname" value="<?php echo e(old('firstname')); ?>" required autocomplete="firstname" autofocus>

                                                    <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="middlename" class="col-md-4 col-form-label text-md-right">Middle Name</label>

                                                <div class="col-md-6">
                                                    <input id="middlename" type="text" class="form-control" name="middlename" value="<?php echo e(old('middlename')); ?>" autofocus>

                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="username" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Username')); ?></label>

                                                <div class="col-md-6">
                                                    <input id="username" type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="username" value="<?php echo e(old('username')); ?>" required autocomplete="username" autofocus>

                                                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Email Address')); ?></label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

                                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                                <div class="row mb-3">
                                                    <label for="uAsgn" class="col-md-4 col-form-label text-md-right">Scope</label>

                                                    <div class="col-md-6">
                                                        <select class="form-control" name="uAsgn" id="uAsgn" required autofocus>
                                                            <option disabled selected value>-Select-</option>
                                                            <option value="Bulacan">Bulacan</option>
                                                            <option value="Caloocan City">Caloocan City</option>
                                                            <option value="Malabon City">Malabon City</option>
                                                            <option value="Valenzuela City">Valenzuela City</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>

                                            <div class="row mb-3">
                                                <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

                                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?></label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>

                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary" style="background: #00FF00; border-color: #00FF00">
                                                        <?php echo e(__('Register')); ?>

                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <!-- </div>
                            </div>
                        </div>

                    </div> -->
                </div>
            </div>
        <!-- </div>
    </div> -->
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ad-sel-del_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jelai\mxm_proj\resources\views/admin/ad_register.blade.php ENDPATH**/ ?>