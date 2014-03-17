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
            <label for="password">Re-enter Password: </label>
            <input type="password" name="password" />
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</div>
<?php
else:
    echo 'You have been successfully registered!';
endif;
?>