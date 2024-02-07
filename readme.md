## xdebug config

```ini
;zend_extension = xdebug
; tutorial: https://www.youtube.com/watch?v=_vUOljbEzoE
; tutorial: https://simplecodetips.wordpress.com/2018/07/12/instalar-xdebug-con-xampp-en-ubuntu-18-04/
zend_extension = /opt/lampp/lib/php/extensions/no-debug-non-zts-20220829/xdebug.so

[XDebug]
xdebug.remote_enable=1
xdebug.remote_port=9003
xdebug.profiler_append = 0
xdebug.profiler_enable = 1
xdebug.profiler_enable_trigger = 0
xdebug.profile_output_dir = "/tmp"
xdebug.start_with_request = yes
xdebug.discover_client_host = true
xdebug.mode = debug

```

# database init
```sql

CREATE TABLE
    IF NOT EXISTS users (
        user_id INT PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(64) NOT NULL
    );


CREATE TABLE
    IF NOT EXISTS customers (
        id INT PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        address VARCHAR(64) NOT NULL
    );
    
INSERT INTO customers (first_name, last_name, address) VALUES
    ('cristhian', 'manrique', 'cra 3 a 2 b 1 - yopal, casanare'),
    ('fernando', 'moreno', 'cra 1 a 2 b 3 - yopal, casanare'),
    ('cristhian fernando', 'moreno manrique', 'cra 1 b 2 a 3 - yopal, casanare');
    
INSERT INTO users (username, password) VALUES
    ('admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
    ('user2', '057ba03d6c44104863dc7361fe4578965d1887360f90a0895882e58a6248fc86'),
    ('user3', '057ba03d6c44104863dc7361fe4578965d1887360f90a0895882e58a6248fc86'),
    ('user1', '057ba03d6c44104863dc7361fe4578965d1887360f90a0895882e58a6248fc86');

```
