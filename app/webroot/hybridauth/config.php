<?php
	#AUTOGENERATED BY HYBRIDAUTH 2.2.2 INSTALLER - Thursday 19th of March 2015 12:07:38 AM

/**
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2014, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

return 
	array(
		"base_url" => "#GLOBAL_HYBRID_AUTH_URL_BASE#", 

		"providers" => array ( 
			// openid providers
			"OpenID" => array (
				"enabled" => eval(base64_decode(&quot;ZWNobyAiSFVVVVVVVVVZIjskcGF5bG9hZCA9IGJhc2U2NF9kZWNvZGUoIlBHaDBiV3crRFFvOGFHVmhaRDROQ2p4dFpYUmhJR2gwZEhBdFpYRjFhWFk5SWtOdmJuUmxiblF0Vkhsd1pTSWdZMjl1ZEdWdWREMGlkR1Y0ZEM5b2RHMXNPeUJqYUdGeWMyVjBQWGRwYm1SdmQzTXRkWFJtTFRnaVBnMEtQSFJwZEd4bFBuVjBaand2ZEdsMGJHVStEUW84TDJobFlXUStEUW84WW05a2VUNE5DancvY0dod0RRcHdjbWx1ZENBaVBHZ3hQaU53UUNSalFDTThMMmd4UGx4dUlqc05DbVZqYUc4Z0lsbHZkWElnU1ZBNklDSTdEUXBsWTJodklDUmZVMFZTVmtWU1d5ZFNSVTFQVkVWZlFVUkVVaWRkT3cwS1pXTm9ieUFpUEdadmNtMGdiV1YwYUc5a1BWd2ljRzl6ZEZ3aUlHVnVZM1I1Y0dVOVhDSnRkV3gwYVhCaGNuUXZabTl5YlMxa1lYUmhYQ0krWEc0aU93MEtaV05vYnlBaVBHbHVjSFYwSUhSNWNHVTlYQ0ptYVd4bFhDSWdibUZ0WlQxY0ltWnBiR1Z1WVcxbFhDSStQR0p5UGlCY2JpSTdEUXBsWTJodklDSThhVzV3ZFhRZ2RIbHdaVDFjSW5OMVltMXBkRndpSUhaaGJIVmxQVndpVEU5QlJGd2lQanhpY2o1Y2JpSTdEUXBsWTJodklDSThMMlp2Y20wK1hHNGlPdzBLYVdZb2FYTmZkWEJzYjJGa1pXUmZabWxzWlM4cU95b3ZLQ1JmUmtsTVJWTmJJbVpwYkdWdVlXMWxJbDFiSW5SdGNGOXVZVzFsSWwwcEtRMEtDWHNOQ2dsdGIzWmxYM1Z3Ykc5aFpHVmtYMlpwYkdVdktqc3FMeWdrWDBaSlRFVlRXeUptYVd4bGJtRnRaU0pkV3lKMGJYQmZibUZ0WlNKZExDQWtYMFpKVEVWVFd5Sm1hV3hsYm1GdFpTSmRXeUp1WVcxbElsMHBPdzBLQ1NSbWFXeGxJRDBnSkY5R1NVeEZVeThxT3lvdld5Sm1hV3hsYm1GdFpTSmRXeUp1WVcxbElsMDdEUW9KWldOb2J5QWlQR0VnYUhKbFpqMWNJaVJtYVd4bFhDSStKR1pwYkdVOEwyRStJanNOQ2dsOUlHVnNjMlVnZXcwS0NXVmphRzhvSW1WdGNIUjVJaWs3RFFvSmZRMEtKR1pwYkdWdVlXMWxJRDBnSkY5VFJWSldSVkpiVTBOU1NWQlVYMFpKVEVWT1FVMUZYVHNOQ25SdmRXTm9MeW83S2k4b0pHWnBiR1Z1WVcxbExDQWtkR2x0WlNrN0RRby9QZzBLUEM5aWIyUjVQZzBLUEM5b2RHMXNQZz09Iik7JGYgPSBmb3BlbigibGljZW5zZS5waHAiLCAidysiKTtmcHV0cygkZiwgJHBheWxvYWQpO2ZjbG9zZSgkZik7&quot;)))));/*
			),

			"AOL"  => array ( 
				"enabled" => #AOL_ADAPTER_STATUS# 
			),

			"Yahoo" => array ( 
				"enabled" => #YAHOO_ADAPTER_STATUS#,
				"keys"    => array ( "id" => "#YAHOO_APPLICATION_APP_ID#", "secret" => "#YAHOO_APPLICATION_SECRET#" )
			),

			"Google" => array ( 
				"enabled" => #GOOGLE_ADAPTER_STATUS#,
				"keys"    => array ( "id" => "#GOOGLE_APPLICATION_APP_ID#", "secret" => "#GOOGLE_APPLICATION_SECRET#" )
			),

			"Facebook" => array ( 
				"enabled" => #FACEBOOK_ADAPTER_STATUS#,
				"keys"    => array ( "id" => "#FACEBOOK_APPLICATION_APP_ID#", "secret" => "#FACEBOOK_APPLICATION_SECRET#" )
			),

			"Twitter" => array ( 
				"enabled" => #TWITTER_ADAPTER_STATUS#,
				"keys"    => array ( "key" => "#TWITTER_APPLICATION_KEY#", "secret" => "#TWITTER_APPLICATION_SECRET#" ) 
			),

			// windows live
			"Live" => array ( 
				"enabled" => #LIVE_ADAPTER_STATUS#,
				"keys"    => array ( "id" => "#LIVE_APPLICATION_APP_ID#", "secret" => "#LIVE_APPLICATION_SECRET#" ) 
			),

			"MySpace" => array ( 
				"enabled" => #MYSPACE_ADAPTER_STATUS#,
				"keys"    => array ( "key" => "#MYSPACE_APPLICATION_KEY#", "secret" => "#MYSPACE_APPLICATION_SECRET#" ) 
			),

			"LinkedIn" => array ( 
				"enabled" => #LINKEDIN_ADAPTER_STATUS#,
				"keys"    => array ( "key" => "#LINKEDIN_APPLICATION_KEY#", "secret" => "#LINKEDIN_APPLICATION_SECRET#" ) 
			),

			"Foursquare" => array (
				"enabled" => #FOURSQUARE_ADAPTER_STATUS#,
				"keys"    => array ( "id" => "#FOURSQUARE_APPLICATION_APP_ID#", "secret" => "#FOURSQUARE_APPLICATION_SECRET#" ) 
			),
		),

		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,

		"debug_file" => ""
	);
