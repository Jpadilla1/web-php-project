<?php

function escape($str) {
	return htmlentities($str, ENT_QUOTES, 'UTF-8');
}

?>