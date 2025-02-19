#!/bin/sh

# 检查 /app/data 目录是否为空
if [ -z "$(ls -A /app/data)" ]; then
    echo "/app/data 目录为空"
    cp -r /app/usr/* /app/data/
    echo "文件复制完成。"
else
    echo "/app/data 目录不为空，跳过。"
fi

# 检查 /app/data/config.inc.php 是否存在
if [ ! -f /app/data/config.inc.php ]; then
    echo "config.inc.php 不存在"
    cp -r /app/usr/* /app/data/
    echo "文件复制完成。"
else
    echo "config.inc.php 存在，跳过。"
fi

# 检查 /app/data/themes 目录是否存在
if [ ! -d /app/data/themes ]; then
    echo "/app/data/themes 目录不存在"
    cp -r /app/usr/themes /app/data/
    echo "themes 目录复制完成。"
else
    echo "themes 目录存在，跳过。"
fi

# 设置 /app/data 目录的权限为可写
echo "设置 /app/data 目录的权限为可写..."
#chmod -R g+w /app/data
chown -R 101:101 /app/data
#chmod -R 775 /app/data  # 根据需求调整权限

# 创建符号链接
ln -sfn /app/data/ /app/usr/
ln -sfn /app/data/config.inc.php /app/config.inc.php

# 启动 PHP-FPM 和 Nginx
echo "启动 PHP-FPM 和 Nginx..."
php-fpm83 -D
nginx -g "daemon off;"
