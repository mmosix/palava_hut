<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
    <h1>Login</h1>
    <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php endif; ?>
    <form action="<?= site_url('auth/login') ?>" method="post">
        <input type="hidden" name="redirect_url" value="<?= isset($redirect_url) ? $redirect_url : '' ?>">
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
