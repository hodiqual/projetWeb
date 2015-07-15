<?php
/** 
 * Classe pour rajouter une personne sur le CV
 */
class Createur
{
	public $_nom;
	public $_surnom;
	public $_description;
	
	/**url de l'avatar*/
	public $_avatar;
	
	/**lien vers les profils socials (facebook, twitter, google-plus ...)  */
	public $_profil;
	
	private function __construct($n,$s,$d,$a,$p)
	{
		$this->_nom = $n;
		$this->_surnom = $s;
		$this->_description = $d;
		$this->_avatar = $a;
		$this->_profil = $p;
	}
	
	public static function getCreateurArray()
	{
		$urlProfilRaimana = array("facebook" => "https://www.facebook.com/profile.php?id=1103275985&fref=ts",
				    	  "google-plus"  => "https://plus.google.com/117453690081664322208" );
		$raimana = new Createur('Raimana Thomas', 
					'Ours Basque', 
					'Notre Tahitien surfeur, zen. Même au travail il a la tête dans les vagues. Sa devise: "Pourquoi remettre à deux mains ce qu on peut faire à trois mains?". Attention il se cache derrière son côté zen, son côté animal: ne passez jamais derrière lui aux WC, l&rsquo;ours basque condamne tout ce qu&rsquo;il souille.',
				    '_include/img/profile/raimana_profil.jpg',
					$urlProfilRaimana
				    );
		
		$profilAlexis = array("facebook" => "https://www.facebook.com/alexis.hodiquet",
				"google-plus"  => "https://plus.google.com/109416368659512905343",
				"twitter"  => "https://twitter.com/AlexisHodiquet"
		);
		$alexis = new Createur('Alexis Hodiquet',
				'Van Calbutte',
				'Le meilleur d&rsquo;entre nous au surf&hellip; sur la plage. Il a tout le matos, il sait parler du surf et de la houle mieux que personne, mais il a encore du mal à se lever sur la planche. Espérons qu&rsquo;un jour son niveau soit aussi bon que son niveau théorique !',
				'_include/img/profile/alexis_profil.jpg',
				$profilAlexis
		);
		
		$profilBrice = array("facebook" => "https://www.facebook.com/pages/Brice-de-Nice/41345150229?fref=ts",
		);
		$brice = new Createur('Brice de Nice',
				'CASSERRRRR',
				'K Ka Ka Kasssséééé !! Aujourd\'hui pour être fun & bigarré, frais et bien formé, il te faut savoir casser!! K Ka Ka Kasssséééé !! Une seule technique, celle de Brice : jambe gauche fléchie, droite tendue comme si tu pissais dans un bocal, t\'allonges le bras, tu pars du Nord Ouest pour arriver au Sud Est, sans toucher la Corse ! Et tu casses, et tu casses !',
				'_include/img/profile/Brice_De_Nice.jpg',
				$profilBrice
		);
		
		$tab = array( $raimana, $alexis, $brice );
		
		return $tab;
	}
	
}
?>