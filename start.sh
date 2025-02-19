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

# Create PHP-FPM socket directory if it doesn't exist
if [ ! -d /run ]; then
# Copy files from source to destination directory, logging the given message
# $1: source directory
# $2: destination directory
# $3: message to log
    mkdir -p /run
    chown nginx:nginx /run
fi

# Function to copy files with logging
copy_files() {
    local src="$1"
    local dst="$2"
    local msg="$3"
    
    cp -r "$src" "$dst"
    log_msg "$msg"
}

# Initialize data directory if empty
if [ -z "$(ls -A "$DATA_DIR" 2>/dev/null)" ]; then
    log_msg "${DATA_DIR} is empty"
    copy_files "${USR_DIR}/*" "$DATA_DIR" "Files copied successfully"
elif [ ! -f "$CONFIG_FILE" ]; then
    log_msg "config.inc.php not found"
    copy_files "${USR_DIR}/*" "$DATA_DIR" "Files copied successfully"
fi

# Check and create themes directory if needed
if [ ! -d "$THEMES_DIR" ]; then
    log_msg "${THEMES_DIR} does not exist"
    copy_files "${USR_DIR}/themes" "$DATA_DIR" "Themes directory copied successfully"
fi

# Create symbolic links
log_msg "Creating symbolic links..."
ln -sfn "$DATA_DIR/" "$USR_DIR/"
ln -sfn "$CONFIG_FILE" "/app/config.inc.php"

# Start services
log_msg "Starting PHP-FPM and Nginx..."
php-fpm83 -D
exec nginx -g "daemon off;"