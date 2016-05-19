<?php

class SwpmCustomMessageSettings {
    private static $_this;
    private $settings;
    public $current_tab;

    private function __construct() {
        $this->settings = (array) get_option('swpm-custom-message-settings');
    }
    public function init_config_hooks(){
        if(is_admin()){ // for frontend just load settings but dont try to render settings page.
            $tab = filter_input(INPUT_GET, 'tab');
            $tab = empty($tab)?filter_input(INPUT_POST, 'tab'):$tab;
            $this->current_tab = empty($tab) ? 1 : $tab;
            add_action('swpm-custom-message-tab', array(&$this, 'draw_tabs'));
            $method = 'tab_' . $this->current_tab;
            if (method_exists($this, $method)){
                $this->$method();
            }
        }
    }
    private function tab_1() {
        register_setting('swpm-custom-message-tab-1', 'swpm-custom-message-settings', array(&$this, 'sanitize_tab_1'));
        add_settings_section('swpm-documentation', BUtils::_('Plugin Documentation'),
                array(&$this, 'swpm_documentation_callback'), 'swpm-custom-message-settings');

        add_settings_section('pages-settings', BUtils::_('General Message Settings'),
                array(&$this, 'pages_settings_callback'), 'swpm-custom-message-settings');
        
        add_settings_field('swpm_restricted_post_msg', BUtils::_('Restricted Post'),
                array(&$this, 'textfield_long_callback'), 'swpm-custom-message-settings', 'pages-settings',
                array('item' => 'swpm_restricted_post_msg',
                      'message'=>''));
        add_settings_field('swpm_not_logged_in_post_msg', BUtils::_('Restricted Post (No Logged In)'),
                array(&$this, 'textfield_long_callback'), 'swpm-custom-message-settings', 'pages-settings',
                array('item' => 'swpm_not_logged_in_post_msg',
                      'message'=>''));
        add_settings_field('swpm_restricted_comment_msg', BUtils::_('Restricted Comment'),
                array(&$this, 'textfield_long_callback'), 'swpm-custom-message-settings', 'pages-settings',
                array('item' => 'swpm_restricted_comment_msg',
                      'message'=>''));
        add_settings_field('swpm_not_logged_in_comment_msg', BUtils::_('Restricted Comment (Not Logged In)'),
                array(&$this, 'textfield_long_callback'), 'swpm-custom-message-settings', 'pages-settings',
                array('item' => 'swpm_not_logged_in_comment_msg',
                      'message'=>''));
        add_settings_field('swpm_restricted_more_tag_msg', BUtils::_('Restricted Moretag'),
                array(&$this, 'textfield_long_callback'), 'swpm-custom-message-settings', 'pages-settings',
                array('item' => 'swpm_restricted_more_tag_msg',
                      'message'=>''));
        add_settings_field('swpm_not_logged_in_more_tag_msg', BUtils::_('Restricted Moretag (Not Logged In)'),
                array(&$this, 'textfield_long_callback'), 'swpm-custom-message-settings', 'pages-settings',
                array('item' => 'swpm_not_logged_in_more_tag_msg',
                      'message'=>''));                       
    } 

    public static function get_instance() {
        self::$_this = empty(self::$_this) ? new SwpmCustomMessageSettings() : self::$_this;
        return self::$_this;
    }

    public function checkbox_callback($args) {
        $item = $args['item'];
        $msg = isset($args['message'])?$args['message']: '';
        $is = esc_attr($this->get_value($item));
        echo "<input type='checkbox' $is name='swpm-custom-message-settings[" . $item . "]' value=\"checked='checked'\" />";
        echo '<br/><i>'.$msg.'</i>';
    }

    public function textarea_callback($args) {
        $item = $args['item'];
        $msg = isset($args['message'])?$args['message']: '';
        $text = esc_attr($this->get_value($item));
        echo "<textarea name='swpm-custom-message-settings[" . $item . "]'  rows='6' cols='60' >" . $text . "</textarea>";
        echo '<br/><i>'.$msg.'</i>';
    }

    public function textfield_small_callback($args) {
        $item = $args['item'];
        $msg = isset($args['message'])?$args['message']: '';
        $text = esc_attr($this->get_value($item));
        echo "<input type='text' name='swpm-custom-message-settings[" . $item . "]'  size='5' value='" . $text . "' />";
        echo '<br/><i>'.$msg.'</i>';
    }

    public function textfield_callback($args) {
        $item = $args['item'];
        $msg = isset($args['message'])?$args['message']: '';
        $text = esc_attr($this->get_value($item));
        echo "<input type='text' name='swpm-custom-message-settings[" . $item . "]'  size='50' value='" . $text . "' />";
        echo '<br/><i>'.$msg.'</i>';
    }

    public function textfield_long_callback($args) {
        $item = $args['item'];
        $msg = isset($args['message'])?$args['message']: '';
        $text = esc_attr($this->get_value($item));
        echo "<input type='text' name='swpm-custom-message-settings[" . $item . "]'  size='100' value='" . $text . "' />";
        echo '<br/><i>'.$msg.'</i>';
    }

    public function swpm_documentation_callback() {
        ?>
        <div style="background: none repeat scroll 0 0 #FFF6D5;border: 1px solid #D1B655;color: #3F2502;margin: 10px 0;padding: 5px 5px 5px 10px;text-shadow: 1px 1px #FFFFFF;">
        <p>Please visit the
        <a target="_blank" href="https://simple-membership-plugin.com/">Simple Membership Plugin Site</a>
        to read setup and configuration documentation.
        </p>
        </div>
        <?php
    }

    public function general_settings_callback() {
        echo "<p>General Plugin Settings.</p>";
    }

    public function testndebug_settings_callback(){
        echo "<p>Test and Debug Related Settings.</p>";
    }
    public function reg_email_settings_callback() {
        echo "<p>This email will be sent to your users when they complete the registration and become a member.</p>";
    }
    public function email_misc_settings_callback(){
        echo "<p>Settings in this section apply to all emails.</p>";
    }
    public function upgrade_email_settings_callback() {
        echo "<p>This email will be sent to your users after account upgrade.</p>";
    }

    public function reg_prompt_email_settings_callback() {
        echo "<p>This email will be sent to prompt user to complete registration.</p>";
    }

    public function pages_settings_callback() {
        echo '<p>Note: Core plugin message will not be overwritten if corresponding field is empty.<p>';
    }

    public function sanitize_tab_1($input) {
        if (empty($this->settings)){
            $this->settings = (array) get_option('swpm-custom-message-settings');
        }
        $output = $this->settings;

        $output['swpm_restricted_post_msg'] = wp_kses_data($input['swpm_restricted_post_msg']);
        $output['swpm_not_logged_in_post_msg'] = wp_kses_data($input['swpm_not_logged_in_post_msg']);
        $output['swpm_restricted_comment_msg'] = wp_kses_data($input['swpm_restricted_comment_msg']);
        $output['swpm_not_logged_in_comment_msg'] = wp_kses_data($input['swpm_not_logged_in_comment_msg']);
        $output['swpm_restricted_more_tag_msg'] = wp_kses_data($input['swpm_restricted_more_tag_msg']);
        $output['swpm_not_logged_in_more_tag_msg'] = wp_kses_data($input['swpm_not_logged_in_more_tag_msg']);        
        return $output;
    }

    public function get_value($key, $default = "") {
        if (isset($this->settings[$key])){
            return $this->settings[$key];
        }
        return $default;
    }

    public function set_value($key, $value) {
        $this->settings[$key] = $value;
        return $this;
    }

    public function save() {
        update_option('swpm-custom-message-settings', $this->settings);
    }

    public function draw_tabs() {
        $current = $this->current_tab;
        ?>
        <h3 class="nav-tab-wrapper">
            <a class="nav-tab <?php echo ($current == 1) ? 'nav-tab-active' : ''; ?>" href="admin.php?page=swpm_custom_message_settings">General Settings</a>
        </h3>
        <?php
    }
}
