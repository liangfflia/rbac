<?php
if (!isset($_GET['registration'])):?>
<div>
    <form method="post" action="actions/userActionHandler.php">
        <div>
            <label for="email">Email: </label>
            <input type="text" name="email" />
        </div>
        <div>
            <label for="password">Password: </label>
            <input type="password" name="password" />
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
    <a href="/actions/forgot.php">Forgot password?</a>
</div>
<?php
else:
    echo 'You have successfully logged in!';
endif;
?>