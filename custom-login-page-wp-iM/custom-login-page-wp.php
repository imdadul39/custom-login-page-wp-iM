<?php
/*
 * Plugin Name: Custom Login Page Design
 * Plugin URI: developerimdadul.me
 * Text Domain: clpwiM
 * Description: Custom Login Page Design for your website
 * Version: 1.0.0
 * Author: Imdadul Haque
 * Author URI: developerimdadul.me
 * Requires at least: 6.1
 * Requires PHP: 7.2
*/


/*
 * Plupin Option Page Function
*/
add_action('admin_menu', 'clpwiM_add_theme_page');
function clpwiM_add_theme_page()
{
    add_menu_page('Login Option for Admin', 'Login Option', 'manage_options', 'clpw-plugin-option-iM', 'clpwiM_create_page', 'dashicons-unlock', 101);
}


// Theme css file calling
add_action('admin_enqueue_scripts', 'clpwiM_admin_enqueue_style_register');
function clpwiM_admin_enqueue_style_register()
{
    wp_register_style('clpwiM_admin_style', plugins_url('/css/clpwiM_admin_style.css', __FILE__), false, '1.0.0');
    wp_enqueue_style('clpwiM_admin_style');
}





function clpwiM_create_page()
{
?>
    <div class="clpwiM_main_area">
        <div class="clpwiM_body_area">
            <h1 id="title"><?php print esc_attr('Login Page Customizar'); ?></h1>
            <form action="options.php" method="post">
                <?php wp_nonce_field('update-options') ?>
                <!-- Primary Color  -->
                <label for="clpwiM_primary_color" name="clpwiM_primary_color"><?php print esc_attr('Primary Color'); ?></label>
                <input type="color" id="clpwiM_primary_color" name="clpwiM_primary_color" value="<?php print get_option('clpwiM_primary_color'); ?>">
                <!-- Main Logo  -->
                <label for="clpwiM_image_url" name="clpwiM_image_url"><?php print esc_attr('Main Logo'); ?></label>
                <input type="text" id="clpwiM_image_url" name="clpwiM_image_url" value="<?php print get_option('clpwiM_image_url'); ?>" placeholder="Logo link here">
                <!-- Background Image  -->
                <label for="clpwiM_background_image" name="clpwiM_background_image"><?php print esc_attr('Background Image'); ?></label>
                <input type="text" id="clpwiM_background_image" name="clpwiM_background_image" value="<?php print get_option('clpwiM_background_image'); ?>" placeholder="Background image link here">




                <!-- Background Image Opacity-->
                <label for="clpwiM_background_opacity" name="clpwiM_background_opacity"><?php print esc_attr('Background Opacity'); ?></label>
                <input type="text" id="clpwiM_background_opacity" name="clpwiM_background_opacity" value="<?php print get_option('clpwiM_background_opacity'); ?>" placeholder="Background Opacity">
                <!-- Background Image Opacity Color-->
                <label for="clpwiM_background_opacity_color" name="clpwiM_background_opacity_color"><?php print esc_attr('Background Opacity'); ?></label>
                <input type="color" id="clpwiM_background_opacity_color" name="clpwiM_background_opacity_color" value="<?php print get_option('clpwiM_background_opacity_color'); ?>">




                <input type="hidden" name="action" value="update">
                <input type="hidden" name="page_options" value="clpwiM_primary_color, clpwiM_image_url, clpwiM_background_image, clpwiM_background_opacity, clpwiM_background_opacity_color">
                <input type="submit" name="submit" class="button button-primary" value="<?php _e('Save Change', 'clpwiM'); ?>">
            </form>
        </div>
        <div class="clpwiM_sidebar_area">
            <h1 id="title"><?php print esc_attr('Author Details'); ?></h1>
            <p class="author_des">I am <a href="https://github.com/imdadul39">Imdadul Haque</a> and Front End & WordPress developer with an experience duration of about 4 years. I am an expert in WordPress theme and plugin development. I have developed many sites, and more than 95% of my clients were satisfied. At work, I use the best ways in web development. I try to keep up to date with all web industry alternatives. My main goal is to fully satisfy clients</p>

        </div>
    </div>




<?php
}

// -------------------------------------------------------------------------

// Theme css file calling
add_action('login_enqueue_scripts', 'clpwiM_login_enqueue_register');
function clpwiM_login_enqueue_register()
{
    wp_register_style('clpwiM_enqueue_style', plugins_url('/css/clpwiM_style.css', __FILE__), false, '1.0.0');
    wp_enqueue_style('clpwiM_enqueue_style');
}





// Change Login Logo 
add_action('login_enqueue_scripts', 'login_logo_change');
function login_logo_change()
{
?>
    <style>
        #login h1 a,
        .login h1 a {
            background-image: url(<?php echo get_option('clpwiM_image_url'); ?>) !important;
        }

        body.login {
            background: url(<?php echo get_option('clpwiM_background_image'); ?>) no-repeat center center / 100% 100% !important;
        }

        body.login #loginform input[type="text"],
        body.login #loginform input[type="password"],
        .login #login_error,
        .login .message,
        .login .success {
            border: 1px solid <?php echo get_option('clpwiM_primary_color'); ?> !important;
            border-left: 5px solid <?php echo get_option('clpwiM_primary_color'); ?> !important;
        }

        .login .button.wp-hide-pw .dashicons {
            color: <?php echo get_option('clpwiM_primary_color'); ?> !important;
        }

        #login form p.submit input {
            background: <?php echo get_option('clpwiM_primary_color'); ?> !important;
        }

        body.login::before {
            opacity: <?php echo get_option('clpwiM_background_opacity'); ?> !important;
            background-color: <?php echo get_option('clpwiM_background_opacity_color'); ?> !important;
        }
    </style>
<?php
}


// Change Login Logo URL
function clpwiM_login_logo_url_change()
{
    return home_url();
}
add_filter('login_headerurl', 'clpwiM_login_logo_url_change');












?>