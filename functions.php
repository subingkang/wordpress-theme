<?php
/**
 * 主题函数和定义
 *
 * @package My_Custom_Blog
 */

if ( ! function_exists( 'my_custom_blog_setup' ) ) :
	/**
	 * 设置主题默认值并注册对各种 WordPress 功能的支持。
	 */
	function my_custom_blog_setup() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		register_nav_menus(
			array(
				'primary' => esc_html__( '主导航菜单', 'my-custom-blog' ),
			)
		);
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		add_theme_support(
			'custom-background',
			apply_filters(
				'my_custom_blog_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'my_custom_blog_setup' );

/**
 * 根据主题的设计和样式表设置内容宽度（以像素为单位）。
 *
 * 优先级设为 0，使其可用于较低优先级的回调函数。
 *
 * @global int $content_width
 */
function my_custom_blog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'my_custom_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'my_custom_blog_content_width', 0 );

/**
 * 注册小工具区域。
 */
function my_custom_blog_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( '侧边栏', 'my-custom-blog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( '在这里添加小工具。', 'my-custom-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'my_custom_blog_widgets_init' );

/**
 * 引入脚本和样式。
 */
function my_custom_blog_scripts() {
	// 使用国内 CDN 加速 Font Awesome
	wp_enqueue_style( 'my-custom-blog-fontawesome', 'https://cdn.bootcdn.net/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );

	// 引入主主题样式表
	wp_enqueue_style( 'my-custom-blog-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'my_custom_blog_scripts' );

/**
 * 自定义函数：获取文章图片 URL
 *
 * 逻辑：
 * 1. 检查文章内容中是否有图片，有则返回第一张图片的 URL。
 * 2. 检查文章是否有特色图像，有则返回特色图像 URL。
 * 3. 如果都没有，则从主题的 /images/ 文件夹中随机选择一张图片。
 *
 * @param int    $post_id 文章 ID。
 * @param string $size    可选。图像尺寸。默认 'large'。
 * @return string 图片 URL。
 */
function my_custom_blog_get_local_post_image( $post_id, $size = 'large' ) {
    $image_url = '';

    // --- 1. 尝试获取文章内容中的第一张图片 ---
    $content = get_post_field( 'post_content', $post_id );
    $output  = preg_match_all( '/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i', $content, $matches );
    if ( isset( $matches[1][0] ) ) {
        $image_url = $matches[1][0];
    }

    // --- 2. 如果文章内容中没有图片，则尝试获取特色图像 ---
    if ( empty( $image_url ) ) {
        if ( has_post_thumbnail( $post_id ) ) {
            $thumbnail_id = get_post_thumbnail_id( $post_id );
            $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, $size );
            if ( $thumbnail_url ) {
                $image_url = $thumbnail_url[0];
            }
        }
    }

    // --- 3. 如果都没有，则从本地 images 文件夹随机选择 ---
    if ( empty( $image_url ) ) {
        // 定义本地图片文件夹路径和 URL
        $local_images_dir = get_stylesheet_directory() . '/images/';
        $local_images_url  = get_stylesheet_directory_uri() . '/images/';

        // 检查文件夹是否存在
        if ( is_dir( $local_images_dir ) ) {
            // 使用 glob() 函数查找所有图片文件
            $image_files = glob( $local_images_dir . '*.{jpg,jpeg,png,gif,webp,JPG,JPEG,PNG,GIF,WEBP}', GLOB_BRACE );

            if ( ! empty( $image_files ) ) {
                // 随机选择一个文件
                $random_file = $image_files[ array_rand( $image_files ) ];
                // 获取文件名
                $filename = basename( $random_file );
                // 构造 URL
                $image_url = $local_images_url . $filename;
            }
        }
    }

    // 确保返回的 URL 已正确转义
    return ! empty( $image_url ) ? esc_url( $image_url ) : '';
}

/**
 * 自定义函数：获取使用次数最多的标签。
 *
 * 逻辑：
 * get_tags() 默认按使用次数降序排序。
 *
 * @param int $number 要检索的标签数量。默认 8。
 * @return array 标签对象数组。
 */
function my_custom_blog_get_popular_tags( $number = 8 ) {
	$tags = get_tags(
		array(
			'number'  => $number,
			'orderby' => 'count',
			'order'   => 'DESC',
			'hide_empty' => true,
		)
	);
	return $tags;
}

// --- 可以在这里添加更多函数 ---

?>