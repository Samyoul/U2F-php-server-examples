<?php $this->layout('layout', ['title' => 'Dashboard']) ?>

<div class="jumbotron">
    <h1>Dashboard</h1>
    <p>Hello <?=$this->e($user->name)?> welcome to your super secure dashboard.</p>
    <hr/>
    <a class="btn btn-danger" href="logout.php">Log Out</a>
    <a class="btn btn-danger" href="database/reset.php">Reset Database</a>
</div>

<h3>U2F Registrations</h3>
<?php if(count($registrations) > 0): ?>
        <table class="table table-striped" style="table-layout:fixed;">
            <thead>
            <tr>
                <th style="width:3.5%;">ID</th>
                <th style="width:30%;">keyHandle</th>
                <th style="width:30%;">publicKey</th>
                <th style="width:30%;">certificate</th>
                <th style="width:6.5%;">counter</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($registrations as $registration): ?>
                <tr>
                    <td style="word-wrap:break-word;"><?=$this->e($registration->id)?></td>
                    <td style="word-wrap:break-word;"><?=$this->e($registration->keyHandle)?></td>
                    <td style="word-wrap:break-word;"><?=$this->e($registration->publicKey)?></td>
                    <td style="word-wrap:break-word;"><?=$this->e($registration->certificate)?></td>
                    <td style="word-wrap:break-word;"><?=$this->e($registration->counter)?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
<?php else: ?>
    <p>No registrations recorded.</p>
<?php endif ?>

<h3>Register A New Key</h3>
<a href="u2f-registration.php" class="btn btn-success">Register</a>