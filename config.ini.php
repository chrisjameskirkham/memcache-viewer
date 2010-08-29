; <?php exit(1); __halt_compiler();
; Quick hack to stop configuration file being exposed: all you see using a
; browser now is a semi-colon.



[DEBUG]
DEBUG_MODE = ON

[SERVER]
SERVER = 127.0.0.1
PORT = 11211

[AUTH]
PASSWORD = 81b637d8fcd2c6da6359e6963113a1170de795e4b725b84d1e0b4cfd9ec58ce9

[MISC]
PHP_TIMEZONE = Europe/London



; ?>
; end the fake PHP (see hack above)
