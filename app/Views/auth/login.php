<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
    <h1>Login</h1>
    <form action="<?= site_url('auth/login') ?>" method="post">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
<?= $this->endSection() ?>