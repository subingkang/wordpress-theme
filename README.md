# My Custom Blog Theme

![WordPress](https://img.shields.io/badge/WordPress-21759B?style=for-the-badge&logo=wordpress&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

一个现代化、简洁优雅的WordPress博客主题，专注于提供优秀的阅读体验和个人博客展示。

## 🌟 项目简介

My Custom Blog 是一个专为个人博客设计的WordPress主题，具有简洁的单列布局、响应式设计和丰富的功能特性。主题采用现代化的设计理念，注重用户体验和内容展示。

### 🎯 设计理念

- **内容为王**: 专注于内容展示，减少视觉干扰
- **简洁优雅**: 采用单列布局，突出文章内容
- **响应式设计**: 完美适配桌面、平板和移动设备
- **个性化定制**: 支持多种自定义功能和配置

## ✨ 主要特性

### 🎨 设计特色

- **单列布局**: 首页采用单列文章展示，简洁清晰
- **横式卡片**: 文章卡片采用横向布局，图文并茂
- **固定Banner**: 统一的页面顶部横幅设计
- **响应式设计**: 移动端自动切换为垂直卡片布局

### 🖼️ 图片管理

- **智能图片获取**: 
  1. 优先提取文章内容中的第一张图片
  2. 其次使用文章特色图像
  3. 最后从主题`/images/`文件夹随机选择
- **本地图片支持**: 支持多种格式(jpg, jpeg, png, gif, webp)
- **自动适配**: 图片自动调整尺寸和显示效果

### 🛠️ 功能特性

- **分页导航**: 美观的分页样式，支持查询参数保留
- **搜索功能**: 页脚集成搜索模块，支持新标签页打开
- **标签云**: 页脚显示热门标签
- **社交链接**: 支持多种社交媒体图标
- **代码高亮**: 优化的代码块显示效果
- **SEO友好**: 内置SEO优化功能

### 🎭 特殊页面

- **终端风格页面**: 独特的终端模拟器页面模板
- **打字机效果**: 动态文字显示动画
- **个性化介绍**: 可自定义的个人简介内容

## 📁 文件结构

```
My_Custom_Blog/
├── style.css           # 主样式文件
├── functions.php       # 主题功能函数
├── header.php         # 页头模板
├── footer.php         # 页脚模板
├── index.php          # 首页模板
├── single.php         # 文章详情页模板
├── page.php           # 静态页面模板
├── template-terminal.php # 终端风格页面模板
└── images/            # 本地图片文件夹（需自行创建）
    ├── image1.jpg
    ├── image2.png
    └── ...
```

## 🚀 安装与使用

### 📋 系统要求

- WordPress 5.0+
- PHP 7.4+
- MySQL 5.6+ 或 MariaDB 10.1+

### 💾 安装步骤

1. **下载主题**
   ```bash
   git clone [repository-url] My_Custom_Blog
   ```

2. **上传主题**
   - 将整个 `My_Custom_Blog` 文件夹上传到 `/wp-content/themes/` 目录

3. **激活主题**
   - 在WordPress后台 → 外观 → 主题 中激活 "My Custom Blog"

4. **创建图片文件夹**
   ```bash
   mkdir wp-content/themes/My_Custom_Blog/images
   ```

5. **上传默认图片**
   - 上传一些图片到 `images/` 文件夹作为随机展示图片

### ⚙️ 配置设置

#### 菜单设置
1. 后台 → 外观 → 菜单
2. 创建新菜单并分配到"主导航菜单"位置

#### 图片设置
- 在 `images/` 文件夹中添加您喜欢的图片
- 支持格式: jpg, jpeg, png, gif, webp
- 建议尺寸: 1200x800px 或以上

#### 终端页面设置
1. 创建新页面
2. 选择"终端风格页面"模板
3. 可在 `template-terminal.php` 中自定义显示内容

## 🎨 自定义配置

### 🖼️ Banner图片
默认使用Unsplash图片，可在以下文件中修改：
- `index.php` - 首页Banner
- `single.php` - 文章页Banner  
- `page.php` - 静态页面Banner
- `template-terminal.php` - 终端页面Banner

### 🎨 颜色主题
在 `style.css` 中可自定义：
- 主色调: `#3498db`
- 文字颜色: `#2c3e50`
- 背景色: `#f8f9fa`
- 链接颜色: `#3498db`

### 📝 终端内容
修改 `template-terminal.php` 中的 `text` 变量内容：
```javascript
const text = `
> 您的自定义终端内容
...
`;
```

## 🔧 依赖与集成

### 外部依赖
- **Font Awesome 6.4.0**: 图标库 (通过BootCDN加载)
- **Unsplash**: 默认Banner图片

### 推荐插件
- **WP-PostViews**: 文章阅读量统计
- **Yoast SEO**: SEO优化
- **WP Rocket**: 性能优化

## 📱 响应式支持

### 断点设置
- **桌面端**: > 768px (横式卡片布局)
- **平板端**: ≤ 768px (垂直卡片布局)
- **手机端**: ≤ 480px (优化的移动端显示)

### 移动端优化
- 导航菜单自适应
- 文章卡片垂直排列
- 触摸友好的按钮尺寸
- 优化的阅读体验

## 🎯 SEO优化

### 内置功能
- 语义化HTML结构
- 优化的页面标题
- Meta描述支持
- 结构化数据准备
- 快速加载优化

### 最佳实践
- 使用合适的图片alt属性
- 优化文章摘要长度
- 合理使用标题层级
- 设置适当的内部链接

## 🚀 性能优化

### 前端优化
- CSS/JS压缩
- 图片懒加载准备
- 字体优化加载
- 减少HTTP请求

### 缓存建议
- 启用浏览器缓存
- 使用CDN加速
- 启用Gzip压缩
- 数据库查询优化

## 🛠️ 开发说明

### 代码规范
- 遵循WordPress编码标准
- PSR-4命名规范
- 注释完整规范
- 安全性考虑周全

### 自定义开发
```php
// 在functions.php中添加自定义功能
function my_custom_function() {
    // 您的代码
}
add_action('wp_head', 'my_custom_function');
```

### Hook支持
主题提供多个自定义Hook点，便于扩展功能。

## 🤝 贡献指南

欢迎提交Issue和Pull Request来改进这个主题！

### 提交流程
1. Fork 本项目
2. 创建特性分支 (`git checkout -b feature/AmazingFeature`)
3. 提交更改 (`git commit -m 'Add some AmazingFeature'`)
4. 推送到分支 (`git push origin feature/AmazingFeature`)
5. 开启 Pull Request

## 📄 更新日志

### Version 1.0
- ✅ 初始版本发布
- ✅ 单列布局设计
- ✅ 响应式支持
- ✅ 图片智能管理
- ✅ 终端风格页面
- ✅ 搜索功能集成
- ✅ 代码高亮优化

## 🔮 开发计划

- [ ] 暗色主题支持
- [ ] 更多页面模板
- [ ] 小工具扩展
- [ ] 多语言支持
- [ ] 性能进一步优化
- [ ] 更多自定义选项

## 📞 技术支持

如果您在使用过程中遇到问题：

1. 查看本README文档
2. 检查WordPress和PHP版本兼容性
3. 确认所需插件已安装
4. 提交Issue描述问题

## 📜 许可证

本项目采用 GNU General Public License v2 或更高版本许可证。

## 👨‍💻 作者信息

- **作者**: subk
- **网站**: https://subkme.com
- **主题版本**: 1.0

---

⭐ 如果这个主题对您有帮助，请给个Star支持一下！

💡 **提示**: 定期备份您的网站数据，并在更新前进行测试！
