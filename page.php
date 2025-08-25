<?php get_header(); ?>

<!-- 页面 Banner Section -->
<!-- 使用与首页/文章页相同的固定 Banner 图片 -->
<section class="banner" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;">
    <div class="banner-content">
        <!-- Banner 内容可以留空，或者放一些装饰性元素 -->
        <!-- 页面标题将在下方主要内容区域显示 -->
    </div>
</section>

<!-- 页面内容主区域 -->
<section class="articles-section">
    <div class="container">
        <?php
        // 开始 WordPress 循环
        while ( have_posts() ) : the_post();
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <!-- 页面标题 -->
                <h1 class="article-title"><?php the_title(); ?></h1>

                <!-- 页面内容 -->
                <div class="article-content entry-content">
                    <?php the_content(); ?>
                    <!--
                        如果您的页面需要评论功能，可以取消下面两行的注释。
                        通常，静态页面（如“关于我们”、“联系方式”）不需要评论。
                    -->
                    <?php
                    // 如果需要评论功能，请取消下面两行注释
                    // if ( comments_open() || get_comments_number() ) :
                    //     comments_template();
                    // endif;
                    ?>
                </div>

            </article><!-- #post-<?php the_ID(); ?> -->
        <?php endwhile; // 结束 WordPress 循环 ?>
    </div>
</section>

<?php get_footer(); ?>
