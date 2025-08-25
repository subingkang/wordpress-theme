    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>关于博客</h3>
                    <p><?php echo esc_html(get_bloginfo('description')); ?></p>
                    <div class="social-links">
                        <!-- 这里可以手动添加您的社交媒体链接，或者通过小工具/自定义字段实现 -->
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>快速链接</h3>
                    <?php
                    // 再次调用主菜单，或者创建一个单独的底部菜单
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'footer-menu',
                        'container'      => false,
                        'items_wrap'     => '<ul>%3$s</ul>',
                        'fallback_cb'    => false,
                    ));
                    ?>
                </div>
                <div class="footer-column">
                    <h3>标签云</h3>
                    <ul>
                        <?php
                        $popular_tags = my_custom_blog_get_popular_tags(8); // 获取最多8个标签
                        if ($popular_tags) :
                            foreach ($popular_tags as $tag) :
                                $tag_link = get_tag_link($tag->term_id);
                                echo '<li><a href="' . esc_url($tag_link) . '">' . esc_html($tag->name) . '</a></li>';
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>
                
				<!-- 新增：替换“订阅博客”为搜索功能 -->
                <div class="footer-column">
                    <h3>站内搜索</h3>
                    <p>在博客中查找您感兴趣的内容</p>
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank"> <!-- 添加 target="_blank" -->
                        <label for="footer-search-field">
                            <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'my-custom-blog' ); ?></span>
                        </label>
                        <input type="search" id="footer-search-field" class="search-field" placeholder="<?php echo esc_attr_x( '请输入搜索关键词...', 'placeholder', 'my-custom-blog' ); ?>" value="<?php echo get_search_query(); ?>" name="s" required />
                        <button type="submit" class="btn search-submit"><i class="fas fa-search"></i> <?php echo _x( '搜索', 'submit button', 'my-custom-blog' ); ?></button>
                    </form>
                </div>
                <!-- 新增结束 -->
            </div>
            <div class="copyright">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. 保留所有权利.</p>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>