<?php $this->layout('layout', ['title' => 'Login']) ?>

<h1>User Login</h1>

<div class="alert alert-info">
    <p>Try logging in. Use one of the predefined users.</p>
    <ul>
        <li>samyoul</li>
        <li>donkey</li>
        <li>shrek</li>
    </ul>
</div>

<form action="authenticate.php" method="post">
    <label for="username">Username</label>
    <input id="username" name="username" type="text" value="donkey" />
    <button>Login</button>
</form>