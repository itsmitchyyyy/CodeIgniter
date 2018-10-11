<div class="container-fluid h-100">
    <div class="align-items-center d-flex h-100 justify-content-center">
        <div class="d-flex flex-column p-4 w-25 login-form">
            <?php echo form_open('pages/login') ?>
                <div class="text-white">
                    <div class="d-flex align-items-center justify-content-center border-bottom mb-4">
                        <h4>Login</h4>
                    </div>
                    <?php if($this->session->flashdata('message')): ?>
                    <div class="login-error">
                       <?php echo $this->session->flashdata('message'); ?>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control <?php echo (form_error('username')) ? 'is-invalid' : '' ?>" placeholder="Username">
                        <div class="invalid-feedback">
                            <?php echo form_error('username'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control <?php echo (form_error('password')) ? 'is-invalid' : '' ?>" placeholder="Password">
                        <div class="invalid-feedback">
                            <?php echo form_error('password'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info w-100">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>