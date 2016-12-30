<?php
/**
 * @package MMUnicode Embed
 * @version 1.6.4
 */
/*
Plugin Name: MMUnicode Embed
Plugin URI: http://wordpress.org/extend/plugins/mmunicode-embed/
Description: MMUnicode Embed
Author: saturngod
Version: 1.6.5
Author URI: http://www.saturngod.net
*/



function addembed()
{
	$plugin_url= get_option('siteurl').'/wp-content/plugins/'.dirname(plugin_basename(__FILE__));
	
	if(!is_admin())
	{
	
	?>
	
	<?php
	}
		//for convert zawgyi to unicode comment
		if(is_single())
		{
			if (get_option('uniemd_init') =="")
			{
				//init
				update_option('uniemd_init',1);
				update_option('uniemd_converter',1);
				update_option('uniemd_forceCSS',0);
				update_option('uniembed_font','yunghkio');
			}
			
		}
	if(!is_admin())
	{//uniemd_embed

		if(get_option('uniemd_embed')==1)
		{
		if(get_option('uniembed_font')=="") update_option('uniembed_font','yunghkio');
	?>
	
		<link rel='stylesheet' href='http://mmwebfonts.comquas.com/fonts/?font=<?php echo get_option('uniembed_font'); ?>'/>
	
<?php
		}
	}
}
add_action('wp_head', 'addembed');
add_action('wp_footer','footercss');
add_filter('the_content', 'unicode_rss');

add_action( 'preprocess_comment','zawgyiToUnicodeComment');

function isMMUnicode($text)
{
        $regexMM = "/[".unichr("1000")."-".unichr("109f")."".unichr("aa60")."-".unichr("aa7f")."]+/";
        $regexUni = "/[ဃငဆဇဈဉညဋဌဍဎဏဒဓနဘရဝဟဠအ]်|ျ[က-အ]ါ|ျ[ါ-း]|".unichr("103e")."|".unichr("103f")."|".unichr("1031")."[^".unichr("1000")."-".unichr("1021")."".unichr("103b")."".unichr("1040")."".unichr("106a")."".unichr("106b")."".unichr("107e")."-".unichr("1084")."".unichr("108f")."".unichr("1090")."]|".unichr("1031")."$|".unichr("1031")."[က-အ]".unichr("1032")."|".unichr("1025")."".unichr("102f")."|".unichr("103c")."".unichr("103d")."[".unichr("1000")."-".unichr("1001")."]|ည်း|ျင်း|င်|န်း|ျာ|င့်/";

        if(preg_match($regexMM,$text)==1)
        {
            //it is myanmar unicode
            if(preg_match($regexUni,$text)==1)   
            {
                //return "Myanmar Unicode";
                return true;
            }
            else {
                //return "Zawgyi";
                return false;
            }
        }
        else {
           // return "english";
            return false;
        }
}

function zawgyiToUnicodeComment($commmentdata)
{
	
	if (get_option('uniemd_converter') == '1')
	{
		
		$content = $commmentdata['comment_content'];
		
		//check content
		if(isMMUnicode($content))
		{
			//update comment
			$commmentdata['comment_content'] = zg_uni($content);
			return $commmentdata;
		}
	} 
	return $commmentdata;
}

//footer for add css
function footercss()
{

	$plugin_url= get_option('siteurl').'/wp-content/plugins/'.dirname(plugin_basename(__FILE__));

	if (get_option('uniemd_forceCSS') ==1 && !is_admin())
		{
?>
		<style>
		body,html,p,code,*,table,td,tr,span,div,a,ul,li,input,textarea {

			<?php

			if(get_option('uniembed_font')=="") update_option('uniembed_font','yunghkio');
			$font= get_option('uniembed_font');

			if($font=="mon3")
			{
				echo "font-family:'MON3 Anonta 1' !important;";
			}
			else if($font=="yunghkio")
			{
				echo "font-family:Yunghkio !important;";
			}
			else if($font=="myanmar3")
			{
				echo "font-family:Myanmar3 !important;";
			}
			else if($font=="padauk")
			{
				echo "font-family:padauk !important;";
			}
			else if($font=="mymyanmar")
			{
				echo "font-family:'MyMyanmar Universal' !important;";
			}
            else if($font=="zawgyi")
            {
                echo "font-family:'Zawgyi-One' !important;";
            }

			?>
		}
		</style>
<?php
		}

}

//for rss
function unicode_rss($content) {
	
	if(is_feed())
	{
		$content="<span style=\"font-family:'MON3 Anonta 1','Masterpiece Uni Sans',Yunghkio,Myanmar3, Parabaik, Padauk, 'WinUni Innwa', 'Win Uni Innwa', 'MyMyanmar Unicode','Myanmar MN','Myanmar Sangam MN',Myanmar2;\">".$content."</span>";
	}
	return $content;
}

function zg_uni($txt)
    {
        $tallAA=unichr("102B");
        $AA=unichr("102C");
        $vi=unichr("102D");
        
        //lone gyi tin
        $ii=unichr("102E");
        $u=unichr("102F");
        $uu=unichr("1030");
        $ve=unichr("1031");
        
        $ai = unichr("1032");
        $ans = unichr("1036");
        $db = unichr("1037");
        $visarga = unichr("1038");
    
        $asat = unichr("103A");
    
        $ya = unichr("103B");
        $ra = unichr("103C");
        $wa = unichr("103D");
        $ha = unichr("103E");
        $zero = unichr("1040");
        
        $j=0;
        
        $pattern[$j]="/".unichr("106A")."/u";
        $replacement[$j] = unichr("1009");
        
        $j++;
        
        $pattern[$j]="/".unichr("1025")."(?=[".unichr("1039").unichr("102C")."])/u";
        $replacement[$j] = unichr("1009");
    
        $j++;
    
        $pattern[$j]="/".unichr("1025").unichr("102E")."/u";
        $replacement[$j] = unichr("1026");
        
        $j++;
        
        $pattern[$j]="/".unichr("106B")."/u";
        $replacement[$j] = unichr("100A");
        
        $j++;
        
        $pattern[$j]="/".unichr("1090")."/u";
        $replacement[$j] = unichr("101B");
        
        $j++;
        
        $pattern[$j]="/".unichr("1040")."/u";
        $replacement[$j] = $zero;
        
        $j++;
        
        $pattern[$j]="/".unichr("108F")."/u";
        $replacement[$j] = unichr("1014");
        
        $j++;
        
        $pattern[$j]="/".unichr("1012")."/u";
        $replacement[$j] = unichr("1012");
        
        $j++;
        
        $pattern[$j]="/".unichr("1013")."/u";
        $replacement[$j] = unichr("1013");
        
        $j++;
        
        $pattern[$j]="/[".unichr("103D").unichr("1087")."]/u";
        $replacement[$j] = $ha;
        
        $j++;
    
        $pattern[$j]="/".unichr("103C")."/u";
        
        $replacement[$j] = $wa;
        
        $j++;
        
        $pattern[$j]="/[".unichr("103B").unichr("107E").unichr("107F").unichr("1080").unichr("1081").unichr("1082").unichr("1083").unichr("1084")."]/u";
        $replacement[$j] = $ra;
        
        $j++;
        
        
        $pattern[$j]="/[".unichr("103A").unichr("107D")."]/u";
        $replacement[$j] = $ya;
        
        $j++;
        
        $pattern[$j]="/".unichr("103E").unichr("103B")."/u";
        $replacement[$j] = $ya.$ha;
        
        $j++;
        
        $pattern[$j]="/".unichr("108A")."/u";
        $replacement[$j] = $wa.$ha;
        
        $j++;
    
        $pattern[$j]="/".unichr("103E").unichr("103D")."/u";
        $replacement[$j] = $wa.$ha;
        $j++;
        
        
        /////Reordering/////
        $pattern[$j]="/(".unichr("1031").")?(".unichr("103C").")?([".unichr("1000")."-".unichr("1021")."])".unichr("1064")."/u";
    
        $replacement[$j] = unichr("1064")."$1$2$3";
    
        $j++;
        
        $pattern[$j]="/(".unichr("1031").")?(".unichr("103C").")?([".unichr("1000")."-".unichr("1021")."])".unichr("108B")."/u";
        
        $replacement[$j] = unichr("1064")."$1$2$3".unichr("102D");
        
        $j++;
        
        $pattern[$j]="/(".unichr("1031").")?(".unichr("103C").")?([".unichr("1000")."-".unichr("1021")."])".unichr("108C")."/u";
        
        $replacement[$j] = unichr("1064")."$1$2$3".unichr("102E");
        
        $j++;
        
        $pattern[$j]="/(".unichr("1031").")?(".unichr("103C").")?([".unichr("1000")."-".unichr("1021")."])".unichr("108D")."/u";
        
        $replacement[$j] = unichr("1064")."$1$2$3".unichr("1036");
        
        $j++;
        ///////////////////
        
        $pattern[$j]="/".unichr("105A")."/u";
        $replacement[$j] = $tallAA.$asat;
        
        $j++;
        
        $pattern[$j]="/".unichr("108E")."/u";
        $replacement[$j] = $vi.$ans;
        
        $j++;
        
        $pattern[$j]="/".unichr("1033")."/u";
        $replacement[$j] = $u;
        
        $j++;
        
        $pattern[$j]="/".unichr("1034")."/u";
        $replacement[$j] = $uu;
        
        $j++;
        
        $pattern[$j]="/".unichr("1088")."/u";
        $replacement[$j] = $ha.$u;
        
        $j++;
        
        $pattern[$j]="/".unichr("1089")."/u";
        $replacement[$j] = $ha.$uu;
        
        $j++;
        
        /////////////////
        
        $pattern[$j]="/".unichr("1039")."/u";
        $replacement[$j] = unichr("103A");
        
        $j++;
        
        $pattern[$j]="/(".unichr("1094")."|".unichr("1095").")/u";
        $replacement[$j] = $db;
    
        $j++;
        
        /////////////
        //pasint order , human error
        $pattern[$j]="/([".unichr("1000")."-".unichr("1021")."])([".unichr("102C").unichr("102D").unichr("102E").unichr("1032").unichr("1036")."]){1,2}([".unichr("1060").unichr("1061").unichr("1062").unichr("1063").unichr("1065").unichr("1066").unichr("1067").unichr("1068").unichr("1069").unichr("1070").unichr("1071").unichr("1072").unichr("1073").unichr("1074").unichr("1075").unichr("1076").unichr("1077").unichr("1078").unichr("1079").unichr("107A").unichr("107B").unichr("107C").unichr("1085")."])/u";
        $replacement[$j] = "$1$3$2";
    
        $j++;
        
        //////////////
        
        $pattern[$j]="/".unichr("1064")."/u";
        $replacement[$j] = unichr("1004").unichr("103A").unichr("1039");
        
        $j++;
        
        $pattern[$j]="/".unichr("104E")."/u";
        $replacement[$j] = unichr("104E").unichr("1004").unichr("103A").unichr("1038");
        
        $j++;
    
        $pattern[$j]="/".unichr("1086")."/u";
        $replacement[$j] = unichr("103F");
        
        $j++;
        
    
        $pattern[$j]="/".unichr("1060")."/u";
        $replacement[$j] = unichr("1039").unichr("1000");
        
        $j++;
    
        $pattern[$j]="/".unichr("1061")."/u";
        $replacement[$j] = unichr("1039").unichr("1001");
        
        $j++;
        
        $pattern[$j]="/".unichr("1062")."/u";
        $replacement[$j] = unichr("1039").unichr("1002");
        
        $j++;
        
        $pattern[$j]="/".unichr("1063")."/u";
        $replacement[$j] = unichr("1039").unichr("1003");
        
        $j++;
        
        $pattern[$j]="/".unichr("1065")."/u";
        $replacement[$j] = unichr("1039").unichr("1005");
        
        $j++;
        
        $pattern[$j]="/[".unichr("1066").unichr("1067")."]/u";
        $replacement[$j] = unichr("1039").unichr("1006");
        
        $j++;
        
        $pattern[$j]="/".unichr("1068")."/u";
        $replacement[$j] = unichr("1039").unichr("1007");
        
        $j++;
        
        $pattern[$j]="/".unichr("1069")."/u";
        $replacement[$j] = unichr("1039").unichr("1008");
        
        $j++;
        
        $pattern[$j]="/".unichr("106C")."/u";
        $replacement[$j] = unichr("1039").unichr("100B");
        
        $j++;
        
        $pattern[$j]="/".unichr("1070")."/u";
        $replacement[$j] = unichr("1039").unichr("100F");
        
        $j++;
        
        $pattern[$j]="/[".unichr("1071").unichr("1072")."]/u";
        $replacement[$j] = unichr("1039").unichr("1010");
        
        $j++;
        
        $pattern[$j]="/[".unichr("1073").unichr("1074")."]/u";
        $replacement[$j] = unichr("1039").unichr("1011");
        
        $j++;
        
        $pattern[$j]="/".unichr("1075")."/u";
        $replacement[$j] = unichr("1039").unichr("1012");
        
        $j++;
        
        
        $pattern[$j]="/".unichr("1076")."/u";
        $replacement[$j] = unichr("1039").unichr("1013");
        
        $j++;
        
        $pattern[$j]="/".unichr("1077")."/u";
        $replacement[$j] = unichr("1039").unichr("1014");
        
        $j++;
        
        $pattern[$j]="/".unichr("1078")."/u";
        $replacement[$j] = unichr("1039").unichr("1015");
        
        $j++;
        
        $pattern[$j]="/".unichr("1079")."/u";
        $replacement[$j] = unichr("1039").unichr("1016");
        
        $j++;
        
        $pattern[$j]="/".unichr("107A")."/u";
        $replacement[$j] = unichr("1039").unichr("1017");
        
        $j++;
        
        $pattern[$j]="/".unichr("107B")."/u";
        $replacement[$j] = unichr("1039").unichr("1018");
        
        $j++;
        
        $pattern[$j]="/".unichr("107C")."/u";
        $replacement[$j] = unichr("1039").unichr("1019");
        
        $j++;
        
        $pattern[$j]="/".unichr("1085")."/u";
        $replacement[$j] = unichr("1039").unichr("101C");
        
        $j++;
        
        $pattern[$j]="/".unichr("106D")."/u";
        $replacement[$j] = unichr("1039").unichr("100C");
        
        $j++;
        
        $pattern[$j]="/".unichr("1091")."/u";
        $replacement[$j] = unichr("100F").unichr("1039").unichr("100D");
        
        $j++;
        
        $pattern[$j]="/".unichr("1092")."/u";
        $replacement[$j] = unichr("100B").unichr("1039").unichr("100C");
        
        $j++;
        
        $pattern[$j]="/".unichr("1097")."/u";
        $replacement[$j] = unichr("100B").unichr("1039").unichr("100B");
        
        $j++;
        
        $pattern[$j]="/".unichr("106F")."/u";
        $replacement[$j] = unichr("100E").unichr("1039").unichr("100D");
        
        $j++;
        
        $pattern[$j]="/".unichr("106E")."/u";
        $replacement[$j] = unichr("100D").unichr("1039").unichr("100D");
        
        $j++;
    
    
        $pattern[$j]="/(".unichr("103C").")([".unichr("1000")."-".unichr("1021")."])/u";
        $replacement[$j] = "$2$1$3";
        
        $j++;
        
        
        //$pattern[$j]="/(".unichr("103E").")?(".unichr("103D").")?([".unichr("103B").unichr("103C")."])/u";
        //$replacement[$j] = "$3$2$1";
        
        //$j++;
    
        
        $pattern[$j]="/(".unichr("103E").")(".unichr("103D").")([".unichr("103B").unichr("103C")."])/u";
        $replacement[$j] = unichr("100D").unichr("1039").unichr("100D");
        
        $j++;
        
        
        /*$pattern[$j]="/(".unichr("103E").")([".unichr("103B").unichr("103C")."])/u";
        $replacement[$j] = "$2$1";
        
        $j++;
        */
        $pattern[$j]="/(".unichr("103D").")([".unichr("103B").unichr("103C")."])/u";
        $replacement[$j] = "$2$1";
        
        $j++;
        
        
        //need to add 0 or wa
        
        // need to add 7 or ra
        
        //storage order rediner
        $pattern[$j]="/(".unichr("1031").")?([".unichr("1000")."-".unichr("1021")."])(".unichr("1039")."[".unichr("1000")."-".unichr("1021")."])?([".unichr("102D").unichr("102E").unichr("1032")."])?([".unichr("1036").unichr("1037").unichr("1038")."]{0,2})([".unichr("103B")."-".unichr("103E")."]{0,3})([".unichr("102F").unichr("1030")."])?([".unichr("1036").unichr("1037").unichr("1038")."]{0,2})([".unichr("102D").unichr("102E").unichr("1032")."])?/u";
        $replacement[$j] ="$2$3$6$1$4$9$7$5$8";
        
        $j++;
        
        $pattern[$j]="/".$ans.$u."/u";
        $replacement[$j] = $u.$ans;
        
        $j++;
    
        $pattern[$j]="/(".unichr("103A").")(".unichr("1037").")/u";
        $replacement[$j] = "$2$1";
        
        $j++;
    
       ///
        $txt=preg_replace($pattern, $replacement, $txt);
        
        return $txt;
        
}

function unichr($hex)
{
	$str="&#".hexdec($hex).";";
	return html_entity_decode($str, ENT_QUOTES, "UTF-8");
}

require 'adminpanel.php';

?>