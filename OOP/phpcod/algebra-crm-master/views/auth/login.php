<h1>
    <?php echo $title; ?>
</h1>

<form action="login" method="post">
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>
    <button type="submit">Login</button>
</form>

<a href="register">Register</a>