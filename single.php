<?php get_header(); ?>

<?php
while ( have_posts() ) : the_post();
    // 固定的 Banner 图片 URL
    $fixed_banner_url = 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1600&q=80';
    ?>

    <!-- 文章特色图片横幅 (使用固定的图片) -->
    <section class="banner" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?php echo esc_url( $fixed_banner_url ); ?>') center/cover no-repeat; height: 350px;">
        <div class="banner-content">
            <h1>在思与行的坐标中，标注成长的轨迹。</h1>
				 <p>Marking the path of growth at the intersection of thought and action.</p>
        </div>
    </section>

    <!-- 文章内容主区域 -->
    <section class="articles-section">
        <div class="container">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <!-- 文章标题 -->
                <h1 class="article-title"><?php the_title(); ?></h1>

                <!-- 文章元数据 -->
                <div class="article-meta">
                    <span class="article-date"><i class="far fa-calendar-alt"></i> <?php echo get_the_date(); ?></span>
                    <span class="article-author"><i class="fas fa-user"></i> <?php the_author_posts_link(); ?></span>
                    <?php if ( has_category() ) : ?>
                        <span class="article-categories"><i class="fas fa-folder-open"></i> <?php the_category( ', ' ); ?></span>
                    <?php endif; ?>
                    <?php if ( function_exists( 'the_views' ) ) : ?>
                        <span class="article-views"><i class="fas fa-eye"></i> <?php the_views(); ?></span>
                    <?php endif; ?>
                </div>

                <!-- 文章内容 -->
                <div class="article-content entry-content">
                    <?php the_content(); ?>
                </div>

                <!-- 文章标签 -->
                <?php if ( has_tag() ) : ?>
                    <div class="article-tags">
                        <p><strong><i class="fas fa-tags"></i> 标签:</strong> <?php the_tags( '', ', ', '' ); ?></p>
                    </div>
                <?php endif; ?>

                <!-- 文章导航 -->
                <nav class="navigation post-navigation" role="navigation">
                    <h2 class="screen-reader-text">文章导航</h2>
                    <div class="nav-links">
                        <div class="nav-previous">
                            <?php previous_post_link( '%link', '<i class="fas fa-arrow-left"></i> %title' ); ?>
                        </div>
                        <div class="nav-next">
                            <?php next_post_link( '%link', '%title <i class="fas fa-arrow-right"></i>' ); ?>
                        </div>
                    </div>
                </nav>

            </article>
        </div>
    </section>

<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
