    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                <p class="text-center small">Enter your Username & Password to login</p>
                            </div>

                            <form class="row g-3 needs-validation" action="?page=login_act" method="post">

                                <div class="col-12">
                                    <label for="user" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-threads"></i></span>
                                        <input type="text" name="user" class="form-control" id="user" required>
                                        <div class="invalid-feedback">Please enter your user.</div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="pass" class="form-label">Password</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-key-fill"></i></span>
                                        <input type="password" name="pass" class="form-control" id="pass" required>
                                        <div class="invalid-feedback">Please enter your pass!</div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit" name="login" value="login">Login</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>