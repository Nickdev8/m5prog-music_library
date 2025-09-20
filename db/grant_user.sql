CREATE USER IF NOT EXISTS 'm5prog_user'@'%' IDENTIFIED BY 'supersecret';
GRANT ALL PRIVILEGES ON music_library.* TO 'm5prog_user'@'%';
FLUSH PRIVILEGES;
