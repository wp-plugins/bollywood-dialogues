<?php
/**
 * @package Bollywood_Dialogues
 * @version 0.1
 */
/*
Plugin Name: Bollywood Dialogues
Plugin URI: http://wordpress.org/plugins/bollywood-dialogues/
Description: This is a plugin for the Bollywood lovers.
Author: Chetan Vengurlekar
Version: 0.1
Author URI: http://www.sarvisolutions.com/author/chetan
*/

function bollywood_dialogues() {
	/** These are the dialogues from the famous Bollywood Movies */
	$dialogues = "Aaj mere paas gaadi hai, bungla hai, paisa hai... tumhare paas kya hai?
Kitne aadmi thhe?
Kutte, kameene, main tera khoon pee jaoonga
Jinke ghar sheeshe ke hote hain, woh batti bujha ke kapde badalte hain
Rishte mein to hum tumhare baap lagte hain, naam hai Shahenshah
Kaun kambakht bardaasht karne ko peeta hai?
Anarkali, Salim ki mohabbat tumhe marne nahin degi aur hum tumhe jeene nahin denge
Hum angrezon ke zamaane ke jailor hain
I can talk English, I can walk English, I can run English... because English is a very phunny language
Main aaj bhi pheke hue paise nahin uthata
Pushpa, I hate tears!
Jali ko aag kehte hain, bhuji ko raakh kehte hain, jis raakh se barood bane usey Vishwanath kehte hain
Hum sab rangmanch ki kathputliyan hain jinki dor uparwale ki ungliyon se bandhi hui hai. Kab kaun uthega koi nahin bata sakta
Bade bade shehron mein aisi chhoti chhoti baatein hoti rehti hain
Mogambo khush hua
Uska to na bad luck hi kharab hai
Taareekh pe taareekh milti rahi hai lekin insaaf nahin milta. Milte hai to sirf taareekh
Saara sheher mujhe Loin ke naamse jaanta hai
Zindagi mein teen cheezon ke peechey kabhi nahin bhagna chahiye-bus, train aur chhokri
Dosti ka ek usool hai, madam: no sorry, no thank you
Kabhi kabhi kuch jeetne ke liye kuch harna bhi padta hai, aur haar kar jeetnay wale ko baazigar kehte hain
Agar tere sar par bomb laga doon toh pehle kaun phatega, tu ya tera sar?
Tension lene ka nahin, sirf dene ka
Sattar minute, sattar minute hai tumhare paas
Hum tum mein itne ched karenge ... ki confuse ho jaoge ki saans kahan se le ... aur paadein kahan se
Thappad se darr nahi lagta sahab ... pyar se lagta hai
Hum yahan ke Robinhood hai ... Robinhood Pandey
Hamara naam hamari personality ko shoba deta hai ... Chulbul Pandey
Haramzaade se yaad aaya Chaube ji ... aapke aadarniye pitashri kaise hai?
Kamini se yaad aaya ... Tiwari ji bhabhi ji kaisi hai?
Bhaiya ji smile
Swagat nahi karoge aap hamara?
Gulab jamun se yaad aaya ... Tiwari ji aapke hernia ka operation hone waala tha?
Utna hi maaro ... jitna ki khud bardaash kar sako
Aad chahe jitna bada ho jaye ... laad ke neeche hi rehta hai
Itna goli maarte ... ki aapka driver bhi khali khoka bech bechkar rayees ban jaata
Keh ke lenge uski
Yahan kabootar bhi ek pankh se udhta hai ... aur doosre se apna izzat bachata hai
Khana khao, taqat aayega ... bahar jaake beizzati mat karana
Zara soongh ke batao Mantriji nashta mein ka khaye hai
Bade log apna naam bhool jaate the ... lekin apni zameen apna samaan nahi
Tumko yaad kar karke haath dukh gaya hamara
Hindustan mein jab tak cinema hai ... log chutiye bante rahenge
Beta tumse nah ho payega
Tum oxygen aur main double hydrogen ... hamari chemistry ekdum pani ki tarah hai
Main apni favorite hoon
Jab koi pyar mein hota hai ... toh koi sahi galat nahin hota
Tu original piece hai
Ab toh mera haath chhod do ... itni bhi sundar nahin hoon main
Tum hamesha aaise hi bakwaas karti ho ya aaj koi special occasion hai?
Tumhe uthakar museum mein rakhna chahiye ... ticket lagni chahiye tumhe dekhne ke liye
Bachpan se hi naa ... mujhe shaadi karne ka bahut craze hai, by god
Sikhni hoon main ... Bhatinda ki!
Aaj tak life mein ek train nahin chuti meri
Akeli ladki khuli hui tijori ke jaisi hoti hai
Hum jaha khade ho jaate hai line wahin se shuru hoti hai
Kabhi kabhi aisa kyun hota hai ... ki apne paraye ho jaate hain
Kabhi kabhi aisa kyun hota hai ... ki paraye bhi apne lagne lagte hain
Ek da vada dil aur duje de vade vade bill
Vade log vadi vadi baatein
Keh diya na ... bas keh diya!
Badhon ka gussa badhon ka pyar hota hai
Oh ji jhappiyan tak te theek hai ... par pappiyan bhi marte rhende hai mainu";

	// Here we split it into lines
	$dialogues = explode( "\n", $dialogues );

	// And then randomly choose a line
	return wptexturize( $dialogues[ mt_rand( 0, count( $dialogues ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function bolly_dialogues() {
	$chosen = bollywood_dialogues();
	echo "<p id='bd'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'bolly_dialogues' );

// We need some CSS to position the paragraph
function chetan_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#chetan {
		float: $x;
		padding-$x: 5px;
		padding-top: 3px;		
		margin: 0;
		font-size: 9px;
	}
	</style>
	";
}

add_action( 'admin_head', 'chetan_css' );

?>
