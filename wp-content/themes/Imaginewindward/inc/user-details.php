<?php

global $table_name_users;
$table_name_users = $wpdb->prefix . 'users';

if (!class_exists('IWW_List_Table')) {
   require_once dirname(__FILE__).'/class/class-iww-list-table.php';
}

require_once dirname(__FILE__).'/class/user_details_list_table.class.php';

function user_details_admin_menu(){
    $hook = add_menu_page(__('User Details', 'user_details'), __('User Details', 'user_details'), 'activate_plugins', 'user-details', 'user_details_main', plugins_url().'/user-details/images/addEdit.png');
    add_submenu_page(NULL, __('Activate User', 'user_details'), __('Activate User', 'user_details'), 'activate_plugins', 'edit-user-details', 'user_details_edit_handler');
    add_action('load-'.$hook, 'cct_add_option');
}

function cct_add_option() {
    $option = 'per_page';
    $args = array(
        'label' => 'Users',
        'default' => 10,
        'option' => 'users_per_page'
    );
    
    $screen = get_current_screen();
    add_filter( 'manage_'.$screen->id.'_columns', array( 'user_details_list_table', 'get_columns' ));
    add_screen_option( $option, $args );
}
add_action('admin_menu', 'user_details_admin_menu');
add_filter('set-screen-option', 'cct_set_option', 10, 3);

function cct_set_option($status, $option, $value) {
    if ( 'users_per_page' == $option ) return $value;
    return $status;
}

function user_details_main($per_page){
    global $wpdb;
    $table = new user_details_list_table();
    $table->prepare_items();

    $message = '';
    if ('delete' === $table->current_action()) {
        $message = '<div class="updated below-h2" id="message"><p>' . sprintf(__('%d Items deleted.', 'user_details'), count($_REQUEST['id'])) . '</p></div>';
    }
    ?>
<div class="wrap">
    <div class="icon32" id="icon-users"><br></div>
    <h2><?php _e('All Users', 'user_details')?> 
<?php
    if ( ! empty( $_REQUEST['s'] ) ) {
		echo sprintf( '<span class="subtitle">'
			. __( 'Search results for &#8220;%s&#8221;', 'user_details' )
			. '</span>', esc_html( $_REQUEST['s'] ) );
	}
?>
    </h2>
    <?php echo $message; ?>

    <form method="get" action="">
        <input type="hidden" name="page" value="<?php echo esc_attr( $_REQUEST['page'] ); ?>"/>
        <?php $table->search_box( __( 'Search', 'user_details' ), 'centers' ); ?>
        <?php $table->display(); ?>
    </form>
</div>
 <?php   
}

function user_details_edit_handler(){
    global $wpdb, $table_name_users;
    
    $message = '';
    $notice = '';

    if (wp_verify_nonce($_REQUEST['nonce'], basename(__FILE__))) {
        if(isset($_POST['change_password'])){
            $userdata = array(
                'ID' => $_REQUEST['id'],
                'user_pass' => esc_sql($_REQUEST['user_pass'])
            );
            wp_update_user($userdata);
            if ( is_wp_error($stat) ) {
                $notice = __('User account activation failed', 'user_details');
            }else{
                update_user_meta($_REQUEST['id'],'account_status', 1);
                $wpdb->update( $table_name_users, array( 'user_status' => 1 ), array( 'ID' => $_REQUEST['id'] ) );
                $from = get_option('admin_email');
                $from_name = "Imagine Winward";
                $headers = "From: Imagine Winward <$from>\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $subject = "Account activation credentials of Imagine Winward";
                $msg = "Dear User,<br/>Your account has been activated. Your login details are as follows<br/>Username: ".esc_sql($item['user_login'])."<br/>Password: ".esc_sql($item['user_pass'])."<br/> Please login into your account to verify.";
                $msg .= "Best regards<br/>Imagine Winward Admin";
                //wp_mail( $item['user_email'], $subject, $msg, $headers );
                $message = __('User account successfully activated', 'user_details');
            }
        }
        
    }
    add_meta_box('user_details_meta_box', 'User Details', 'user_details_meta_box_handler', 'user_detailss', 'normal', 'default');
    ?>
<div class="wrap">
    <div class="icon32" id="icon-users"><br></div>
    <h2><?php _e('Activate Account', 'user_details')?> 
        <a class="add-new-h2" href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page=user-details');?>"><?php _e('Back to list', 'user_details')?></a>
    </h2>

    <?php if (!empty($notice)): ?>
    <div id="notice" class="error"><p><?php echo $notice ?></p></div>
    <?php endif;?>
    <?php if (!empty($message)): ?>
    <div id="message" class="updated"><p><?php echo $message ?></p></div>
    <?php endif;?>

    <form id="form" method="POST">
        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(basename(__FILE__))?>"/>

        <div class="metabox-holder" id="poststuff">
            <div id="post-body">
                <div id="post-body-content">
                    <table cellspacing="2" cellpadding="5" style="width: 95%;" class="form-table">
                        <tbody>
                            <tr class="form-field">
                                <th valign="top" scope="row">
                                    <label for="user_pass"><?php _e('Password', 'user_details')?></label>
                                </th>
                                <td>
                                    <input id="user_pass" name="user_pass" type="password" style="width: 95%" value="" class="code" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="submit" value="<?php _e('Save', 'user_details')?>" id="submit" class="button-primary" name="change_password">
                </div>
            </div>
        </div>
    </form>
</div>
<?php
}

function user_details_meta_box_handler($item){
?>

<table cellspacing="2" cellpadding="5" style="width: 95%;" class="form-table">
    <tbody>
        <tr class="form-field">
            <th valign="top" scope="row">
                <label for="user_pass"><?php _e('Password', 'user_details')?></label>
            </th>
            <td>
                <input id="user_pass" name="user_pass" type="password" style="width: 95%" value="" class="code" />
            </td>
        </tr>
    </tbody>
</table>
<?php
}

function user_details_validate($item){
    $messages = array();

//    if (empty($item['user_login'])) $messages[] = __('Username is required', 'user_details');
    if (empty($item['user_pass'])) $messages[] = __('Password is required', 'user_details');

    if (empty($messages)) return true;
    return implode('<br />', $messages);
}

function user_details_languages(){
    load_plugin_textdomain('user_details', false, dirname(plugin_basename(__FILE__)));
}
add_action('init', 'user_details_languages');
?>