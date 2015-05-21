<?php
    /* Template Name: Agent Login */
    global $wpdb,$user_id;
    if($user_ID){
        wp_safe_redirect(home_url());
        exit();
    }
    $err_msg = '';
    $war_msg = '';
    if(isset($_POST['login'])){
        $user_login = esc_sql($_POST['user_login']);
        $user_pass = esc_sql($_POST['user_pass']);
        $remember = FALSE;
        if(empty($user_login)) { 
            $err_msg .= "Username is required.<br/>";
        } 
        else if(empty( $user_pass)) { 
            $err_msg .= "Password is required.<br/>";
        }
        else {
            $creds = array();
            $creds['user_login'] =  $user_login;
            $creds['user_password'] =  $user_pass;
            $creds['remember'] =  $remember;
            $user = wp_signon( $creds, true);
            if ( is_wp_error($user) ) {
                if(isset($user->errors['incorrect_password'])){
                    $war_msg .= "Wrong Username or Password";
                }
                else if(isset($user->errors['verification_failed'])){
                    $war_msg .= $user->errors['verification_failed'][0];
                }
                else{
                    $war_msg .= "Wrong Username or Password.";
                }
            }
            else {
                wp_safe_redirect(home_url());
                exit();
            }
        }
    }
    get_header();
?>
<div id="content_section">
  <div class="section04">
    <section class="clearfix">
      <h1>Login</h1>
      <p>&nbsp;</p>
        <p id="err_msgs" class="<?php if(!empty($err_msg)){echo 'err_msg';}else if(!empty($war_msg)){echo 'war_msg';}else{echo 'suc_msg';}?>">
            <?php
                if(!empty($err_msg)){echo $err_msg;}
                else if(!empty($war_msg)){echo $war_msg;}
                else{echo $suc_msg;}
            ?>
        </p>
      <div class="form_box">
      	<form action="" method="POST">
            <label>Username</label>
            <input name="user_login" type="text" value="<?php if(isset($user_login)){ echo $user_login;}?>" required>
            <br class="clr">
            <label>Password</label>
            <input name="user_pass" type="password" value="" required>
            <br class="clr">
            <input name="login" type="submit" value="Login">
            <br class="clr">
        </form>
      </div>
      <div class="clr"></div>
    </section>
  </div>
  
</div>
<?php get_footer(); ?>

