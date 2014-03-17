<?php if (!isset($_GET['login'])):?>
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
            <input type="hidden" name="login" value="1">
            <button type="submit">Login</button>
        </div>
    </form>
    <a href="/actions/forgot.php">Forgot password?</a>
</div>
<?php else:
    echo 'You have been successfully logged in!';
endif;?>