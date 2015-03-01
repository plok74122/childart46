        <h1>Login</h1>
        <div class="loginform">
          <form method="post" action="<?php echo base_url('/blog/admin_login')?>"> 
            <fieldset>
              <p><label for="username_1" class="top">帳號:</label><br />
                <input type="text" name="username_1" id="username_1" tabindex="1" class="field" onkeypress="return webLoginEnter(document.loginfrm.password);" value="" /></p>
    	      <p><label for="password_1" class="top">密碼:</label><br />
                <input type="password" name="password_1" id="password_1" tabindex="2" class="field" onkeypress="return webLoginEnter(document.loginfrm.cmdweblogin);" value="" /></p>
    	      <p><input type="submit" name="cmdweblogin" class="button" value="LOGIN"  /></p>
	        </fieldset>
          </form>
        </div>