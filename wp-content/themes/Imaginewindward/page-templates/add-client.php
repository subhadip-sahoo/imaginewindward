<?php
    session_start();
    /* Template Name: Add Client */
    global $wpdb, $user_ID;
    if(!$user_ID){
        wp_safe_redirect(home_url().'/agent-login/');
        exit();
    }
    $err_msg = '';
    $suc_msg = '';
    $war_msg = '';
    if(isset($_POST['send_mail'])){     
        $client_first_name = esc_sql($_POST['client_first_name']);
        $client_last_name = esc_sql($_POST['client_last_name']);		
        $client_email = esc_sql($_POST['client_email']);
        $client_phone_number = esc_sql($_POST['client_phone_number']);
        if(empty($client_first_name)) { 
            $err_msg = "Client first name required.<br/>";
        }
        else if(empty($client_last_name)) { 
            $err_msg = "Client last name required.<br/>";
        }
        else if(empty($client_email)) { 
            $err_msg = "Client email address required.<br/>";
        }
        else if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $client_email)) { 
            $err_msg = "Please enter a valid email.<br/>";
        }
        else {
            if( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] ) ){
                $client_details = array(
                    'user_id' => $user_ID,
                    'client_first_name' => $client_first_name,
                    'client_last_name' => $client_last_name,
                    'client_email' => $client_email,
                    'client_phone_number' => $client_phone_number
                );
                $result = $wpdb->insert($wpdb->prefix.'clients', $client_details);
                if($result){
                    $suc_msg .= 'Client added successfully.';
                    $client_first_name = '';
                    $client_last_name = '';		
                    $client_email = '';
                    $client_phone_number = '';
                }else{
                    $err_msg = "Process failed!.<br/>";
                }
            }else{
                $err_msg = "Invalid secuirity code.<br/>";
            }
      }
    }
    get_header();
?>
<div id="content_section">
  <div class="section04">
    <section class="clearfix">
      <h1>Add Client</h1>
      <div class="form_box">
        <p id="err_msgs" class="<?php if(!empty($err_msg)){echo 'err_msg';}else if(!empty($war_msg)){echo 'war_msg';}else{echo 'suc_msg';}?>">
          <?php
               if(!empty($err_msg)){echo $err_msg;}
               else if(!empty($war_msg)){echo $war_msg;}
               else{echo $suc_msg;}
          ?>
       </p>
      	<form action="" method="post">
            <label>Client First Name: *</label>
            <input name="client_first_name" type="text" value="<?php if(isset($client_first_name)){ echo $client_first_name;}?>" required>
            <br class="clr">
            <label>Client Last Name: *</label>
            <input name="client_last_name" type="text" value="<?php if(isset($client_last_name)){ echo $client_last_name;}?>" required>
            <br class="clr">
            <label>Client Email: *</label>
            <input name="client_email" type="email" value="<?php if(isset($client_email)){ echo $client_email;}?>" required>
            <br class="clr">
            <label>Client Phone Number:</label>
            <input name="client_phone_number" id="client_phone_number" value="<?php if(isset($client_phone_number)){ echo $client_phone_number;}?>" type="text">
            <br class="clr">
            <label>Image Verification:</label>
            <img src="<?php echo get_template_directory_uri();?>/captcha/CaptchaSecurityImages.php?width=87&height=35&characters=5" /><br class="clr">
            <label>&nbsp;</label>
            <input name="security_code" id="security_code" type="text">
            <br class="clr">
            <input name="send_mail" type="submit" value="Add">
            <br class="clr">
          </form>
      </div>
      <div class="info_box">
      	<h3>Imagine Windward</h3>
        <p>In order to be protected, please be sure to accompany your clients to our model center OR contact us via phone (239-989-6066) in advance to let us know if you will not be accompanying them.</p>
        <h5>If you have any questions, please email us at info@imaginewindward.com</h5>
  
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3568.3283123005926!2d-82.03326799999999!3d26.573838!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88db47f89d59c69b%3A0x2164eb17b6397af7!2s4125+SW+28th+Pl%2C+Cape+Coral%2C+FL+33914%2C+USA!5e0!3m2!1sen!2sin!4v1408445420990" width="100%" height="240" frameborder="0" style="border:0"></iframe>
      </div>
      <div class="clr"></div>
    </section>
  </div>
</div>
<?php get_footer();?>
