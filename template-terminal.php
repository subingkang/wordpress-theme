<?php
/**
 * Template Name: 终端风格页面
 * Description: 一个模拟终端输出的自定义页面模板。
 */

// 禁止直接访问
defined( 'ABSPATH' ) || exit;

get_header(); // 加载博客主题的页头
?>

<!-- Banner Section -->
<!-- 使用与博客其他页面一致的 Banner 图片和样式 -->
<section class="banner" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;">
    <div class="banner-content">
        <!-- 动态显示当前页面标题 -->
        <h1><?php the_title(); ?></h1>
        <p>欢迎来到我的数字实验室</p>
    </div>
</section>
<!-- Banner Section 结束 -->

<!-- 终端风格内容主区域 -->
<!-- 页面背景与博客主体背景一致 -->
<section class="terminal-section" style="background-color: #f8f9fa; color: #333; padding: 40px 0; min-height: calc(100vh - 60px - 120px - 80px);">
    <style>
        /* --- 终端风格页面模板样式 --- */
        /* 终端模拟器容器 */
        .terminal-emulator {
            /* 背景色与博客文章页面一致 */
            background-color: #f8f9fa;
            /* --- 修改：文字颜色使用方案 B (深绿色) --- */
            color: #28a745;
            font-family: 'Courier New', Courier, monospace;
            font-size: 1rem;
            line-height: 1.5;
            /* 设置固定宽度或最大宽度，使其居中且不过宽 */
            width: 90%;
            max-width: 900px;
            margin: 0 auto; /* 水平居中 */
            /* --- 修改：移除内边距 --- */
            /* padding: 20px; */
            /* --- 修改：移除外框、圆角和阴影 --- */
            /* border: 1px solid #e1e4e8; */
            /* border-radius: 6px; */
            /* box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); */
            /* 确保内容区域有足够的上下间距 */
            margin-top: 20px;
            margin-bottom: 40px;
            /* 防止内容过宽时溢出 */
            overflow-x: auto;
        }

        /* 终端光标动画 */
        .terminal-emulator .typing {
            /* --- 修改：光标颜色与文字颜色一致 --- */
            border-right: 2px solid #28a745;
            white-space: pre-wrap;
            overflow: hidden;
            animation: blink 0.8s infinite step-end; /* 使用 step-end 使闪烁更清晰 */
        }

        @keyframes blink {
            0%, 100% { border-color: #28a745; opacity: 1; }
            50% { border-color: transparent; opacity: 0.8; }
        }

        /* 确保终端内容预格式化文本区域样式 */
        .terminal-emulator pre#terminal-output {
            margin: 0; /* 重置可能的默认外边距 */
            /* --- 修改：移除内边距 --- */
            /* padding: 0; */
            background-color: transparent; /* 确保背景透明 */
            border: none; /* 移除默认边框 */
            font-size: inherit; /* 继承父元素字体大小 */
            line-height: inherit; /* 继承父元素行高 */
            color: inherit; /* 继承父元素文字颜色 */
            white-space: pre-wrap; /* 允许换行 */
            word-wrap: break-word; /* 防止单词过长溢出 */
        }
        /* --- 终端风格页面模板样式 结束 --- */
    </style>

    <!-- --- 修改：移除外层 div (.terminal-content) --- -->
    <div class="terminal-emulator">
        <pre id="terminal-output" class="typing"></pre> <!-- 添加 typing 类以触发动画 -->
    </div>
    <!-- --- 修改结束 --- -->

    <script>
        // 终端输出内容和打字机效果
        (function() {
            // 使用 IIFE (Immediately Invoked Function Expression) 避免全局变量污染
            // --- 终端输出文本 ---
            const text = `
> whoami
┌───────────────────────────┐
│ 技术是玩具，好奇是燃料。 │
└───────────────────────────┘

> load_profile --mode=multi-thread

[系统日志] 初始化个人信息模块... ✅
[系统日志] 加载兴趣标签... ✅
[系统日志] 启动多线程人格... ✅

👋 你好，我是一个在现实世界和数字世界之间来回穿梭的多线程玩家。

🛠️ 有时像工程师：拆开设备，研究它的秘密
🍳 有时像厨师：把代码、数据和奇怪的想法熬成新功能
🧭 有时像探险家：在硬件和软件的边界上试探未知

> show --interests
- 🤖 自动化脚本 / 系统优化 / 网络调优
- 🖥️ 电子设备改造 / 信息化项目 / DIY 硬件
- 🎵 音乐  📷 摄影  🍜 美食研究
- 🧪 各种“不作死就不会死”的技术实验

> philosophy
"能用" ≠ 终点
"还能更好用" = 起点

> about_blog
这个博客是我的数字实验室：
✨ 有时会产出闪闪发光的点子
💥 有时会爆出运行到一半冒烟的计划

> end
这个博客，就是我数字生活的一个小基地。欢迎你来逛逛，看看我最近又在折腾什么。
欢迎进入，随意探索。
`;
            // --- 终端输出文本结束 ---

            let i = 0;
            const terminalElement = document.getElementById("terminal-output");
            if (terminalElement) { // 确保元素存在
                function typeWriter() {
                    if (i < text.length) {
                        terminalElement.textContent = text.substring(0, i + 1);
                        i++;
                        // 使用 setTimeout 控制打字速度
                        setTimeout(typeWriter, 25);
                    } else {
                        // 打字结束后，可以停止光标闪烁动画（如果需要）
                        // terminalElement.classList.remove('typing');
                    }
                }
                // 启动打字机效果
                typeWriter();
            }
        })();
    </script>
</section>
<!-- 终端风格内容主区域 结束 -->

<?php
// 可选：如果需要显示页面内容编辑器中的内容（不推荐用于此特定模板）
// the_content();

get_footer(); // 加载博客主题的页脚
?>
