<?php

function zenc_setup()
{
    add_theme_support('title-tag');

    add_theme_support('responsive-embeds');

    add_theme_support(
        'custom-logo',
        array(
            'height' => 30,
            'flex_height' => true,
            'flex_width' => true,
        )
    );

    add_theme_support('post-thumbnails');

    $supported_formats = array('audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video');
    add_theme_support('post-formats', $supported_formats);

    register_nav_menu('main_menu', __('Main Menu', 'zenc'));
}
add_action('after_setup_theme', 'zenc_setup');

function zenc_assets($hook)
{
    $script_path = '/assets/js/script.js';
    $script_ver = date("ymd-Gis", filemtime(get_template_directory() . $script_path));
    wp_enqueue_script('zencontent-main-js', get_template_directory_uri() . $script_path, array('jquery'), $script_ver);

    $fonts = "https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,400;0,700;1,400;1,700&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap";
    wp_enqueue_style('google-fonts', $fonts, array());

    $style_path = '/assets/css/style.css';
    $style_ver = date("ymd-Gis", filemtime(get_template_directory() . $style_path));
    wp_enqueue_style('zencontent-main-css', get_template_directory_uri() . $style_path, array('google-fonts'), $style_ver);
}
add_action('wp_enqueue_scripts', 'zenc_assets');

function zenc_script_tag($tag, $handle, $src)
{
    if (!str_contains($handle, 'zenc') || str_contains($handle, 'nodefer')) {
        return $tag;
    }

    $tag = '<script src="' . esc_url($src) . '" defer></script>';
    return $tag;
}
add_filter('script_loader_tag', 'zenc_script_tag', 10, 3);

function zenc_document_title($title)
{
    if (is_home() || is_front_page()) {
        return get_bloginfo('name') . ' | ' . get_bloginfo('description');
    } elseif (is_search()) {
        $title = __('Search results for', 'zenc') . ' "' . get_search_query() . '"';
    } elseif (is_category()) {
        $title = __('Post on category', 'zenc') . ' "' . single_cat_title('', false) . '"';
    } elseif (is_tag()) {
        $title = __('Posts tagged', 'zenc') . ' "' . single_tag_title('', false) . '"';
    } elseif (is_singular('post')) {
        $title = get_the_title();
        if (get_query_var('page')) {
            $title .= ' - ' . __('Part', 'zenc') . ' ' . get_query_var('page');
        }
    }
    if ($title) {
        $title .= ' | ' . get_bloginfo('name');
    }
    return $title;
}
add_filter('pre_get_document_title', 'zenc_document_title');

function zenc_read_more_link()
{
    return '<p><a href="' . get_permalink() . '" title="' . get_the_title() . '" class="italic">(' . __('Read more', 'zenc') . ' ...)</a></p>';
}
add_filter('the_content_more_link', 'zenc_read_more_link');

function zenc_customizer($wp_customize)
{
    class WP_Customize_Textarea_Control extends WP_Customize_Control
    {

        public $type = 'text';

        public function render_content()
        {
            ?>
            <label>
                <span class="customize-control-title">
                    <?php echo esc_html($this->label); ?>
                </span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>
            <?php
        }
    }

    $site_identity_section = $wp_customize->get_section('title_tagline');

    if ($site_identity_section) {
        $wp_customize->add_setting(
            'dark_mode_logo',
            array(
                'default' => '',
                'sanitize_callback' => 'absint',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Cropped_Image_Control(
                $wp_customize,
                'dark_mode_logo',
                array(
                    'label' => __('Logo (dark mode)', 'zenc'),
                    'section' => 'title_tagline',
                    'settings' => 'dark_mode_logo',
                    'priority' => 8,
                    'height' => 30,
                    'flex_height' => true,
                    'flex_width' => true,
                )
            )
        );

        $wp_customize->add_setting(
            'show_tagline',
            array(
                'default' => false,
                'sanitize_callback' => 'absint',
            )
        );

        $wp_customize->add_control(
            'show_tagline',
            array(
                'label' => __('Show tagline?', 'zenc'),
                'section' => 'title_tagline',
                'type' => 'checkbox',
                'priority' => 10,
            )
        );

        $wp_customize->add_setting(
            'blog_long_description',
            array(
                'default' => __('This is a zen place for content curation and self expression.', 'zenc'),
                'sanitize_callback' => 'wp_kses_post',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Textarea_Control(
                $wp_customize,
                'blog_long_description',
                array(
                    'label' => __('Long description', 'zenc'),
                    'section' => 'title_tagline',
                    'settings' => 'blog_long_description',
                )
            )
        );

        $wp_customize->add_setting(
            'footer_line',
            array(
                'default' => __('This is a place for curation and self expression.', 'zenc'),
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'footer_line',
            array(
                'label' => __('Footer text', 'zenc'),
                'section' => 'title_tagline',
                'type' => 'text',
                'priority' => 15,
            )
        );
    }
}
add_action('customize_register', 'zenc_customizer');

function zenc_get_format_icon($format, $size = 16, $wrapper_class = '')
{
    $icons = array(
        'audio' => (
            '<path d="M4 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm9-1a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM7 6a1 1 0 0 0 0 2h2a1 1 0 1 0 0-2H7Z"/>' .
            '<path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13ZM1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-.691l-1.362-2.724A.5.5 0 0 0 12 10H4a.5.5 0 0 0-.447.276L2.19 13H1.5a.5.5 0 0 1-.5-.5v-9ZM11.691 11l1 2H3.309l1-2h7.382Z"/>'
        ),
        'chat' => (
            '<path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>' .
            '<path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>'
        ),
        'gallery' => (
            '<path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>' .
            '<path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"/>'
        ),
        'image' => (
            '<path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>' .
            '<path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>'
        ),
        'link' => (
            '<path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>' .
            '<path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>'
        ),
        'quote' => (
            '<path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"/>'
        ),
        'standard' => (
            '<path d="M2.5 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1h-11zm0 3a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6zm0 3a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6zm0 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1h-11zm10.113-5.373a6.59 6.59 0 0 0-.445-.275l.21-.352c.122.074.272.17.452.287.18.117.35.26.51.428.156.164.289.351.398.562.11.207.164.438.164.692 0 .36-.072.65-.216.873-.145.219-.385.328-.721.328-.215 0-.383-.07-.504-.211a.697.697 0 0 1-.188-.463c0-.23.07-.404.211-.521.137-.121.326-.182.569-.182h.281a1.686 1.686 0 0 0-.123-.498 1.379 1.379 0 0 0-.252-.37 1.94 1.94 0 0 0-.346-.298zm-2.168 0A6.59 6.59 0 0 0 10 6.352L10.21 6c.122.074.272.17.452.287.18.117.35.26.51.428.156.164.289.351.398.562.11.207.164.438.164.692 0 .36-.072.65-.216.873-.145.219-.385.328-.721.328-.215 0-.383-.07-.504-.211a.697.697 0 0 1-.188-.463c0-.23.07-.404.211-.521.137-.121.327-.182.569-.182h.281a1.749 1.749 0 0 0-.117-.492 1.402 1.402 0 0 0-.258-.375 1.94 1.94 0 0 0-.346-.3z"/>'
        ),
        'status' => (
            '<path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>' .
            '<path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>'
        ),
        'video' => (
            '<path d="M6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"/>' .
            '<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>'
        )
    );
    if (!isset($icons[$format])) {
        return (
            '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" fill="currentColor" viewBox="0 0 16 16">' .
            '<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>' .
            '<path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>' .
            '</svg>'
        );
    }
    return (
        '<span class="' . $wrapper_class . '">' .
        '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" fill="currentColor" viewBox="0 0 16 16">' .
        $icons[$format] .
        '</svg>' .
        '</span>'
    );
}