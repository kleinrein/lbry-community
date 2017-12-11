<?php
// Adminer Extension
function adminer_object() {

	class AdminerSoftware extends Adminer {
		public function credentials() {
			return array('localhost', 'root', 'root');
		}

		public function database() {
			return 'local';
		}
	}

	return new AdminerSoftware;

}
// Include Adminer Script
if ( file_exists('/etc/scripts/local-adminer.php') ) {
	include('/etc/scripts/local-adminer.php');
} else if ( file_exists('/etc/scripts/pressmatic-adminer.php') ) {
	include('/etc/scripts/pressmatic-adminer.php');
} else {
	die('Adminer source not found.');
}
