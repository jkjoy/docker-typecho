#!/bin/sh
# 检查 /app/data 目录是否为空
if [ -z "$(ls -A /app/data)" ]; then
    echo "/app/data 目录为空，开始复制文件..."
    cp -r /app/usr/* /app/data/
    echo "文件复制完成。"
else
    echo "/app/data 目录不为空，跳过复制操作。"
fi
# Start PHP-FPM in the foreground
php-fpm83 -F &

# Start Nginx in the foreground
nginx -g "daemon off;"