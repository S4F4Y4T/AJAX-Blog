

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
            <div class="err" style='color:red'></div>
            

            <form action='' id='post' method='POST' enctype="multipart/form-data">
                <input type="text" id='title' name='title' placeholder='Enter Your Title'>
                <textarea placeholder='Whats in your mind' name="body" id="post_body" cols="15" rows="4"></textarea>
                <input name='image' type='file'>
                <input type="submit" id='addPost' value="post">
            </form>
            
        </div>

        <div class="post-display">
            <section class="post-container">
                    
                
            </section>

            <section class="sidebar">
                <div class="c"></div>
             </section>
        </div>
    
        <ul class="pagination">
        </ul>

 
