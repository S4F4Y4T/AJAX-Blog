
    <section class="container">
        <nav class="navbar">
            <div class="logo"><p>SAFAYAT</p></div>
            <ul class="nav">
                <li> <a href='<?= BASE; ?>Index/home'>Home</a> </li>
                <li> <a href='<?= BASE; ?>Index/profile'>Profile</a></li>
                <li> <a href='<?= BASE; ?>Index/logout'>Logout</a></li>
            </ul>
        </nav>

        <div class="post">
            
        </div>

        <div class="post-display">
            <section class="post-containers">
                    
            <div class="err" style='color:red'></div>
            <form method="post" id="update_profile" enctype="multipart/form-data">
                <input type="email" name='email' id='email'>
                <input type="submit" id='updatePost' value="update">
            </form>  
            </section>

            <section class="sidebar">
             </section>
        </div>
