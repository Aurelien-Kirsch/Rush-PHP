

<main class="row">

        <div class="espace"></div>
        <div class="col l4 "></div>

        <div class="login col l4">
        <?PHP echo $error ?>

        <h1>Login</h1>

        <form action="index.php?controller=Login&action=Connect" method="POST" class=input-field>
            
            
            <input type="email" name="email" placeholder="Email"> <br>

        
            <input type="password" name="password" placeholder="Password"> <br>

            <button class="waves-effect waves-light btn" name="connect_btn">Connect</button>

        </form>
        </div>

        <div class="col l4" ></div>
   
</main>
