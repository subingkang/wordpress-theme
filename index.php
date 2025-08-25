<?php get_header(); ?>

<!-- Banner Section -->
<!-- 使用固定的 Banner 图片 -->
<section class="banner" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;">
    <div class="banner-content">
        <h1>在思与行的坐标中，标注成长的轨迹。</h1>
        <p>Marking the path of growth at the intersection of thought and action.</p>
        <!-- 已移除按钮 -->
        <!-- <a href="#articles" class="btn">查看文章</a> -->
    </div>
</section>

<!-- Articles Section -->
<section class="articles-section" id="articles">
    <div class="container">
        <h2 class="section-title">最新文章</h2>
        <div class="articles-grid">

            <?php
            // --- 分页逻辑开始 (同时支持分类等查询) ---
            // 获取当前页码
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            // 获取当前的查询参数 (例如 ?cat=2, ?tag=tag-slug 等)
            // wp_parse_args 会将第二个数组的值合并到第一个数组中，如果有冲突，第二个数组的值会覆盖第一个数组的值
            // 这样我们就能在默认查询的基础上添加或修改参数
            $args = wp_parse_args(
                $wp_query->query, // 获取当前页面的查询变量
                array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 10, // 每页显示 10 篇文章
                    'paged' => $paged
                )
            );

            $custom_query = new WP_Query($args);
            // --- 分页逻辑结束 ---

            if ($custom_query->have_posts()) :
                while ($custom_query->have_posts()) : $custom_query->the_post();
                    ?>
                    <div class="article-card">
                        <?php
                        // --- 调用 functions.php 中定义的函数获取图片 URL ---
                        // 假设函数名为 my_custom_blog_get_local_post_image
                        $post_image_url = my_custom_blog_get_local_post_image(get_the_ID());
                        // --- 图片逻辑结束 ---
                        ?>

                        <!-- 图片或首字母容器 -->
                        <?php if (!empty($post_image_url)): ?>
                            <!-- 如果函数返回了 URL（文章图或本地随机图），则显示图片 -->
                            <div class="article-img" style="background-image: url('<?php echo esc_url($post_image_url); ?>');"></div>
                        <?php else: ?>
                            <!-- 如果函数返回空（例如所有方法都失败），可以选择不显示图片区域 -->
                            <!-- 或者显示一个默认的图形/首字母 -->
                            <!-- 这里我们选择不显示图片区域 -->
                            <!--
                            <div class="article-img" style="background-color: #3498db;">
                                <span><?php echo esc_html(mb_substr(get_the_title(), 0, 1, 'UTF-8')); ?></span>
                            </div>
                            -->
                        <?php endif; ?>

                        <!-- 文章内容 -->
                        <div class="article-content">
                            <span class="article-date"><?php echo get_the_date(); ?></span>
                            <!-- 修改：文章标题链接在新标签页打开 -->
                            <h3 class="article-title"><a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit;" target="_blank" rel="noopener"><?php the_title(); ?></a></h3>
                            <!-- 修改结束 -->
                            <p class="article-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 55, '...'); ?></p> <!-- 调整摘要长度 -->
                            <!-- 修改：“阅读更多”链接在新标签页打开 -->
                            <a href="<?php the_permalink(); ?>" class="read-more" target="_blank" rel="noopener">阅读更多 <i class="fas fa-arrow-right"></i></a>
                            <!-- 修改结束 -->
                        </div>
                    </div>
                    <?php
                endwhile;
                ?>
                </div> <!-- 关闭 articles-grid -->
                <!-- --- 分页导航开始 --- -->
                <div class="pagination-wrapper">
                    <?php
                    echo paginate_links(array(
                        'total' => $custom_query->max_num_pages,
                        'current' => $paged,
                        'prev_text' => __('&laquo; 上一页', 'my-custom-blog'),
                        'next_text' => __('下一页 &raquo;', 'my-custom-blog'),
                        'mid_size' => 2,
                        'end_size' => 1,
                        'type' => 'list', // 改为 'list' 类型，方便用 CSS 美化
                        'prev_next' => true,
                        // 添加以下两行，让 WordPress 正确处理查询参数
                        'add_args' => array(), // 确保当前查询参数被保留
                        'format' => '?paged=%#%', // 定义页码参数的格式
                    ));
                    ?>
                </div>
                <!-- --- 分页导航结束 --- -->
                <?php
                // 重置主查询数据
                wp_reset_postdata();
            else :
                ?>
                <p><?php esc_html_e('暂时还没有文章。', 'my-custom-blog'); ?></p>
                </div> <!-- 即使没文章也关闭 articles-grid -->
            <?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>
