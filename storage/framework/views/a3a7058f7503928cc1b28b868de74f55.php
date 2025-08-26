<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>

        <link href="<?php echo e(asset('asset/css/styles.css')); ?>" rel="stylesheet" />

        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div>
            <div>
                <main>
                    <div class="container">
                        <form action="" method="POST" id="registrationForm" name="registrationForm">
                            <?php echo csrf_field(); ?>
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Register</h3></div>
                                        <div class="card-body">
                                            <form action="post">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" name="name" id="name" type="text" placeholder="name@example.com" />
                                                    <label for="inputEmail">name</label>
                                                    <p></p>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" name="email" id="email" type="email" placeholder="name@example.com" />
                                                    <label for="inputEmail">Email address</label>
                                                    <p></p>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" name="password" id="password"  type="password" placeholder="Password" />
                                                    <label for="inputPassword">Password</label>
                                                    <p></p>
                                                </div>
                                                

                                                <div class="form-floating mb-3">
                                                    <input class="form-control" name="password_confirmation" id="password_confirmation"  type="password" placeholder="Confirm Password" />
                                                    <label for="inputPassword">Confirm Password</label>
                                                    <p></p>
                                                </div>
                                                
                                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    
                                                    <button type="submit" class="btn btn-primary" href="index.html">Login</button>
                                                </div>
                                                
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- jQuery -->
		<script src="<?php echo e(asset('asset/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/js/scripts.js')); ?>"></script>
        
    <script type="text/javascript">
        $('#registrationForm').submit(function(event){
            event.preventDefault();

            $("button[type='submit']").prop('disabled',true);


            $.ajax({
                url: '<?php echo e(route("processRegister")); ?>',
                type: 'post',
                data: $(this).serializeArray(),
                dataType: 'json',
                success:function(response){



                    $("button[type='submit']").prop('disabled',false);


                    var errors = response.errors;
                    console.log(errors);

                    
                    if(response.status == false){

                        if(errors.name){
                            $('#name').siblings("p").addClass('invalid-feedback').html(errors.name);
                            $('#name').addClass('is-invalid');
                        } else{
                            $('#name').siblings("p").removeClass('invalid-feedback').html('');
                            $('#name').removeClass('is-invalid');
                        }



                        if(errors.email){
                            $('#email').siblings("p").addClass('invalid-feedback').html(errors.email);
                            $('#email').addClass('is-invalid');
                        } else{
                            $('#email').siblings("p").removeClass('invalid-feedback').html('');
                            $('#email').removeClass('is-invalid');
                        }

                        
                        if(errors.password){
                            $('#password').siblings("p").addClass('invalid-feedback').html(errors.password);
                            $('#password').addClass('is-invalid');
                        } else{
                            $('#password').siblings("p").removeClass('invalid-feedback').html('');
                            $('#password').removeClass('is-invalid');
                        }


                    } else {
                        $('#name').siblings("p").removeClass('invalid-feedback').html('');
                        $('#name').removeClass('is-invalid');

                        $('#email').siblings("p").removeClass('invalid-feedback').html('');
                        $('#email').removeClass('is-invalid');

                        $('#password').siblings("p").removeClass('invalid-feedback').html('');
                        $('#password').removeClass('is-invalid');


                        window.location.href = '<?php echo e(route("login")); ?>';
                        
                    }



                    
                },
                error: function(JQXHR,exeption){
                    console.log("Something went wrong");
                }

            })


        });
    </script>

    </body>
</html>
<?php /**PATH D:\projects laravel\e-commerce-stationery\resources\views/register.blade.php ENDPATH**/ ?>