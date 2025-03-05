#!/bin/sh

# Set error handling
set -e

# Directory paths
DATA_DIR="/app/data"
USR_DIR="/app/usr"
CONFIG_FILE="${DATA_DIR}/config.inc.php"
THEMES_DIR="${DATA_DIR}/themes"

# Function to log messages
log_msg() {
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] $1"
}

# Create PHP-FPM socket directory if needed
if [ ! -d /run ]; then
    mkdir -p /run
    chown nginx:nginx /run
fi

# Function to copy directory contents
copy_contents() {
    local src="$1"
    local dst="$2"
    local msg="$3"

    # 使用 `/.` 确保复制目录内容而非目录本身
    cp -r "$src/." "$dst"
    log_msg "$msg"
}

# Initialize data directory if empty or missing config
if [ -z "$(ls -A "$DATA_DIR" 2>/dev/null)" ]; then
    log_msg "${DATA_DIR} is empty"
    copy_contents "$USR_DIR" "$DATA_DIR" "Initial files copied to data directory"
elif [ ! -f "$CONFIG_FILE" ]; then
    log_msg "config.inc.php not found"
    copy_contents "$USR_DIR" "$DATA_DIR" "Config file restored from default"
fi

# Check and create themes directory if needed
if [ ! -d "$THEMES_DIR" ]; then
    log_msg "${THEMES_DIR} does not exist"
    copy_contents "${USR_DIR}/themes" "$THEMES_DIR" "Themes directory copied"
fi

# Create symbolic links
log_msg "Creating symbolic links..."
ln -sfn "$DATA_DIR/" "$USR_DIR/"
ln -sfn "$CONFIG_FILE" "/app/config.inc.php"

# Start services
log_msg "Starting PHP-FPM and Nginx..."
php-fpm83 -D
exec nginx -g "daemon off;"
