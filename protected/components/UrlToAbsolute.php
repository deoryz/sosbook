<?php
/**
* 
*/
class UrlToAbsolute
{
	public static function join_url( $parts, $encode=TRUE )
	{
		if ( $encode )
		{
			if ( isset( $parts['user'] ) )
				$parts['user']     = rawurlencode( $parts['user'] );
			if ( isset( $parts['pass'] ) )
				$parts['pass']     = rawurlencode( $parts['pass'] );
			if ( isset( $parts['host'] ) &&
				!preg_match( '!^(\[[\da-f.:]+\]])|([\da-f.:]+)$!ui', $parts['host'] ) )
				$parts['host']     = rawurlencode( $parts['host'] );
			if ( !empty( $parts['path'] ) )
				$parts['path']     = preg_replace( '!%2F!ui', '/',
					rawurlencode( $parts['path'] ) );
			if ( isset( $parts['query'] ) )
				$parts['query']    = rawurlencode( $parts['query'] );
			if ( isset( $parts['fragment'] ) )
				$parts['fragment'] = rawurlencode( $parts['fragment'] );
		}

		$url = '';
		if ( !empty( $parts['scheme'] ) )
			$url .= $parts['scheme'] . ':';
		if ( isset( $parts['host'] ) )
		{
			$url .= '//';
			if ( isset( $parts['user'] ) )
			{
				$url .= $parts['user'];
				if ( isset( $parts['pass'] ) )
					$url .= ':' . $parts['pass'];
				$url .= '@';
			}
			if ( preg_match( '!^[\da-f]*:[\da-f.:]+$!ui', $parts['host'] ) )
				$url .= '[' . $parts['host'] . ']';	// IPv6
			else
				$url .= $parts['host'];			// IPv4 or name
			if ( isset( $parts['port'] ) )
				$url .= ':' . $parts['port'];
			if ( !empty( $parts['path'] ) && $parts['path'][0] != '/' )
				$url .= '/';
		}
		if ( !empty( $parts['path'] ) )
			$url .= $parts['path'];
		if ( isset( $parts['query'] ) )
			$url .= '?' . $parts['query'];
		if ( isset( $parts['fragment'] ) )
			$url .= '#' . $parts['fragment'];
		return $url;
	}
	public static function split_url( $url, $decode=TRUE )
	{
		// Character sets from RFC3986.
		$xunressub     = 'a-zA-Z\d\-._~\!$&\'()*+,;=';
		$xpchar        = $xunressub . ':@%';

		// Scheme from RFC3986.
		$xscheme        = '([a-zA-Z][a-zA-Z\d+-.]*)';

		// User info (user + password) from RFC3986.
		$xuserinfo     = '((['  . $xunressub . '%]*)' .
		                 '(:([' . $xunressub . ':%]*))?)';

		// IPv4 from RFC3986 (without digit constraints).
		$xipv4         = '(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})';

		// IPv6 from RFC2732 (without digit and grouping constraints).
		$xipv6         = '(\[([a-fA-F\d.:]+)\])';

		// Host name from RFC1035.  Technically, must start with a letter.
		// Relax that restriction to better parse URL structure, then
		// leave host name validation to application.
		$xhost_name    = '([a-zA-Z\d-.%]+)';

		// Authority from RFC3986.  Skip IP future.
		$xhost         = '(' . $xhost_name . '|' . $xipv4 . '|' . $xipv6 . ')';
		$xport         = '(\d*)';
		$xauthority    = '((' . $xuserinfo . '@)?' . $xhost .
			         '?(:' . $xport . ')?)';

		// Path from RFC3986.  Blend absolute & relative for efficiency.
		$xslash_seg    = '(/[' . $xpchar . ']*)';
		$xpath_authabs = '((//' . $xauthority . ')((/[' . $xpchar . ']*)*))';
		$xpath_rel     = '([' . $xpchar . ']+' . $xslash_seg . '*)';
		$xpath_abs     = '(/(' . $xpath_rel . ')?)';
		$xapath        = '(' . $xpath_authabs . '|' . $xpath_abs .
				 '|' . $xpath_rel . ')';

		// Query and fragment from RFC3986.
		$xqueryfrag    = '([' . $xpchar . '/?' . ']*)';

		// URL.
		$xurl          = '^(' . $xscheme . ':)?' .  $xapath . '?' .
		                 '(\?' . $xqueryfrag . ')?(#' . $xqueryfrag . ')?$';


		// Split the URL into components.
		if ( !preg_match( '!' . $xurl . '!', $url, $m ) )
			return FALSE;

		if ( !empty($m[2]) )		$parts['scheme']  = strtolower($m[2]);

		if ( !empty($m[7]) ) {
			if ( isset( $m[9] ) )	$parts['user']    = $m[9];
			else			$parts['user']    = '';
		}
		if ( !empty($m[10]) )		$parts['pass']    = $m[11];

		if ( !empty($m[13]) )		$h=$parts['host'] = $m[13];
		else if ( !empty($m[14]) )	$parts['host']    = $m[14];
		else if ( !empty($m[16]) )	$parts['host']    = $m[16];
		else if ( !empty( $m[5] ) )	$parts['host']    = '';
		if ( !empty($m[17]) )		$parts['port']    = $m[18];

		if ( !empty($m[19]) )		$parts['path']    = $m[19];
		else if ( !empty($m[21]) )	$parts['path']    = $m[21];
		else if ( !empty($m[25]) )	$parts['path']    = $m[25];

		if ( !empty($m[27]) )		$parts['query']   = $m[28];
		if ( !empty($m[29]) )		$parts['fragment']= $m[30];

		if ( !$decode )
			return $parts;
		if ( !empty($parts['user']) )
			$parts['user']     = rawurldecode( $parts['user'] );
		if ( !empty($parts['pass']) )
			$parts['pass']     = rawurldecode( $parts['pass'] );
		if ( !empty($parts['path']) )
			$parts['path']     = rawurldecode( $parts['path'] );
		if ( isset($h) )
			$parts['host']     = rawurldecode( $parts['host'] );
		if ( !empty($parts['query']) )
			$parts['query']    = rawurldecode( $parts['query'] );
		if ( !empty($parts['fragment']) )
			$parts['fragment'] = rawurldecode( $parts['fragment'] );
		return $parts;
	}
	public static function url_to_absolute( $baseUrl, $relativeUrl )
	{
		// If relative URL has a scheme, clean path and return.
		$r = UrlToAbsolute::split_url( $relativeUrl );
		if ( $r === FALSE )
			return FALSE;
		if ( !empty( $r['scheme'] ) )
		{
			if ( !empty( $r['path'] ) && $r['path'][0] == '/' )
				$r['path'] = UrlToAbsolute::url_remove_dot_segments( $r['path'] );
			return UrlToAbsolute::join_url( $r );
		}

		// Make sure the base URL is absolute.
		$b = UrlToAbsolute::split_url( $baseUrl );
		if ( $b === FALSE || empty( $b['scheme'] ) || empty( $b['host'] ) )
			return FALSE;
		$r['scheme'] = $b['scheme'];

		// If relative URL has an authority, clean path and return.
		if ( isset( $r['host'] ) )
		{
			if ( !empty( $r['path'] ) )
				$r['path'] = UrlToAbsolute::url_remove_dot_segments( $r['path'] );
			return UrlToAbsolute::join_url( $r );
		}
		unset( $r['port'] );
		unset( $r['user'] );
		unset( $r['pass'] );

		// Copy base authority.
		$r['host'] = $b['host'];
		if ( isset( $b['port'] ) ) $r['port'] = $b['port'];
		if ( isset( $b['user'] ) ) $r['user'] = $b['user'];
		if ( isset( $b['pass'] ) ) $r['pass'] = $b['pass'];

		// If relative URL has no path, use base path
		if ( empty( $r['path'] ) )
		{
			if ( !empty( $b['path'] ) )
				$r['path'] = $b['path'];
			if ( !isset( $r['query'] ) && isset( $b['query'] ) )
				$r['query'] = $b['query'];
			return UrlToAbsolute::join_url( $r );
		}

		// If relative URL path doesn't start with /, merge with base path
		if ( $r['path'][0] != '/' )
		{
			$base = mb_strrchr( $b['path'], '/', TRUE, 'UTF-8' );
			if ( $base === FALSE ) $base = '';
			$r['path'] = $base . '/' . $r['path'];
		}
		$r['path'] = UrlToAbsolute::url_remove_dot_segments( $r['path'] );
		// print_r($r);
		// exit;
		return UrlToAbsolute::join_url( $r );
	}

	public static function url_remove_dot_segments( $path )
	{
		// multi-byte character explode
		$inSegs  = preg_split( '!/!u', $path );
		$outSegs = array( );
		foreach ( $inSegs as $seg )
		{
			if ( $seg == '' || $seg == '.')
				continue;
			if ( $seg == '..' )
				array_pop( $outSegs );
			else
				array_push( $outSegs, $seg );
		}
		$outPath = implode( '/', $outSegs );
		if ( $path[0] == '/' )
			$outPath = '/' . $outPath;
		// compare last multi-byte character against '/'
		if ( $outPath != '/' &&
			(mb_strlen($path)-1) == mb_strrpos( $path, '/', 'UTF-8' ) )
			$outPath .= '/';
		return $outPath;
	}

	public static function file_get_contents_curl($url)
	{
	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

	    $data = curl_exec($ch);
	    curl_close($ch);

	    return $data;
	}
	public static function multiexplode ($delimiters,$string) {
    
	    $ready = str_replace($delimiters, $delimiters[0], $string);
	    $launch = explode($delimiters[0], $ready);
	    return  $launch;
	}

	public static function grab($urlnya)
	{
		$html = UrlToAbsolute::file_get_contents_curl($urlnya);

		//parsing begins here:
		$doc = new DOMDocument();
		@$doc->loadHTML($html);
		$nodes = $doc->getElementsByTagName('title');

		//get and display what you need:
		$title = $nodes->item(0)->nodeValue;

		$metas = $doc->getElementsByTagName('meta');

		for ($i = 0; $i < $metas->length; $i++)
		{
		    $meta = $metas->item($i);
		    if($meta->getAttribute('name') == 'description')
		        $description = $meta->getAttribute('content');
		    if($meta->getAttribute('name') == 'keywords')
		        $keywords = $meta->getAttribute('content');
		}

		$contents = $doc->getElementsByTagName('p');
		$dataNow = array();
		for ($i = 0; $i < $contents->length; $i++)
		{
		    $content = $contents->item($i);
		    if (strlen($content->nodeValue) > 250){
		        // $newtext = wordwrap($content->nodeValue, 40, "|");
		        // $dataku = explode(',', $content->nodeValue);
		        // $dataku = preg_split( "/ (\?|\,|].) /", $content->nodeValue );
		        $dataku = UrlToAbsolute::multiexplode(array(",",".","|",":","?"),$content->nodeValue);
		        // $dataku = explode('|', $newtext);
		        $dataNow = array_merge($dataNow, $dataku);
		    }
		    // echo($content->nodeValue);
		    // if($content->getAttribute('name') == 'description')
		    //     $description = $content->getAttribute('content');
		}
		$konten = '';
		$jml = count($dataNow) - 1;
		for ($i=1; $i < 15 ; $i++) { 
		    $konten[] = $dataNow[rand(0, $jml)];
		}
		$konten = implode('. ', $konten);

		// get image
		$img = $doc->getElementsByTagName('img');
		$imageArray = array();
		for ($i = 0; $i < $img->length; $i++)
		{
		    // print_r();
		    // echo($urlnya);
		    $imageArray[] = UrlToAbsolute::url_to_absolute(urldecode($urlnya), $img->item($i)->getAttribute('src'));
		    // $imageArray[] = $img->item($i)->getAttribute('src');

		}

		// echo "Title: $title". '<br/><br/>';
		// echo "Description: $description". '<br/><br/>';
		// echo "Keywords: $keywords <br/><br/>";
		// echo "content : $konten";
		return array(
			'title'=>$title,
			'desc'=>$description,
			'key'=>$keywords,
			'konten'=>$konten,
			'image'=>$imageArray,
		);
	}
}
