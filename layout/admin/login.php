<div class="col-md-6 col-md-offset-3">
    <div class="login-panel panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Please Sign In</h3>
        </div>
        <div class="panel-body">
            <form role="form" class="login" method="post" name="login" id="login">
                <fieldset>
                    <div class="form-group">
                    <label class="control-label" for="inputUsername">Username</label>
                        <input class="form-control" maxlength="4" placeholder="Staff Number" name="staff_number" type="staff_number" autofocus>
                    </div>
                    <div class="form-group">
                    <label class="control-label" for="inputPassword">Password</label>
                        <input class="form-control" placeholder="Password" name="password" type="password">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                        </label>
                        |
                        <a href="">Forgot Password</a>
                    </div>

                    <!-- Change this to a button or input when using this as a form -->
                    <button type="submit" id="save" class="btn btn-outline btn-success ladda-button" data-style="expand-left" >
                    <span class="ladda-label">Login</span></button> |
                    <button class="btn btn-outline btn-danger">Exit</button> 
                </fieldset>
            </form>
        </div>
    </div>
</div>