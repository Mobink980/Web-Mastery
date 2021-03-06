 <!-- Modal start -->
    <!-- %%%%%%%%%%%%%%%%%%%%%%%% Login Modal %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
    <div class="modal" id="login-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sign in</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="email">Username / Email</label>
                            <input type="email" class="form-control" id="email-login">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password-login">
                        </div>
                        <div class="form-group">
                            <label for="remember">
                                <input type="checkbox" id="remember"> Remember me
                            </label>

                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Jump In</button>
                </div>
            </div>
        </div>
    </div>
    <!-- %%%%%%%%%%%%%%%%%%%%%%%% Registration Modal %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
    <div class="modal" id="register-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
        <form action="/user/register" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sign up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <div class="form-group">
                            <label for="email">Username / Email</label>
                            <input type="email" required name="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" required name="password" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label for="password">Repeat Password</label>
                            <input type="password" required name="repeatPassword" class="form-control" id="password-repeat">
                        </div>
                        <div class="form-group">
                            <label for="agree">
                                <input type="checkbox" id="agree"> Agree to Terms of Use
                            </label>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Jump In</button>
                </div>
            </div>
        </form>
        
        </div>
    </div>

    <!-- Modal end -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>
