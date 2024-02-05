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
