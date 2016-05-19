<?php screen_icon( 'options-general' );?>
<h1><?= BUtils::_('Simple WP Membership Custom Message::Settings') ?></h1>
 <div class="wrap">
        <?php do_action("swpm-custom-message-tab"); ?>
        <form action="options.php" method="POST">
            <input type="hidden" name="tab" value="<?php echo $current_tab;?>" />
            <?php settings_fields( 'swpm-custom-message-tab-' . $current_tab ); ?>
            <?php do_settings_sections( 'swpm-custom-message-settings' ); ?>
            <?php submit_button(); ?>
        </form>
    </div>
