
    <section class="container-login">
        <div class="overlay">
            <form action="" method="POST" id='login'>
                <div class="err" style='color:#fff'></div>
                <div class='user'><i class='fa fa-user'></i></div>
                <input type="text" id='l_user' name='username' placeholder='Enter Your Username'>
                <input type="password" id='l_pass' name='password' placeholder='Enter Your Password'>
                <input type="submit" name='login' id='login_btn' value="login">
                <p>Don't have an Account?<a href='<?php echo BASE; ?>Index/signup'>register</a></p>
            </form><!--end of form-->
        </div>
    </section><!--end of container-->
    <script>
        var BASE = "<?php echo BASE; ?>"
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script src="<?php echo BASE; ?>resource/js/main.js?v=1"></script>
</body>
</html>