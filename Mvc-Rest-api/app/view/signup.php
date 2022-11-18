

    <section class="container-login">
        <div class="overlay">
        
        <form action="" method="POST" id='register'>
        <div class="err" style='color:#fff'></div>
            <div class='user'><i class='fa fa-user'></i></div>
            <input type="text" id='name' name='username' placeholder='Enter Your Username'>
            <input type="text" id='email' name='email' placeholder='Enter Your Email'>
            <input type="password" id='password' name='password' placeholder='Enter Your Password'>
            <input type="submit" id='registerBtn' value="Register">
            <p>Already Have a Account?<a href='<?php echo BASE; ?>Index/login'>login</a></p>
        </form><!--end of form-->
        </div>
    </section><!--end of container-->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script src="<?php echo BASE; ?>resource/js/main.js?v=1"></script>
    <script>
        var BASE = "<?php echo BASE; ?>"
    </script>
</body>
</html>