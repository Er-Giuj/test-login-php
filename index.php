<?php
// meglio usare include e non header() perchè può creare ridondanze o loop che vengono bloccati preventivamente del browser
header("Location: ./view/homepage.php") ;