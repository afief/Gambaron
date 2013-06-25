<?php

class db {
	
	var $server = 'localhost';
	var $name = 'fip_kurtek';
	var $user = 'kurtek';
	var $password = 'DBkurtekUP1';
	
	function __construct() {
		$this->konek();
	}
	function escape_by_ref( &$string ) {
		$string = mysql_real_escape_string( $string );
	}
	function prepare( $query = null ) { // ( $query, *$args )
		if ( is_null( $query ) )
			return;

		$args = func_get_args();
		array_shift( $args );
		// If args were passed as an array (as in vsprintf), move them up
		if ( isset( $args[0] ) && is_array($args[0]) )
			$args = $args[0];
		$query = str_replace( "'%s'", '%s', $query ); // in case someone mistakenly already singlequoted it
		$query = str_replace( '"%s"', '%s', $query ); // doublequote unquoting
		$query = str_replace( "'%d'", '%d', $query ); // in case someone mistakenly already singlequoted it
		$query = str_replace( '"%d"', '%d', $query ); // doublequote unquoting
		$query = preg_replace( '|(?<!%)%s|', "'%s'", $query ); // quote the strings, avoiding escaped strings like %%s
		array_walk( $args, array( &$this, 'escape_by_ref' ) );
		return @vsprintf( $query, $args );
	}
	
	function konek() {
		$con = mysql_connect($this->server, $this->user, $this->password);
		mysql_select_db($this->name, $con);
		
	/*	$hasil = $this->query_array("SELECT * FROM `contoh`");
		
		foreach ($hasil as $data) {
			echo $data['nama'] . '<br/>';
		}*/
	}
	function query_array($kueri) {
		
		$hasil = mysql_query($kueri);
		$data = array();
		if ($hasil) {
			while ($baris = mysql_fetch_array($hasil)) {
				array_push($data, $baris);
			}
		}		
		return $data;
	}
	function query($kueri) {
		$hasil = mysql_query($kueri);	
		return $hasil;
	}
	
}
$db = new db();
?>