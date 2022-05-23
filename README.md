# 这个主题跟ZERO有什么区别？

主题重置，不兼容ZERO

# 开发

## 安装依赖

npm i 

## 编译css

MIN使用TailwindCSS框架来实现样式效果,需要在package.json启用build监听并编译css。

如有新建页面请放置includes目录,CSS将会根据此目录内的文件进行获取。

最终打包到assets/css/main.css

## 编译sass/scss

TailwindCSS难免无法满足个别需求,因此MIN也支持编译sass/scss,需要在package.json启用sass监听并编译css。

将会根据assets/css/scss目录内的sass/scss文件进行编译。

最终打包到assets/css目录内,请注意assets/css/scss目录内的文件名不要与assets/css目录一致,否则css有被覆盖风险。

## 环境

请自行搭建Typecho相关环境进行部署。