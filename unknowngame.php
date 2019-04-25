<?php
    parse_str($_SERVER['QUERY_STRING'], $values);
    # It is unlikely the engine name will be correct (e.g. missing capitalization) but
    # try to use it nonetheless. The worst that can happen is that it will be ignored.
    header("Location: https://bugs.scummvm.org/newticket?&type=enhancement&keywords=unknown-game&component=Engine:%20".$values['engine']."&description=".$values['description']);
    exit();
?>