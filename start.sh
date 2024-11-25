#!/bin/sh

# 检查 /app/data 目录是否为空
if [ -z "$(ls -A /app/data)" ]; then
    echo "/app/data 目录为空"
    cp -r /app/usr/* /app/data/
    echo "文件复制完成。"
else
    echo "/app/data 目录不为空，跳过。"
fi

# 设置 /app/data 目录的权限为可写
chmod -R 777 /app/data

# 创建符号链接
ln -sfn /app/data /app/usr

# 启动 PHP-FPM 和 Nginx
php-fpm83 -D
nginx -g "daemon off;"
