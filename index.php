<?php
	session_start();
	if ( 		isset ( $_SESSION['LAST_ACTIVITY'] )
			&& (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
		$webadr = $_SERVER ['SCRIPT_URI'];
		header('Content-Type: text/html;charset=utf-8');
		header("Location: " . $webadr );
	}
	$_SESSION['LAST_ACTIVITY'] = time();

	if ( ! (isset ( $_SESSION ) ) ) {
		$webadr = $_SERVER ['SCRIPT_URI'];
		header('Content-Type: text/html;charset=utf-8');
		header("Location: " . $webadr );
	}
	ob_start();
	mb_internal_encoding("UTF-8");
	setlocale (LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge', 'German');
	setlocale (LC_TIME, "de_DE");
	error_reporting(E_ALL);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
	<title>FSV Bruck e.V. Umfrage zur Neuausrichtung des Vereins</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="content-script-language" content="text/javascript" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" type="text/css" media="screen" href="./FSV_Bruck.css" />
	<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
	<style type="text/css">
		span { 	text-align:center;
      			padding: 24px;
      }

      h4 {
			text-decoration: underline;
			font-style: italic;
		}
		p { margin-top: -7px; }
   </style>
	<script language="JavaScript" type="text/javascript">

// 		var elem = document.getElementById('uebungsleiter');
//			elem.addEventListener('click', checkOptions);

		function fct_mitgliedschaft() {
			var m = document.frm_fsv_umfrage.mitglied.value;
			
// 			alert ("fct_mitgliedschaft: " + m);
// 				var v = document.frm_fsv_umfrage.fsv_abteilungen.selectedIndex;
// 				alert ("fct_mitgliedschaft: " + v);

			if ( 		( m == 'Kein Mitglied' ) 
					|| ( m == 'Mitglied'      ) ) {
				document.getElementById('austrittsgrund_id').value = "";
				document.getElementById('austrittsgrund_id').setAttribute('disabled', 'disabled');
			}

			if ( 		( m == 'Kein Mitglied' ) 
					|| ( m == 'Kein Mitglied mehr' ) ) {
				//
				// Auswahlliste deaktivieren (ausgrauen)
				document.getElementById('fsv_abteilungen_id').setAttribute('disabled', 'disabled');
				//
				// In Auswahlliste mit den FSV-Abteilungen evtl. getätigte Auswahl zurücksetzen
				document.frm_fsv_umfrage.fsv_abteilungen.selectedIndex = -1;
			}
			
			if ( m == 'Kein Mitglied mehr' ) {
				//
				// Eingabefeld aktivieren
				document.getElementById('austrittsgrund_id').removeAttribute('disabled');
			}
			
			if ( m == 'Mitglied' ) {
				//
				// Liste mit Abteilungen  aktivieren
				document.getElementById('fsv_abteilungen_id').removeAttribute('disabled');
			}
		}


		//****************************************************************************************************//


		function checkOptions() {
			var v = document.frm_fsv_umfrage.uebungsleiter_betreuer.value;

// 									alert (v);

			if ( v == 'keine Angebote betreuen' ) {
				
// 									alert (document.frm_fsv_umfrage.betreuung_meiner_kinder_waehrend_der_trainingszeit.checked);

// 				document.getElementById('uebungsleiter_ja_id').setAttribute('disabled', 'disabled');
// 									alert(document.frm_fsv_umfrage.bezahlte_uebungsleiter_trainerausbildung.checked);


				document.frm_fsv_umfrage.stundensatz.value = "";
				document.frm_fsv_umfrage.bezahlte_uebungsleiter_trainerausbildung.checked = false;
				document.frm_fsv_umfrage.regelmaessige_fortbildungsmoeglichkeiten.checked = false;
				document.frm_fsv_umfrage.bezahlte_uebungsleiterstunden.checked = false;
				document.frm_fsv_umfrage.kostenfreie_vereinsmitgliedschaft.checked = false;
				document.frm_fsv_umfrage.begleitete_einarbeitungszeit.checked = false;
				document.frm_fsv_umfrage.verlaessliche_vertretungsregelung.checked = false;
				document.frm_fsv_umfrage.betreuung_meiner_kinder_waehrend_der_trainingszeit.checked = false;
				document.getElementById('weitere_voraussetzungen_fuer_uebungsleiter_id').value = "";

				document.getElementById('stundensatz_id').setAttribute('disabled', 'disabled');
				document.getElementById('bezahlte_uebungsleiter_trainerausbildung_id').setAttribute('disabled', 'disabled');
				document.getElementById('regelmaessige_fortbildungsmoeglichkeiten_id').setAttribute('disabled', 'disabled');
				document.getElementById('bezahlte_uebungsleiterstunden_id').setAttribute('disabled', 'disabled');
				document.getElementById('kostenfreie_vereinsmitgliedschaft_id').setAttribute('disabled', 'disabled');
				document.getElementById('begleitete_einarbeitungszeit_id').setAttribute('disabled', 'disabled');
				document.getElementById('verlaessliche_vertretungsregelung_id').setAttribute('disabled', 'disabled');
				document.getElementById('betreuung_meiner_kinder_waehrend_der_trainingszeit_id').setAttribute('disabled', 'disabled');
				document.getElementById('weitere_voraussetzungen_fuer_uebungsleiter_id').setAttribute('disabled', 'disabled');
			}
			else {

// 									alert ("else");
// 									alert (document.frm_fsv_umfrage.betreuung_meiner_kinder_waehrend_der_trainingszeit.checked);
				
				document.getElementById('stundensatz_id').removeAttribute('disabled');
				document.getElementById('bezahlte_uebungsleiter_trainerausbildung_id').removeAttribute('disabled');
				document.getElementById('regelmaessige_fortbildungsmoeglichkeiten_id').removeAttribute('disabled');
				document.getElementById('bezahlte_uebungsleiterstunden_id').removeAttribute('disabled');
				document.getElementById('kostenfreie_vereinsmitgliedschaft_id').removeAttribute('disabled');
				document.getElementById('begleitete_einarbeitungszeit_id').removeAttribute('disabled');
				document.getElementById('verlaessliche_vertretungsregelung_id').removeAttribute('disabled');
				document.getElementById('betreuung_meiner_kinder_waehrend_der_trainingszeit_id').removeAttribute('disabled');
				document.getElementById('weitere_voraussetzungen_fuer_uebungsleiter_id').removeAttribute('disabled');
			}
		}

		//****************************************************************************************************//

	</script>
</head>
<body>
	<noscript>
		Sie m&uuml;ssen JavaScript aktivieren!
	</noscript>

	<div class="allg_text">
		<br />
		<h2>Nutze die Chance und gestalte mit uns zusammen den Sportverein Deiner W&uuml;nsche!</h2>
		Der FSV Erlangen-Bruck e.V. steht - wie viele Sportvereine heute - vor einem Umbruch. Im Fokus steht f&uuml;r uns aktuell der Bau eines neuen Sportheims. </br>
		Dies bietet die Chance, das bestehende Angebot beim FSV deutlich zu erweitern. Wir m&ouml;chten wissen: </br>
		Was w&uuml;nschen sich die FSV-Mitglieder wie auch die sportlich interessierten Freunde, Nachbarn und Berufst&auml;tigen aus der Umgebung? </br> 
		Wie sollen der FSV Erlangen-Bruck, sein Sport- und Freizeitangebot und das neue Sportheim aussehen? Das Ergebnis dieser Umfrage wird das k&uuml;nftige  </br>
		Vereinsleben ma&szlig;geblich mitbestimmen. Nimm Dir deshalb bitte die Zeit zur Beantwortung der Fragen und gestalte die Zukunft des FSV aktiv mit! </br></br>
		Unter allen Teilnehmenden verlosen wir 8 Gutscheine &agrave; 20 Euro f&uuml;r unsere<a href="https://www.fsverlangenbruck.de/files/verein/licandro_speisekarte_2020_04_12.pdf">Sportgastst&auml;tte.</a><br /><br />
		Selbstverst&auml;ndlich werden die Anforderungen des Datenschutzes erf&uuml;llt. Die Umfrage wird anonymisiert durchgef&uuml;hrt und ausgewertet. <br /><br /><br />
		<hr align="left" width="50%" />
	<?php
		//
		//
		// Verbindung zum Datenbankserver herstellen
		require_once('db_fsv_connect.inc');
		//
//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/

// 																								echo "<br />" . __LINE__  . "<br />";
// 																								var_dump($_SERVER);

		//
		// Erfassung des Standes / des Fortschritts der Session
		if (				( isset ( $_POST ) )
				&&   ( ! ( isset ( $_POST['fragebogen_abschicken'] ) ) ) )  {
			//
			// komme von der Hauptseite her (Anstoß der Umfrage)
			// Aufblenden des Formulars für die Abfrage bzw. Return

// 																								echo "<br />" . __LINE__  . "<br />";
// 																								var_dump($_POST);

	?>
				<form name = "frm_fsv_umfrage" accept-charset="UTF-8" action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
					<br />
					<div class="table">
						<div class="spaltetop">
							<h3>Alter</h3>
						</div>
						<div class="spalte2"><br />
							<select name = "mein_alter" size="3"><br />
	<?php
							for ( $i = 0 ; $i <= 99 ; $i++ ) {
								if ( $i == 1 ) {
									echo ("<option>$i Jahr</option>");
								}
								else {
									echo ("<option>$i Jahre</option>");
								}
							}
	?>
							</select><br /><br /><br />
						</div>
					</div>
					
					<h3>Geschlecht</h3>
						<input type="radio" name="geschlecht" value="m" />m&auml;nnlich&nbsp;&nbsp;&nbsp;
						<input type="radio" name="geschlecht" value="w" />weiblich&nbsp;&nbsp;&nbsp;
						<input type="radio" name="geschlecht" value="d" />divers<br />
					<br />
					<h3>Wohnort</h3>
						<input type="radio" name="wohnort" value="Wohnort Bruck" />Bruck&nbsp;&nbsp;&nbsp;
						<input type="radio" name="wohnort" value="Wohnort Erlangen" />Erlangen&nbsp;&nbsp;&nbsp;
						<input type="radio" name="wohnort" value="Wohnort ausserhalb" />au&szlig;erhalb<br />
					<br />
					<h3>Arbeitsort</h3>
						<input type="radio" name="arbeit" value="Arbeitsort Bruck" />Bruck&nbsp;&nbsp;&nbsp;
						<input type="radio" name="arbeit" value="Arbeitsort Erlangen" />Erlangen&nbsp;&nbsp;&nbsp;
						<input type="radio" name="arbeit" value="Arbeitsort ausserhalb" />au&szlig;erhalb<br />
					<br />
					<h3>Mitgliedschaft</h3>
					<div class="table">
						<div class="spaltetop">
							<input type="radio" name="mitglied" value="Kein Mitglied" onClick = "fct_mitgliedschaft()"/>kein Mitglied<br />
						</div>
					</div>
					<div class="table">
						<div class="spaltetop">
							<input type="radio" name="mitglied" value="Kein Mitglied mehr" onClick = "fct_mitgliedschaft()" />kein Mitglied mehr<br />
						</div>
						<div class="spalte2top">
							Austrittsgrund:&nbsp; 
						</div>
						<div class="spalte2">
							<input name="austrittsgrund" id = "austrittsgrund_id" type="text" size="140" maxlength="140" value = "" /><br /><br />
						</div>
					</div>
					<div class="table">
						<div class="spaltetop">
								<input type="radio" name="mitglied" id = "mitglied_id" value="Mitglied" onClick = "fct_mitgliedschaft()"/>Mitglied<br /><br />
						</div>
						<div class="spalte2top">
							Abteilung&nbsp;
						</div>
						<div class="spalte2">
								<select name="fsv_abteilungen" id = "fsv_abteilungen_id" disabled size="5">
									<option value="keine Abteilung">keine Abteilung</option>
									<option value="Badminton">Badminton</option>
									<option value="Fussball">Fu&szlig;ball</option>
									<option value="Karate">Karate</option>
									<option value="Sportkegeln">Sportkegeln</option>
									<option value="Tennis">Tennis</option>
									<option value="Turnen und Gymnastik">Turnen und Gymnastik</option>
									<option value="Volleyball">Volleyball</option>
									<option value="Wandern">Wandern</option>
								</select><br /><br />
						</div>
					</div>


					<div id="accordion">
					  <h3>Was ist Dir wichtig im Sportverein Deiner Tr&auml;ume?</h3>
					  <div>
					  <div class="table">
				      <div class="spalte1">
							Gesundheit &amp; Wellness
						</div>
				      <div class="spalte2">
							<input type="radio" name="gesundheit_wellness" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="gesundheit_wellness" value="wichtig" />wichtig
							<input type="radio" name="gesundheit_wellness" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="gesundheit_wellness" value="egal" />egal
						</div>
  					</div>
					<div class="table">
				      <div class="spalte1">
				      	Sport &amp; Fitness
						</div>
				      <div class="spalte2">
							<input type="radio" name="sport_fitness" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="sport_fitness" value="wichtig" />wichtig
							<input type="radio" name="sport_fitness" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="sport_fitness" value="egal" />egal
						</div>
  					</div>
					<div class="table">
				      <div class="spalte1">
							Leistungsorientierung &amp; Wettkampf
						</div>
				      <div class="spalte2">
							<input type="radio" name="leistungsorientierung_wettkampf" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="leistungsorientierung_wettkampf" value="wichtig" />wichtig
							<input type="radio" name="leistungsorientierung_wettkampf" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="leistungsorientierung_wettkampf" value="egal" />egal
						</div>
  					</div>
					<div class="table">
				      <div class="spalte1">
							Freizeit &amp; Geselligkeit
						</div>
				      <div class="spalte2">
							<input type="radio" name="freizeit_geselligkeit" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="freizeit_geselligkeit" value="wichtig" />wichtig
							<input type="radio" name="freizeit_geselligkeit" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="freizeit_geselligkeit" value="egal" />egal
						</div>
  					</div>
					<div class="table">
				      <div class="spalte1">
							Angebote f&uuml;r Jung &amp; Alt
						</div>
				      <div class="spalte2">
							<input type="radio" name="angebote_fuer_jung_alt" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="angebote_fuer_jung_alt" value="wichtig" />wichtig
							<input type="radio" name="angebote_fuer_jung_alt" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="angebote_fuer_jung_alt" value="egal" />egal
						</div>
  					</div>
					<div class="table">
				      <div class="spalte1">
							Zeitlich befristete Kursangebote
						</div>
				      <div class="spalte2">
							<input type="radio" name="zeitlich_befristete_kursangebote" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="zeitlich_befristete_kursangebote" value="wichtig" />wichtig
							<input type="radio" name="zeitlich_befristete_kursangebote" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="zeitlich_befristete_kursangebote" value="egal" />egal
						</div>
  					</div>
					<div class="table">
				      <div class="spalte1">
							Dauerangebote f&uuml;r Vereinsmitglieder
						</div>
				      <div class="spalte2">
							<input type="radio" name="regelmaessiges_training" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="regelmaessiges_training" value="wichtig" />wichtig
							<input type="radio" name="regelmaessiges_training" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="regelmaessiges_training" value="egal" />egal
						</div>
  					</div>
					<div class="table">
				      <div class="spalte1">
							Angebote direkt am Vereinsgel&auml;nde
						</div>
				      <div class="spalte2">
							<input type="radio" name="angebote_direkt_am_vereinsgelaende" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="angebote_direkt_am_vereinsgelaende" value="wichtig" />wichtig
							<input type="radio" name="angebote_direkt_am_vereinsgelaende" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="angebote_direkt_am_vereinsgelaende" value="egal" />egal
						</div>
  					</div>
					<div class="table">
						<div class="spalte1">
							Vielf&auml;ltiges Sport- und Freizeitangebot
						</div>
						<div class="spalte2">
							<input type="radio" name="vielfaeltiges_angebot" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="vielfaeltiges_angebot" value="wichtig" />wichtig
							<input type="radio" name="vielfaeltiges_angebot" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="vielfaeltiges_angebot" value="egal" />egal
						</div>
					</div>
					<div class="table">
				      <div class="spalte1">
							Qualifizierte &Uuml;bungsleiter &amp; Trainer
						</div>
				      <div class="spalte2">
							<input type="radio" name="qualifizierte_uebungsleiter_und_trainer" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="qualifizierte_uebungsleiter_und_trainer" value="wichtig" />wichtig
							<input type="radio" name="qualifizierte_uebungsleiter_und_trainer" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="qualifizierte_uebungsleiter_und_trainer" value="egal" />egal
						</div>
  					</div>
					<div class="table">
				      <div class="spalte1">
							Preisg&uuml;nstiger Mitgliedsbeitrag
						</div>
				      <div class="spalte2">
							<input type="radio" name="preisguenstiger_mitgliedsbeitrag" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="preisguenstiger_mitgliedsbeitrag" value="wichtig" />wichtig
							<input type="radio" name="preisguenstiger_mitgliedsbeitrag" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="preisguenstiger_mitgliedsbeitrag" value="egal" />egal
						</div>
  					</div>
					<div class="table">
				      <div class="spalte1">
							Was ist Dir sonst noch wichtig?
						</div>
				      <div class="spalte2">
				      	<input name="was_ist_dir_sonst_noch_wichtig" type="text" size="100" value = "" />
						</div>
  					</div>
					  </div>
					  <h3>Welche erg&auml;nzenden Angebote w&uuml;nschst Du Dir beim FSV?</h3>
					  <div>
					  <div class="table">
				      <div class="spalte1">
							<input type="checkbox" name="physiotherapie" value="Physiotherapie" />Physiotherapie
						</div>
				      <div class="spalte2">
							<input type="checkbox" name="personal_training" value="Personal Training" />Personal Training
						</div>
					</div>
					<div class="table">
				      <div class="spalte1">
							<input type="checkbox" name="massage" value="Massage" />Massage
						</div>
				      <div class="spalte2">
							<input type="checkbox" name="ernaehrungsberatung" value="Ernaehrungsberatung" />Ern&auml;hrungsberatung <br />
						</div>
					</div>
					<div class="table">
				      <div class="spalte1">
							<input type="checkbox" name="fahrdienst" value="Fahrdienst" />Fahrdienst
						</div>
				      <div class="spalte2">
							<input type="checkbox" name="spielplatz" value="Spielplatz" />Spielplatz <br />
						</div>
					</div>
					<div class="table">
				      <div class="spalte1">
							<input type="checkbox" name="ferienangebote_camps" value="Ferienangebote und Camps" />Ferienangebote und Camps
						</div>
				      <div class="spalte2">
							<input type="checkbox" name="sportkindergarten_hort" value="Sportkindergarten "/>Sportkindergarten / -hort
						</div>
					</div>
					<div class="table">
				      <div class="spalte1">
							<input type="checkbox" name="jugendclub_nachmittagsbetreuung" value="Jugendclub Nachmittagsbetreuung" />Jugendclub / Nachmittagsbetreuung
						</div>
				      <div class="spalte2">
							<input type="checkbox" name="kinderbetreuung" value="Kinderbetreuung waehrend des Sports" />Kinderbetreuung w&auml;hrend des Sports <br />
						</div>
					</div>
					<div class="table">
				      <div class="spalte1">
							<input type="checkbox" name="feiern_und_veranstaltungen" value="Feiern und Veranstaltungen" />Feiern und Veranstaltungen
						</div>
				      <div class="spalte2">
							<input type="checkbox" name="public_viewing" value="Public Viewing/ -Camps" />Public Viewing <br />
						</div>
					</div>
					<div class="table">
				      <div class="spalte1">
							<input type="checkbox" name="musik_und_kulturveranstaltungen" value="Musik- und Kulturveranstaltungen" />Musik- und Kulturveranstaltungen
						</div>
				      <div class="spalte2"><br />
						</div>
					</div>
					<br />
					<div class="table">
				      <div class="spalte_l">
							Weitere Angebote:&nbsp;
						</div>
				      <div class="spalte02">
							<input name="weitere_angebote" type="text" size="120" value = "" />
						</div>
					</div>
					  </div>
					  <h3>Was ist Dir f&uuml;r die Vereinsgastst&auml;tte wichtig?</h3>
					  <div>
					    <div class="table">
						<div class="spalte1">
							G&uuml;nstige Preise
						</div>
						<div class="spalte2">
							<input type="radio" name="guenstige_preise_gast" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="guenstige_preise_gast" value="wichtig" />wichtig
							<input type="radio" name="guenstige_preise_gast" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="guenstige_preise_gast" value="egal" />egal
						</div>
					</div>
					<div class="table">
				      <div class="spalte1">
							Schnelle K&uuml;che
						</div>
				      <div class="spalte2">
							<input type="radio" name="schnelle_kueche" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="schnelle_kueche" value="wichtig" />wichtig
							<input type="radio" name="schnelle_kueche" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="schnelle_kueche" value="egal" />egal
						</div>
  					</div>
					<div class="table">
				      <div class="spalte1">
							Bio-Qualit&auml;t
						</div>
				      <div class="spalte2">
							<input type="radio" name="bio_qualitaet" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="bio_qualitaet" value="wichtig" />wichtig
							<input type="radio" name="bio_qualitaet" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="bio_qualitaet" value="egal" />egal
						</div>
  					</div>
					<div class="table">
				      <div class="spalte1">
							Vegetarische/ vegane Gerichte
						</div>
				      <div class="spalte2">
							<input type="radio" name="vegetarische_vegane_gerichte" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="vegetarische_vegane_gerichte" value="wichtig" />wichtig
							<input type="radio" name="vegetarische_vegane_gerichte" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="vegetarische_vegane_gerichte" value="egal" />egal
						</div>
  					</div>
					<div class="table">
						<div class="spalte1">
							Vielf&auml;ltiges Speisenangebot
						</div>
						<div class="spalte2">
							<input type="radio" name="vielfaeltiges_speisenangebot" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="vielfaeltiges_speisenangebot" value="wichtig" />wichtig
							<input type="radio" name="vielfaeltiges_speisenangebot" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="vielfaeltiges_speisenangebot" value="egal" />egal
						</div>
					</div>
					<div class="table">
				      <div class="spalte1">
							Fr&uuml;hst&uuml;cksangebot/ Brunch
						</div>
				      <div class="spalte2">
							<input type="radio" name="fruehstuecksangebot_brunch" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="fruehstuecksangebot_brunch" value="wichtig" />wichtig
							<input type="radio" name="fruehstuecksangebot_brunch" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="fruehstuecksangebot_brunch" value="egal" />egal
						</div>
  					</div>
					<div class="table">
				      <div class="spalte1">
							Blick auf Indoor-Sportbereich
						</div>
				      <div class="spalte2">
							<input type="radio" name="blick_auf_indoor_sportbereich" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="blick_auf_indoor_sportbereich" value="wichtig" />wichtig
							<input type="radio" name="blick_auf_indoor_sportbereich" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="blick_auf_indoor_sportbereich" value="egal" />egal
						</div>
  					</div>
					<div class="table">
				      <div class="spalte1">
							Kinderecke
						</div>
				      <div class="spalte2">
							<input type="radio" name="kinderecke" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="kinderecke" value="wichtig" />wichtig
							<input type="radio" name="kinderecke" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="kinderecke" value="egal" />egal
						</div>
  					</div>
					<div class="table">
				      <div class="spalte1">
							Spielm&ouml;glichkeiten im Gastro-Bereich
						</div>
				      <div class="spalte2">
							<input type="radio" name="spielmoeglichkeiten_im_gastro_bereich" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="spielmoeglichkeiten_im_gastro_bereich" value="wichtig" />wichtig
							<input type="radio" name="spielmoeglichkeiten_im_gastro_bereich" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="spielmoeglichkeiten_im_gastro_bereich" value="egal" />egal
						</div>
  					</div>
					<div class="table">
				      <div class="spalte1">
							Ruhige Atmosph&auml;re beim Essen
						</div>
				      <div class="spalte2">
							<input type="radio" name="ruhige_atmosphaere_beim_essen" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="ruhige_atmosphaere_beim_essen" value="wichtig" />wichtig
							<input type="radio" name="ruhige_atmosphaere_beim_essen" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="ruhige_atmosphaere_beim_essen" value="egal" />egal
						</div>
  					</div>
					<div class="table">
				      <div class="spalte1">
							Biergarten/ Au&szlig;enterrasse
						</div>
				      <div class="spalte2">
							<input type="radio" name="biergarten_aussenterrasse" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="biergarten_aussenterrasse" value="wichtig" />wichtig
							<input type="radio" name="biergarten_aussenterrasse" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="biergarten_aussenterrasse" value="egal" />egal
						</div>
  					</div>
					<div class="table">
				      <div class="spalte1">
							&Uuml;bertragung von Sportereignissen
						</div>
				      <div class="spalte2">
							<input type="radio" name="uebertragung_von_sportereignissen" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="uebertragung_von_sportereignissen" value="wichtig" />wichtig
							<input type="radio" name="uebertragung_von_sportereignissen" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="uebertragung_von_sportereignissen" value="egal" />egal
						</div>
  					</div>
					<div class="table">
				      <div class="spalte1">
							Lieferdienst
						</div>
				      <div class="spalte2">
							<input type="radio" name="lieferdienst" value="absolut wichtig" />absolut wichtig
							<input type="radio" name="lieferdienst" value="wichtig" />wichtig
							<input type="radio" name="lieferdienst" value="weniger wichtig" />weniger wichtig
							<input type="radio" name="lieferdienst" value="egal" />egal
						</div>
  					</div>
					<div class="table">
				      <div class="spalte_l">
				      	Was ist Dir noch wichtig?
						</div>
				      <div class="spalte2">
							<input name="was_ist_dir_noch_wichtig_gaststaette" type="text" size="120" value = "" />
						</div>
					</div>
					  </div>
					  <h3>Wie w&uuml;rdest Du die folgenden Sport- und Freizeitangebote beim FSV nutzen?</h3>
			            <div>
			        		<h4>Fitness</h4>
					<div class="table">
				      <div class="spalte3">
							Aerobic/ Zumba/ Jazz-Dance
						</div>
				      <div class="spalte2">
							<input type="radio" name="aerobic_zumba_jazz_dance" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="aerobic_zumba_jazz_dance" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="aerobic_zumba_jazz_dance" value="gelegentlich" />gelegentlich
							<input type="radio" name="aerobic_zumba_jazz_dance" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="aerobic_zumba_jazz_dance" value="nie" checked = "checked" />nie
							<input type="radio" name="aerobic_zumba_jazz_dance" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Aqua-Fitness
						</div>
				      <div class="spalte2">
							<input type="radio" name="aqua_fitness" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="aqua_fitness" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="aqua_fitness" value="gelegentlich" />gelegentlich
							<input type="radio" name="aqua_fitness" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="aqua_fitness" value="nie" checked = "checked" />nie
							<input type="radio" name="aqua_fitness" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Body-Workout/ Fitnesskurse
						</div>
				      <div class="spalte2">
							<input type="radio" name="body_workout_fitnesskurse" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="body_workout_fitnesskurse" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="body_workout_fitnesskurse" value="gelegentlich" />gelegentlich
							<input type="radio" name="body_workout_fitnesskurse" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="body_workout_fitnesskurse" value="nie" checked = "checked" />nie
							<input type="radio" name="body_workout_fitnesskurse" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							EMS-Training
						</div>
				      <div class="spalte2">
							<input type="radio" name="ems_training" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="ems_training" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="ems_training" value="gelegentlich" />gelegentlich
							<input type="radio" name="ems_training" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="ems_training" value="nie" checked = "checked" />nie
							<input type="radio" name="ems_training" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Indoor-Cycling (Spinning)
						</div>
				      <div class="spalte2">
							<input type="radio" name="indoor_cycling_spinning" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="indoor_cycling_spinning" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="indoor_cycling_spinning" value="gelegentlich" />gelegentlich
							<input type="radio" name="indoor_cycling_spinning" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="indoor_cycling_spinning" value="nie" checked = "checked" />nie
							<input type="radio" name="indoor_cycling_spinning" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Kraftraum/ Fitnessger&auml;te
						</div>
				      <div class="spalte2">
							<input type="radio" name="kraftraum_fitnessgeraete" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="kraftraum_fitnessgeraete" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="kraftraum_fitnessgeraete" value="gelegentlich" />gelegentlich
							<input type="radio" name="kraftraum_fitnessgeraete" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="kraftraum_fitnessgeraete" value="nie" checked = "checked" />nie
							<input type="radio" name="kraftraum_fitnessgeraete" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Laufgruppe
						</div>
				      <div class="spalte2">
							<input type="radio" name="laufgruppe" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="laufgruppe" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="laufgruppe" value="gelegentlich" />gelegentlich
							<input type="radio" name="laufgruppe" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="laufgruppe" value="nie" checked = "checked" />nie
							<input type="radio" name="laufgruppe" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Nordic Walking
						</div>
				      <div class="spalte2">
							<input type="radio" name="nordicwalking" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="nordicwalking" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="nordicwalking" value="gelegentlich" />gelegentlich
							<input type="radio" name="nordicwalking" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="nordicwalking" value="nie" checked = "checked" />nie
							<input type="radio" name="nordicwalking" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
 					<div class="table">
 				      <div class="spalte_l">
 				      	Weitere Fitnessangebote:
 						</div>
 				      <div class="spalte02">
 							<input name="weitere_fitnessangebote" type="text" size="120" value = "" />
 						</div>
 					</div>
 					<br /><br />
 					<hr align="left" width="50%" />
					<br />
					<h4>Gesundheit &amp; Wellness</h4>
					<div class="table">
				      <div class="spalte3">
							Entspannungskurse/ Autogenes Training
						</div>
				      <div class="spalte2">
							<input type="radio" name="entspannungskurse_autogenes_training" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="entspannungskurse_autogenes_training" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="entspannungskurse_autogenes_training" value="gelegentlich" />gelegentlich
							<input type="radio" name="entspannungskurse_autogenes_training" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="entspannungskurse_autogenes_training" value="nie" checked = "checked" />nie
							<input type="radio" name="entspannungskurse_autogenes_training" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Faszientraining
						</div>
				      <div class="spalte2">
							<input type="radio" name="faszientraining" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="faszientraining" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="faszientraining" value="gelegentlich" />gelegentlich
							<input type="radio" name="faszientraining" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="faszientraining" value="nie" checked = "checked" />nie
							<input type="radio" name="faszientraining" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Feldenkrais
						</div>
				      <div class="spalte2">
							<input type="radio" name="feldenkrais" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="feldenkrais" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="feldenkrais" value="gelegentlich" />gelegentlich
							<input type="radio" name="feldenkrais" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="feldenkrais" value="nie" checked = "checked" />nie
							<input type="radio" name="feldenkrais" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Herz-/ Kreislauftraining
						</div>
				      <div class="spalte2">
							<input type="radio" name="herz_kreislauftraining" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="herz_kreislauftraining" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="herz_kreislauftraining" value="gelegentlich" />gelegentlich
							<input type="radio" name="herz_kreislauftraining" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="herz_kreislauftraining" value="nie" checked = "checked" />nie
							<input type="radio" name="herz_kreislauftraining" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Meditation
						</div>
				      <div class="spalte2">
							<input type="radio" name="meditation" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="meditation" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="meditation" value="gelegentlich" />gelegentlich
							<input type="radio" name="meditation" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="meditation" value="nie" checked = "checked" />nie
							<input type="radio" name="meditation" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Qigong/ Yoga/ Pilates
						</div>
				      <div class="spalte2">
							<input type="radio" name="qigong_yoga_pilates" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="qigong_yoga_pilates" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="qigong_yoga_pilates" value="gelegentlich" />gelegentlich
							<input type="radio" name="qigong_yoga_pilates" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="qigong_yoga_pilates" value="nie" checked = "checked" />nie
							<input type="radio" name="qigong_yoga_pilates" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Reha-Sport
						</div>
				      <div class="spalte2">
							<input type="radio" name="reha_sport" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="reha_sport" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="reha_sport" value="gelegentlich" />gelegentlich
							<input type="radio" name="reha_sport" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="reha_sport" value="nie" checked = "checked" />nie
							<input type="radio" name="reha_sport" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Sauna
						</div>
				      <div class="spalte2">
							<input type="radio" name="sauna" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="sauna" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="sauna" value="gelegentlich" />gelegentlich
							<input type="radio" name="sauna" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="sauna" value="nie" checked = "checked" />nie
							<input type="radio" name="sauna" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Wirbels&auml;ulengymnastik/ R&uuml;ckenschule
						</div>
				      <div class="spalte2">
							<input type="radio" name="wirbelsaeulengymnastik_rueckenschule" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="wirbelsaeulengymnastik_rueckenschule" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="wirbelsaeulengymnastik_rueckenschule" value="gelegentlich" />gelegentlich
							<input type="radio" name="wirbelsaeulengymnastik_rueckenschule" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="wirbelsaeulengymnastik_rueckenschule" value="nie" checked = "checked" />nie
							<input type="radio" name="wirbelsaeulengymnastik_rueckenschule" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte_l">
				      	Weitere Gesundheits- und Wellness-Angebote:
						</div>
  					</div>
					<div class="table">
				      <div class="spalte_l">
						</div>
				      <div class="spalte02">
							<input name="weitere_gesundheits_und_wellness_angebote" type="text" size="120" value = "" />
						</div>
					</div>
					<br /><br />
					<hr align="left" width="50%" /><br />
					<h4>Angebote direkt am Vereinsgel&auml;nde</h4>
					<div class="table">
						<div class="spalte3">
							Cheerleading
						</div>
						<div class="spalte2">
							<input type="radio" name="cheerleading" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="cheerleading" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="cheerleading" value="gelegentlich" />gelegentlich
							<input type="radio" name="cheerleading" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="cheerleading" value="nie" checked = "checked" />nie
							<input type="radio" name="cheerleading" value="kenne ich nicht" />kenne ich nicht
						</div>
						</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Fu&szlig;balltennis
						</div>
				      <div class="spalte2">
							<input type="radio" name="fussballtennis" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="fussballtennis" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="fussballtennis" value="gelegentlich" />gelegentlich
							<input type="radio" name="fussballtennis" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="fussballtennis" value="nie" checked = "checked" />nie
							<input type="radio" name="fussballtennis" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Jugger
						</div>
				      <div class="spalte2">
							<input type="radio" name="jugger" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="jugger" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="jugger" value="gelegentlich" />gelegentlich
							<input type="radio" name="jugger" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="jugger" value="nie" checked = "checked" />nie
							<input type="radio" name="jugger" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Lasertag
						</div>
				      <div class="spalte2">
							<input type="radio" name="lasertag" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="lasertag" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="lasertag" value="gelegentlich" />gelegentlich
							<input type="radio" name="lasertag" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="lasertag" value="nie" checked = "checked" />nie
							<input type="radio" name="lasertag" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Paintball
						</div>
				      <div class="spalte2">
							<input type="radio" name="paintball" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="paintball" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="paintball" value="gelegentlich" />gelegentlich
							<input type="radio" name="paintball" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="paintball" value="nie" checked = "checked" />nie
							<input type="radio" name="paintball" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Parcouring
						</div>
				      <div class="spalte2">
							<input type="radio" name="parcouring" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="parcouring" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="parcouring" value="gelegentlich" />gelegentlich
							<input type="radio" name="parcouring" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="parcouring" value="nie" checked = "checked" />nie
							<input type="radio" name="parcouring" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Speedminton
						</div>
				      <div class="spalte2">
							<input type="radio" name="speedminton" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="speedminton" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="speedminton" value="gelegentlich" />gelegentlich
							<input type="radio" name="speedminton" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="speedminton" value="nie" checked = "checked" />nie
							<input type="radio" name="speedminton" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Ultimate Frisbee
						</div>
				      <div class="spalte2">
							<input type="radio" name="ultimate_frisbee" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="ultimate_frisbee" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="ultimate_frisbee" value="gelegentlich" />gelegentlich
							<input type="radio" name="ultimate_frisbee" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="ultimate_frisbee" value="nie" checked = "checked" />nie
							<input type="radio" name="ultimate_frisbee" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte_l">
				      	Weitere Angebote direkt am Vereinsgel&auml;nde:
						</div>
					</div>
					<div class="table">
				      <div class="spalte_l">
						</div>
				      <div class="spalte02">
							<input name="weitere_angebote_direkt_am_vereinsgelaende" type="text" size="120" value = "" />
						</div>
					</div>
					<br /><br />
					<hr align="left" width="50%" />
					<br />
					<h4>Individualsportarten</h4>
					<div class="table">
				      <div class="spalte3">
							Bouldern
						</div>
				      <div class="spalte2">
							<input type="radio" name="bouldern" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="bouldern" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="bouldern" value="gelegentlich" />gelegentlich
							<input type="radio" name="bouldern" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="bouldern" value="nie" checked = "checked" />nie
							<input type="radio" name="bouldern" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Inlineskaten
						</div>
				      <div class="spalte2">
							<input type="radio" name="inlineskaten" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="inlineskaten" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="inlineskaten" value="gelegentlich" />gelegentlich
							<input type="radio" name="inlineskaten" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="inlineskaten" value="nie" checked = "checked" />nie
							<input type="radio" name="inlineskaten" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Intuitives Bogenschie&szlig;en
						</div>
				      <div class="spalte2">
							<input type="radio" name="intuitives_bogenschiessen" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="intuitives_bogenschiessen" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="intuitives_bogenschiessen" value="gelegentlich" />gelegentlich
							<input type="radio" name="intuitives_bogenschiessen" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="intuitives_bogenschiessen" value="nie" checked = "checked" />nie
							<input type="radio" name="intuitives_bogenschiessen" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Karate
						</div>
				      <div class="spalte2">
							<input type="radio" name="karate" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="karate" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="karate" value="gelegentlich" />gelegentlich
							<input type="radio" name="karate" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="karate" value="nie" checked = "checked" />nie
							<input type="radio" name="karate" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Minigolf
						</div>
				      <div class="spalte2">
							<input type="radio" name="minigolf" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="minigolf" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="minigolf" value="gelegentlich" />gelegentlich
							<input type="radio" name="minigolf" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="minigolf" value="nie" checked = "checked" />nie
							<input type="radio" name="minigolf" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Schwimmen/ Schwimmkurse
						</div>
				      <div class="spalte2">
							<input type="radio" name="schwimmen_schwimmkurse" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="schwimmen_schwimmkurse" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="schwimmen_schwimmkurse" value="gelegentlich" />gelegentlich
							<input type="radio" name="schwimmen_schwimmkurse" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="schwimmen_schwimmkurse" value="nie" checked = "checked" />nie
							<input type="radio" name="schwimmen_schwimmkurse" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Selbstverteidigung
						</div>
				      <div class="spalte2">
							<input type="radio" name="selbstverteidigung" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="selbstverteidigung" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="selbstverteidigung" value="gelegentlich" />gelegentlich
							<input type="radio" name="selbstverteidigung" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="selbstverteidigung" value="nie" checked = "checked" />nie
							<input type="radio" name="selbstverteidigung" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Turnen/ Gymnastik
						</div>
				      <div class="spalte2">
							<input type="radio" name="turnen_gymnastik" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="turnen_gymnastik" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="turnen_gymnastik" value="gelegentlich" />gelegentlich
							<input type="radio" name="turnen_gymnastik" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="turnen_gymnastik" value="nie" checked = "checked" />nie
							<input type="radio" name="turnen_gymnastik" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte_l">
				      	Weitere Individualsportarten:
						</div>
				      <div class="spalte02">
							<input name="weitere_individualsportarten" type="text" size="120" value = "" />
						</div>
					</div>
					<br /><br />
					<hr align="left" width="50%" />
					<br />
					<h4>Mannschaftssportarten</h4>
					<div class="table">
				      <div class="spalte3">
							American Football
						</div>
				      <div class="spalte2">
							<input type="radio" name="american_football" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="american_football" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="american_football" value="gelegentlich" />gelegentlich
							<input type="radio" name="american_football" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="american_football" value="nie" checked = "checked" />nie
							<input type="radio" name="american_football" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Aqua-Ball
						</div>
				      <div class="spalte2">
							<input type="radio" name="aqua_ball" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="aqua_ball" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="aqua_ball" value="gelegentlich" />gelegentlich
							<input type="radio" name="aqua_ball" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="aqua_ball" value="nie" checked = "checked" />nie
							<input type="radio" name="aqua_ball" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Baseball
						</div>
				      <div class="spalte2">
							<input type="radio" name="baseball" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="baseball" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="baseball" value="gelegentlich" />gelegentlich
							<input type="radio" name="baseball" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="baseball" value="nie" checked = "checked" />nie
							<input type="radio" name="baseball" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Beachvolleyball
						</div>
				      <div class="spalte2">
							<input type="radio" name="beachvolleyball" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="beachvolleyball" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="beachvolleyball" value="gelegentlich" />gelegentlich
							<input type="radio" name="beachvolleyball" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="beachvolleyball" value="nie" checked = "checked" />nie
							<input type="radio" name="beachvolleyball" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Fu&szlig;ball
						</div>
				      <div class="spalte2">
							<input type="radio" name="fussball" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="fussball" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="fussball" value="gelegentlich" />gelegentlich
							<input type="radio" name="fussball" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="fussball" value="nie" checked = "checked" />nie
							<input type="radio" name="fussball" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Handball
						</div>
				      <div class="spalte2">
							<input type="radio" name="handball" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="handball" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="handball" value="gelegentlich" />gelegentlich
							<input type="radio" name="handball" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="handball" value="nie" checked = "checked" />nie
							<input type="radio" name="handball" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Rugby
						</div>
				      <div class="spalte2">
							<input type="radio" name="rugby" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="rugby" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="rugby" value="gelegentlich" />gelegentlich
							<input type="radio" name="rugby" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="rugby" value="nie" checked = "checked" />nie
							<input type="radio" name="rugby" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Volleyball
						</div>
				      <div class="spalte2">
							<input type="radio" name="volleyball" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="volleyball" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="volleyball" value="gelegentlich" />gelegentlich
							<input type="radio" name="volleyball" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="volleyball" value="nie" checked = "checked" />nie
							<input type="radio" name="volleyball" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div><br />
					<div class="table">
				      <div class="spalte_l">
				      	Weitere Mannschaftssportarten:
						</div>
				      <div class="spalte02">
							<input name="weitere_mannschaftssportarten" type="text" size="120" value = "" />
						</div>
					</div>
					<br /><br />
					<hr align="left" width="50%" />
					<br />
					<h4>Sportangebote f&uuml;r Kinder</h4>
					<div class="table">
				      <div class="spalte3">
							Akrobatik
						</div>
				      <div class="spalte2">
							<input type="radio" name="akrobatik" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="akrobatik" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="akrobatik" value="gelegentlich" />gelegentlich
							<input type="radio" name="akrobatik" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="akrobatik" value="nie" checked = "checked" />nie
							<input type="radio" name="akrobatik" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Einradfahren
						</div>
				      <div class="spalte2">
							<input type="radio" name="einradfahren" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="einradfahren" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="einradfahren" value="gelegentlich" />gelegentlich
							<input type="radio" name="einradfahren" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="einradfahren" value="nie" checked = "checked" />nie
							<input type="radio" name="einradfahren" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Kinder-Ballschule
						</div>
				      <div class="spalte2">
							<input type="radio" name="kinder_ballschule" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="kinder_ballschule" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="kinder_ballschule" value="gelegentlich" />gelegentlich
							<input type="radio" name="kinder_ballschule" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="kinder_ballschule" value="nie" checked = "checked" />nie
							<input type="radio" name="kinder_ballschule" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							KiSS (Kindersportschule)
						</div>
				      <div class="spalte2">
							<input type="radio" name="kiss_kindersportschule" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="kiss_kindersportschule" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="kiss_kindersportschule" value="gelegentlich" />gelegentlich
							<input type="radio" name="kiss_kindersportschule" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="kiss_kindersportschule" value="nie" checked = "checked" />nie
							<input type="radio" name="kiss_kindersportschule" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Kinderturnen/ Eltern-Kind-Turnen
						</div>
				      <div class="spalte2">
							<input type="radio" name="kinderturnen_eltern_kind_turnen" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="kinderturnen_eltern_kind_turnen" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="kinderturnen_eltern_kind_turnen" value="gelegentlich" />gelegentlich
							<input type="radio" name="kinderturnen_eltern_kind_turnen" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="kinderturnen_eltern_kind_turnen" value="nie" checked = "checked" />nie
							<input type="radio" name="kinderturnen_eltern_kind_turnen" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Kommunikation, Selbstbehauptung, Selbstschutz
						</div>
				      <div class="spalte2">
							<input type="radio" name="kommunikation_selbstbehauptung_selbstschutz" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="kommunikation_selbstbehauptung_selbstschutz" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="kommunikation_selbstbehauptung_selbstschutz" value="gelegentlich" />gelegentlich
							<input type="radio" name="kommunikation_selbstbehauptung_selbstschutz" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="kommunikation_selbstbehauptung_selbstschutz" value="nie" checked = "checked" />nie
							<input type="radio" name="kommunikation_selbstbehauptung_selbstschutz" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Spiel, Sport und Spa&szlig;
						</div>
				      <div class="spalte2">
							<input type="radio" name="spiel_sport_und_spass" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="spiel_sport_und_spass" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="spiel_sport_und_spass" value="gelegentlich" />gelegentlich
							<input type="radio" name="spiel_sport_und_spass" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="spiel_sport_und_spass" value="nie" checked = "checked" />nie
							<input type="radio" name="spiel_sport_und_spass" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Schwimmkurse/ Kinderschwimmen
						</div>
				      <div class="spalte2">
							<input type="radio" name="schwimmkurse_kinderschwimmen" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="schwimmkurse_kinderschwimmen" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="schwimmkurse_kinderschwimmen" value="gelegentlich" />gelegentlich
							<input type="radio" name="schwimmkurse_kinderschwimmen" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="schwimmkurse_kinderschwimmen" value="nie" checked = "checked" />nie
							<input type="radio" name="schwimmkurse_kinderschwimmen" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte_l">
				      	Weitere Sportangebote f&uuml;r Kinder:
						</div>
					</div>
					<div class="table">
				      <div class="spalte_l">
						</div>
				      <div class="spalte02">
							<input name="weitere_sportangebote_fuer_kinder" type="text" size="120" value = "" />
						</div>
					</div>
					<br /><br />
					<hr align="left" width="50%" />
					<br />
					<h4>Sportspiele</h4>
					<div class="table">
				      <div class="spalte3">
							Badminton
						</div>
				      <div class="spalte2">
							<input type="radio" name="badminton" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="badminton" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="badminton" value="gelegentlich" />gelegentlich
							<input type="radio" name="badminton" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="badminton" value="nie" checked = "checked" />nie
							<input type="radio" name="badminton" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Billard
						</div>
				      <div class="spalte2">
							<input type="radio" name="billard" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="billard" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="billard" value="gelegentlich" />gelegentlich
							<input type="radio" name="billard" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="billard" value="nie" checked = "checked" />nie
							<input type="radio" name="billard" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Bowling
						</div>
				      <div class="spalte2">
							<input type="radio" name="bowling" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="bowling" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="bowling" value="gelegentlich" />gelegentlich
							<input type="radio" name="bowling" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="bowling" value="nie" checked = "checked" />nie
							<input type="radio" name="bowling" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Dart
						</div>
				      <div class="spalte2">
							<input type="radio" name="dart" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="dart" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="dart" value="gelegentlich" />gelegentlich
							<input type="radio" name="dart" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="dart" value="nie" checked = "checked" />nie
							<input type="radio" name="dart" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Kegeln/ Sportkegeln
						</div>
				      <div class="spalte2">
							<input type="radio" name="kegeln_sportkegeln" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="kegeln_sportkegeln" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="kegeln_sportkegeln" value="gelegentlich" />gelegentlich
							<input type="radio" name="kegeln_sportkegeln" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="kegeln_sportkegeln" value="nie" checked = "checked" />nie
							<input type="radio" name="kegeln_sportkegeln" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Kickern
						</div>
				      <div class="spalte2">
							<input type="radio" name="kickern" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="kickern" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="kickern" value="gelegentlich" />gelegentlich
							<input type="radio" name="kickern" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="kickern" value="nie" checked = "checked" />nie
							<input type="radio" name="kickern" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							M&ouml;lkky
						</div>
				      <div class="spalte2">
							<input type="radio" name="moelkky" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="moelkky" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="moelkky" value="gelegentlich" />gelegentlich
							<input type="radio" name="moelkky" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="moelkky" value="nie" checked = "checked" />nie
							<input type="radio" name="moelkky" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div>
					<br />
					<div class="table">
				      <div class="spalte3">
							Tennis
						</div>
				      <div class="spalte2">
							<input type="radio" name="tennis" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="tennis" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="tennis" value="gelegentlich" />gelegentlich
							<input type="radio" name="tennis" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="tennis" value="nie" checked = "checked" />nie
							<input type="radio" name="tennis" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div><br />
					<div class="table">
				      <div class="spalte3">
							Tischtennis
						</div>
				      <div class="spalte2">
							<input type="radio" name="tischtennis" value="Mehrmals w&ouml;chentlich" />Mehrmals w&ouml;chentlich
							<input type="radio" name="tischtennis" value="einmal pro Woche" />einmal pro Woche
							<input type="radio" name="tischtennis" value="gelegentlich" />gelegentlich
							<input type="radio" name="tischtennis" value="gerne mal probieren" />gerne mal probieren
							<input type="radio" name="tischtennis" value="nie" checked = "checked" />nie
							<input type="radio" name="tischtennis" value="kenne ich nicht" />kenne ich nicht
						</div>
  					</div><br />
					<div class="table">
				      <div class="spalte_l">
				      	Weitere Sportspiele:
						</div>
				      <div class="spalte02">
							<input name="weitere_sportspiele" type="text" size="120" value = "" />
						</div>
					</div>
					<br /><br />
					<hr align="left" width="50%" />
					<br />
					<h3>Wann w&uuml;rdest Du gerne welche Angebote nutzen?</h3>
					<div class="table">
				      <div class="spalte4">
				      	Uhrzeit
						</div>
				      <div class="spalte7">
							<span>&nbsp;&nbsp;&nbsp;&nbsp;Montag&nbsp;&nbsp;&nbsp;</span>
							<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dienstag&nbsp;&nbsp;&nbsp;</span>
							<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mittwoch</span>
							<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Donnerstag</span>
							<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Freitag</span>
							<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Samstag</span>
							<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sonntag</span>
						</div>
					</div>
					<div class="table">
				      <div class="spalte4">
				      	05:00 - 07:00 Uhr
						</div>
				      <div class="spalte02">
							<input name="mo_05_07" type="text" size="15" maxlength="15" value = "" />
							<input name="di_05_07" type="text" size="15" maxlength="15" value = "" />
							<input name="mi_05_07" type="text" size="15" maxlength="15" value = "" />
							<input name="do_05_07" type="text" size="15" maxlength="15" value = "" />
							<input name="fr_05_07" type="text" size="15" maxlength="15" value = "" />
							<input name="sa_05_07" type="text" size="15" maxlength="15" value = "" />
							<input name="so_05_07" type="text" size="15" maxlength="15" value = "" />
						</div>
					</div>
					<div class="table">
				      <div class="spalte4">
				      	07:00 - 09:00 Uhr
						</div>
				      <div class="spalte02">
							<input name="mo_07_09" type="text" size="15" maxlength="15" value = "" />
							<input name="di_07_09" type="text" size="15" maxlength="15" value = "" />
							<input name="mi_07_09" type="text" size="15" maxlength="15" value = "" />
							<input name="do_07_09" type="text" size="15" maxlength="15" value = "" />
							<input name="fr_07_09" type="text" size="15" maxlength="15" value = "" />
							<input name="sa_07_09" type="text" size="15" maxlength="15" value = "" />
							<input name="so_07_09" type="text" size="15" maxlength="15" value = "" />
						</div>
					</div>
					<div class="table">
				      <div class="spalte4">
				      	09:00 - 11:00 Uhr
						</div>
				      <div class="spalte02">
							<input name="mo_09_11" type="text" size="15" maxlength="15" value = "" />
							<input name="di_09_11" type="text" size="15" maxlength="15" value = "" />
							<input name="mi_09_11" type="text" size="15" maxlength="15" value = "" />
							<input name="do_09_11" type="text" size="15" maxlength="15" value = "" />
							<input name="fr_09_11" type="text" size="15" maxlength="15" value = "" />
							<input name="sa_09_11" type="text" size="15" maxlength="15" value = "" />
							<input name="so_09_11" type="text" size="15" maxlength="15" value = "" />
						</div>
					</div>
					<div class="table">
				      <div class="spalte4">
				      	11:00 - 13:00 Uhr
						</div>
				      <div class="spalte02">
							<input name="mo_11_13" type="text" size="15" maxlength="15" value = "" />
							<input name="di_11_13" type="text" size="15" maxlength="15" value = "" />
							<input name="mi_11_13" type="text" size="15" maxlength="15" value = "" />
							<input name="do_11_13" type="text" size="15" maxlength="15" value = "" />
							<input name="fr_11_13" type="text" size="15" maxlength="15" value = "" />
							<input name="sa_11_13" type="text" size="15" maxlength="15" value = "" />
							<input name="so_11_13" type="text" size="15" maxlength="15" value = "" />
						</div>
					</div>
					<div class="table">
				      <div class="spalte4">
				      	13:00 - 15:00 Uhr
						</div>
				      <div class="spalte02">
							<input name="mo_13_15" type="text" size="15" maxlength="15" value = "" />
							<input name="di_13_15" type="text" size="15" maxlength="15" value = "" />
							<input name="mi_13_15" type="text" size="15" maxlength="15" value = "" />
							<input name="do_13_15" type="text" size="15" maxlength="15" value = "" />
							<input name="fr_13_15" type="text" size="15" maxlength="15" value = "" />
							<input name="sa_13_15" type="text" size="15" maxlength="15" value = "" />
							<input name="so_13_15" type="text" size="15" maxlength="15" value = "" />
						</div>
					</div>
					<div class="table">
				      <div class="spalte4">
				      	15:00 - 17:00 Uhr
						</div>
				      <div class="spalte02">
							<input name="mo_15_17" type="text" size="15" maxlength="15" value = "" />
							<input name="di_15_17" type="text" size="15" maxlength="15" value = "" />
							<input name="mi_15_17" type="text" size="15" maxlength="15" value = "" />
							<input name="do_15_17" type="text" size="15" maxlength="15" value = "" />
							<input name="fr_15_17" type="text" size="15" maxlength="15" value = "" />
							<input name="sa_15_17" type="text" size="15" maxlength="15" value = "" />
							<input name="so_15_17" type="text" size="15" maxlength="15" value = "" />
						</div>
					</div>
					<div class="table">
				      <div class="spalte4">
				      	17:00 - 19:00 Uhr
						</div>
				      <div class="spalte02">
							<input name="mo_17_19" type="text" size="15" maxlength="15" value = "" />
							<input name="di_17_19" type="text" size="15" maxlength="15" value = "" />
							<input name="mi_17_19" type="text" size="15" maxlength="15" value = "" />
							<input name="do_17_19" type="text" size="15" maxlength="15" value = "" />
							<input name="fr_17_19" type="text" size="15" maxlength="15" value = "" />
							<input name="sa_17_19" type="text" size="15" maxlength="15" value = "" />
							<input name="so_17_19" type="text" size="15" maxlength="15" value = "" />
						</div>
					</div>
					<div class="table">
				      <div class="spalte4">
				      	19:00 - 21:00 Uhr
						</div>
				      <div class="spalte02">
							<input name="mo_19_21" type="text" size="15" maxlength="15" value = "" />
							<input name="di_19_21" type="text" size="15" maxlength="15" value = "" />
							<input name="mi_19_21" type="text" size="15" maxlength="15" value = "" />
							<input name="do_19_21" type="text" size="15" maxlength="15" value = "" />
							<input name="fr_19_21" type="text" size="15" maxlength="15" value = "" />
							<input name="sa_19_21" type="text" size="15" maxlength="15" value = "" />
							<input name="so_19_21" type="text" size="15" maxlength="15" value = "" />
						</div>
					</div>
					<div class="table">
				      <div class="spalte4">
				      	21:00 - 23:00 Uhr
						</div>
				      <div class="spalte02">
							<input name="mo_21_23" type="text" size="15" maxlength="15" value = "" />
							<input name="di_21_23" type="text" size="15" maxlength="15" value = "" />
							<input name="mi_21_23" type="text" size="15" maxlength="15" value = "" />
							<input name="do_21_23" type="text" size="15" maxlength="15" value = "" />
							<input name="fr_21_23" type="text" size="15" maxlength="15" value = "" />
							<input name="sa_21_23" type="text" size="15" maxlength="15" value = "" />
							<input name="so_21_23" type="text" size="15" maxlength="15" value = "" />
						</div>
					</div>
					<div class="table">
				      <div class="spalte4">
				      	23:00 - 01:00 Uhr
						</div>
				      <div class="spalte02">
							<input name="mo_23_01" type="text" size="15" maxlength="15" value = "" />
							<input name="di_23_01" type="text" size="15" maxlength="15" value = "" />
							<input name="mi_23_01" type="text" size="15" maxlength="15" value = "" />
							<input name="do_23_01" type="text" size="15" maxlength="15" value = "" />
							<input name="fr_23_01" type="text" size="15" maxlength="15" value = "" />
							<input name="sa_23_01" type="text" size="15" maxlength="15" value = "" />
							<input name="so_23_01" type="text" size="15" maxlength="15" value = "" />
						</div>
					</div>
				</div>
					<h3>Unter welchen Umst&auml;nden k&ouml;nnen wir Dich als &Uuml;bungsleiter, Trainer oder Betreuer f&uuml;r den FSV gewinnen?</h3>
		            <div>
		            <div class="table">
					</div>
					<fieldset id = "uebungsleiter_nein_id">
						<input type="radio" name="uebungsleiter_betreuer" id = "kein_uebungsleiter:id" value="keine Angebote betreuen"
									onClick = "checkOptions()" />Ich m&ouml;chte keine Angebote betreuen<br /><br />
					</fieldset>
					<fieldset id = "uebungsleiter_ja_id">
						<input type="radio" name="uebungsleiter_betreuer" id = "uebungsleiter_id" value="Voraussetzungen"
									onClick = "checkOptions()" />Als &Uuml;bungsleiter w&uuml;nsche ich mir folgende Voraussetzungen:<br />
					<p>
					<div class="table">
						<div class="einrueckspalte">
						</div>
				      <div class="spalte02">
							<input type="checkbox" name="bezahlte_uebungsleiter_trainerausbildung" id = "bezahlte_uebungsleiter_trainerausbildung_id" 
									value="Bezahlte Uebungsleiter-/ Trainerausbildung"/>Bezahlte &Uuml;bungsleiter-/ Trainerausbildung<br />
						</div>
					</div>
					</p>
					<p>
					<div class="table">
				      <div class="einrueckspalte">
						</div>
				      <div class="spalte02">
							<input type="checkbox" name="regelmaessige_fortbildungsmoeglichkeiten" id="regelmaessige_fortbildungsmoeglichkeiten_id" 
									value="Regelmaessige Fortbildungsmoeglichkeiten" />Regelm&auml;&szlig;ige Fortbildungsm&ouml;glichkeiten<br />
						</div>
					</div>
					</p>
					<p>
					<div class="table">
				      <div class="einrueckspalte">
						</div>
				      <div class="spalte_3pos">
							<input type="checkbox" name = "bezahlte_uebungsleiterstunden" id = "bezahlte_uebungsleiterstunden_id" 
										value = "Bezahlte Uebungsleiterstunden" onClick = "uebungsleiterstundensatz()" />Bezahlte &Uuml;bungsleiterstunden&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="text" name = "stundensatz" id  = "stundensatz_id" size = "5" maxlength = "3" value = ""/>&nbsp;Euro / 60 min
						</div>
					</div>
					</p>
					<p>
					<div class="table">
				      <div class="einrueckspalte">
						</div>
				      <div class="spalte02">
							<input type="checkbox" name="kostenfreie_vereinsmitgliedschaft" id="kostenfreie_vereinsmitgliedschaft_id" 
										value="Kostenfreie Vereinsmitgliedschaft" />Kostenfreie Vereinsmitgliedschaft
						</div>
					</div>
					</p>
					<p>
					<div class="table">
				      <div class="einrueckspalte">
						</div>
				      <div class="spalte02">
							<input type="checkbox" name="begleitete_einarbeitungszeit" id="begleitete_einarbeitungszeit_id" 
										value="Begleitete Einarbeitungszeit" />Begleitete Einarbeitungszeit
						</div>
					</div>
					</p>
					<p>
					<div class="table">
				      <div class="einrueckspalte">
						</div>
				      <div class="spalte02">
							<input type="checkbox" name="verlaessliche_vertretungsregelung" id="verlaessliche_vertretungsregelung_id" 
										value="Verlaessliche Vertretungsregelung" />Verl&auml;ssliche Vertretungsregelung
						</div>
					</div>
					</p>
					<p>
					<div class="table">
				      <div class="einrueckspalte">
						</div>
				      <div class="spalte02">
							<input type="checkbox" name="betreuung_meiner_kinder_waehrend_der_trainingszeit" id="betreuung_meiner_kinder_waehrend_der_trainingszeit_id" 
										value="Betreuung meiner Kinder waehrend der Trainingszeit" />Betreuung meiner Kinder w&auml;hrend der Trainingszeit
						</div>
					</div>
					</p>
					<p>
					<div class="table">
				      <div class="einrueckspalte">
						</div>
				      <div class="spalte_3pos">
							Weitere Voraussetzungen:
							<input type="text" name="weitere_voraussetzungen_fuer_uebungsleiter" id="weitere_voraussetzungen_fuer_uebungsleiter_id" size="120" 
											maxlength="120" value = "" /><br /><br />							
						</div>
					</div>
					</p>
					</fieldset>
		          </div>
		            <h3>Was Du uns sonst noch mitteilen m&ouml;chtest...</h3>
		            <div>
		              <div class="spalte_l">
							</div>
					<div class="spalte02">
						<textarea name = "sonst_noch_mitteilung" cols = "87" rows = "10" wrap = "hard"></textarea><br /><br />
					</div>
		         </div>
					<h3>Verlosung</h3>
						<div>
						  <p>
							M&ouml;chtest Du an der Verlosung der Gutscheine f&uuml;r unsere Sportgastst&auml;tte teilnehmen? Dann trage hier noch Deine E-Mail-Adresse oder Telefonnummer ein. <br />
							Mit Deiner Teilnahme erkl&auml;rst Du Dich damit einverstanden, dass Dich der FSV Erlangen-Bruck im Falle des Gewinns &uuml;ber die von Dir vorgegebenen Kontaktdaten informiert. <br />
							Deine Kontaktdaten werden nur bis zur Bekanntgabe der Gewinner gespeichert. </br>
							Der Rechtsweg ist ausgeschlossen.</br></br>
						  </p>
					  <div class="table">
						<div class="spalte_l">
							Deine Kontaktdaten:
						</div>
						<div class="spalte02">
							<input name="kontaktdaten" type="text" size="64" value = "" />
				</div>
				</div>
			   </div>
				</div><br /></br></br>
				<div class = "abschlusstext">
					Du hast es geschafft!! Jetzt nur noch abschicken... </br><br />
			   </div>
					<p>
						<button type="submit" class="button button_Aktionen" name="fragebogen_abschicken">Fragebogen abschicken</button>&nbsp;&nbsp;
						<button type="submit" class="button button_Aktionen" name="abbruch">Abbruch und Ende der Session</button>
					</p>
				<br /><br />
			</form>
	<?php
		//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/
		}
		elseif ( isset ( $_POST['fragebogen_abschicken'] )) {

// 																								echo "<br />" . __LINE__  . "<br />";
// 																								var_dump($_POST);
// 																								echo "<br />" . __LINE__  . "<br />";
// 																								var_dump($_SERVER);

			//
			// Daten übernehmen und für Ablage in Datenbank aufbereiten
			$mein_alter = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mein_alter'] ) ) {
				$mein_alter = $_POST['mein_alter'];
			}

			$geschlecht = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['geschlecht'] ) ) {
						$geschlecht = $_POST['geschlecht'];
			}

			$wohnort = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['wohnort'] ) ) {
				$wohnort = $_POST['wohnort'];
			}

			$arbeit = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['arbeit'] ) ) {
				$arbeit = $_POST['arbeit'];
			}

			$mitglied = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mitglied'] ) ) {
				$mitglied = $_POST['mitglied'];
			}

			$austrittsgrund = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['austrittsgrund'] ) ) {
				$austrittsgrund = $_POST['austrittsgrund'];
			}

			$fsv_abteilungen = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['fsv_abteilungen'] ) ) {
				$fsv_abteilungen = $_POST['fsv_abteilungen'];
			}

			$gesundheit_wellness = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['gesundheit_wellness'] ) ) {
				$gesundheit_wellness = $_POST['gesundheit_wellness'];
			}

			$sport_fitness = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['sport_fitness'] ) ) {
				$sport_fitness = $_POST['sport_fitness'];
			}

			$leistungsorientierung_wettkampf = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['leistungsorientierung_wettkampf'] ) ) {
				$leistungsorientierung_wettkampf = $_POST['leistungsorientierung_wettkampf'];
			}

			$freizeit_geselligkeit = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['freizeit_geselligkeit'] ) ) {
				$freizeit_geselligkeit = $_POST['freizeit_geselligkeit'];
			}

			$angebote_fuer_jung_alt = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['angebote_fuer_jung_alt'] ) ) {
				$angebote_fuer_jung_alt = $_POST['angebote_fuer_jung_alt'];
			}

			$zeitlich_befristete_kursangebote = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['zeitlich_befristete_kursangebote'] ) ) {
				$zeitlich_befristete_kursangebote = $_POST['zeitlich_befristete_kursangebote'];
			}

			$regelmaessiges_training = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['regelmaessiges_training'] ) ) {
				$regelmaessiges_training = $_POST['regelmaessiges_training'];
			}

			$angebote_direkt_am_vereinsgelaende = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['angebote_direkt_am_vereinsgelaende'] ) ) {
				$angebote_direkt_am_vereinsgelaende = $_POST['angebote_direkt_am_vereinsgelaende'];
			}

			$vielfaeltiges_angebot = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['vielfaeltiges_angebot'] ) ) {
				$vielfaeltiges_angebot = $_POST['vielfaeltiges_angebot'];
			}

			$qualifizierte_uebungsleiter_und_trainer = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['qualifizierte_uebungsleiter_und_trainer'] ) ) {
				$qualifizierte_uebungsleiter_und_trainer = $_POST['qualifizierte_uebungsleiter_und_trainer'];
			}

			$preisguenstiger_mitgliedsbeitrag = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['preisguenstiger_mitgliedsbeitrag'] ) ) {
				$preisguenstiger_mitgliedsbeitrag = $_POST['preisguenstiger_mitgliedsbeitrag'];
			}

			$was_ist_dir_sonst_noch_wichtig = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['was_ist_dir_sonst_noch_wichtig'] ) ) {
				$was_ist_dir_sonst_noch_wichtig = $_POST['was_ist_dir_sonst_noch_wichtig'];
			}

			$physiotherapie = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['physiotherapie'] ) ) {
				$physiotherapie = ANGEKREUZT;
			}

			$personal_training = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['personal_training'] ) ) {
				$personal_training = ANGEKREUZT;
			}

			$massage = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['massage'] ) ) {
				$massage = ANGEKREUZT;
			}

			$ernaehrungsberatung = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['ernaehrungsberatung'] ) ) {
				$ernaehrungsberatung = ANGEKREUZT;
			}

			$fahrdienst = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['fahrdienst'] ) ) {
				$fahrdienst = ANGEKREUZT;
			}

			$spielplatz = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['spielplatz'] ) ) {
				$spielplatz = ANGEKREUZT;
			}

			$ferienangebote_camps = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['ferienangebote_camps'] ) ) {
				$ferienangebote_camps = ANGEKREUZT;
			}

			$sportkindergarten_hort = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['sportkindergarten_hort'] ) ) {
				$sportkindergarten_hort = ANGEKREUZT;
			}

			$jugendclub_nachmittagsbetreuung = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['jugendclub_nachmittagsbetreuung'] ) ) {
				$jugendclub_nachmittagsbetreuung = ANGEKREUZT;
			}

			$grosseltern_kind_angebote = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['grosseltern_kind_angebote'] ) ) {
				$grosseltern_kind_angebote = ANGEKREUZT;
			}

			$kinderbetreuung = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['kinderbetreuung'] ) ) {
				$kinderbetreuung = ANGEKREUZT;
			}

			$feiern_und_veranstaltungen = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['feiern_und_veranstaltungen'] ) ) {
				$feiern_und_veranstaltungen = ANGEKREUZT;
			}

			$public_viewing = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['public_viewing'] ) ) {
				$public_viewing = ANGEKREUZT;
			}
			
			$musik_und_kulturveranstaltungen = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['musik_und_kulturveranstaltungen'] ) ) {
				$musik_und_kulturveranstaltungen = ANGEKREUZT;
			}
			
			$weitere_angebote = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['weitere_angebote'] ) ) {
				$weitere_angebote = $_POST['weitere_angebote'];
			}

			//
			// Vereinsgaststätte
			$guenstige_preise_gast = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['guenstige_preise_gast'] ) ) {
				$guenstige_preise_gast = $_POST['guenstige_preise_gast'];
			}

			$schnelle_kueche = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['schnelle_kueche'] ) ) {
				$schnelle_kueche = $_POST['schnelle_kueche'];
			}

			$bio_qualitaet = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['bio_qualitaet'] ) ) {
				$bio_qualitaet = $_POST['bio_qualitaet'];
			}

			$vegetarische_vegane_gerichte = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['vegetarische_vegane_gerichte'] ) ) {
				$vegetarische_vegane_gerichte = $_POST['vegetarische_vegane_gerichte'];
			}

			$vielfaeltiges_speisenangebot = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['vielfaeltiges_speisenangebot'] ) ) {
				$vielfaeltiges_speisenangebot = $_POST['vielfaeltiges_speisenangebot'];
			}

			$fruehstuecksangebot_brunch = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['fruehstuecksangebot_brunch'] ) ) {
				$fruehstuecksangebot_brunch = $_POST['fruehstuecksangebot_brunch'];
			}

			$blick_auf_indoor_sportbereich = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['blick_auf_indoor_sportbereich'] ) ) {
						$blick_auf_indoor_sportbereich = $_POST['blick_auf_indoor_sportbereich'];
			}

			$kinderecke = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['kinderecke'] ) ) {
				$kinderecke = $_POST['kinderecke'];
			}

			$spielmoeglichkeiten_im_gastro_bereich = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['spielmoeglichkeiten_im_gastro_bereich'] ) ) {
				$spielmoeglichkeiten_im_gastro_bereich = $_POST['spielmoeglichkeiten_im_gastro_bereich'];
			}

			$ruhige_atmosphaere_beim_essen = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['ruhige_atmosphaere_beim_essen'] ) ) {
				$ruhige_atmosphaere_beim_essen = $_POST['ruhige_atmosphaere_beim_essen'];
			}

			$biergarten_aussenterrasse = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['biergarten_aussenterrasse'] ) ) {
				$biergarten_aussenterrasse = $_POST['biergarten_aussenterrasse'];
			}

			$uebertragung_von_sportereignissen = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['uebertragung_von_sportereignissen'] ) ) {
				$uebertragung_von_sportereignissen = $_POST['uebertragung_von_sportereignissen'];
			}

			$lieferdienst = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['lieferdienst'] ) ) {
				$lieferdienst = $_POST['lieferdienst'];
			}

			$was_ist_dir_noch_wichtig_gaststaette = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['was_ist_dir_noch_wichtig_gaststaette'] ) ) {
				$was_ist_dir_noch_wichtig_gaststaette = $_POST['was_ist_dir_noch_wichtig_gaststaette'];
			}

			//
			// Fitness
			$aerobic_zumba_jazz_dance = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['aerobic_zumba_jazz_dance'] ) ) {
				$aerobic_zumba_jazz_dance = $_POST['aerobic_zumba_jazz_dance'];
			}

			$aqua_fitness = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['aqua_fitness'] ) ) {
				$aqua_fitness = $_POST['aqua_fitness'];
			}

			$body_workout_fitnesskurse = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['body_workout_fitnesskurse'] ) ) {
				$body_workout_fitnesskurse = $_POST['body_workout_fitnesskurse'];
			}

			$ems_training = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['ems_training'] ) ) {
				$ems_training = $_POST['ems_training'];
			}

			$indoor_cycling_spinning= NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['herz_kreislauftraining'] ) ) {
				$indoor_cycling_spinning= $_POST['herz_kreislauftraining'];
			}

			$kraftraum_fitnessgeraete = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['kraftraum_fitnessgeraete'] ) ) {
				$kraftraum_fitnessgeraete = $_POST['kraftraum_fitnessgeraete'];
			}

			$laufgruppe = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['laufgruppe'] ) ) {
				$laufgruppe = $_POST['laufgruppe'];
			}

			$nordicwalking = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['nordicwalking'] ) ) {
				$nordicwalking = $_POST['nordicwalking'];
			}

			$weitere_fitnessangebote = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['weitere_fitnessangebote'] ) ) {
				$weitere_fitnessangebote = $_POST['weitere_fitnessangebote'];
			}

			//
			// Gesundheit & Wellness
			$entspannungskurse_autogenes_training = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['entspannungskurse_autogenes_training'] ) ) {
				$entspannungskurse_autogenes_training = $_POST['entspannungskurse_autogenes_training'];
			}

			$faszientraining = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['faszientraining'] ) ) {
				$faszientraining = $_POST['faszientraining'];
			}

			$feldenkrais = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['feldenkrais'] ) ) {
				$feldenkrais = $_POST['feldenkrais'];
			}

			$herz_kreislauftraining = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['herz_kreislauftraining'] ) ) {
				$herz_kreislauftraining = $_POST['herz_kreislauftraining'];
			}

			$meditation = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['meditation'] ) ) {
				$meditation =  $_POST['meditation'];
			}

			$qigong_yoga_pilates = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['qigong_yoga_pilates'] ) ) {
				$qigong_yoga_pilates = $_POST['qigong_yoga_pilates'];
			}

			$reha_sport = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['reha_sport'] ) ) {
				$reha_sport = $_POST['reha_sport'];
			}

			$sauna = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['sauna'] ) ) {
				$sauna = $_POST['sauna'];
			}

			$wirbelsaeulengymnastik_rueckenschule = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['wirbelsaeulengymnastik_rueckenschule'] ) ) {
				$wirbelsaeulengymnastik_rueckenschule = $_POST['wirbelsaeulengymnastik_rueckenschule'];
			}

			$weitere_gesundheits_und_wellness_angebote = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['weitere_gesundheits_und_wellness_angebote'] ) ) {
				$weitere_gesundheits_und_wellness_angebote = $_POST['weitere_gesundheits_und_wellness_angebote'];
			}

			//
			// Trendsportarten
			$cheerleading = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['cheerleading'] ) ) {
				$cheerleading = $_POST['cheerleading'];
			}

			$fussballtennis = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['fussballtennis'] ) ) {
				$fussballtennis = $_POST['fussballtennis'];
			}

			$jugger = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['jugger'] ) ) {
				$jugger = $_POST['jugger'];
			}

			$lasertag = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['lasertag'] ) ) {
				$lasertag = $_POST['lasertag'];
			}

			$paintball = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['paintball'] ) ) {
				$paintball = $_POST['paintball'];
			}

			$parcouring = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['parcouring'] ) ) {
				$parcouring = $_POST['parcouring'];
			}

			$speedminton = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['speedminton'] ) ) {
				$speedminton = $_POST['speedminton'];
			}

			$ultimate_frisbee = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['ultimate_frisbee'] ) ) {
				$ultimate_frisbee = $_POST['ultimate_frisbee'];
			}

			$weitere_trendsportarten = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['weitere_trendsportarten'] ) ) {
				$weitere_trendsportarten = $_POST['weitere_trendsportarten'];
			}

			//
			// Individualsportarten
			$bouldern = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['bouldern'] ) ) {
				$bouldern = $_POST['bouldern'];
			}

			$inlineskaten = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['inlineskaten'] ) ) {
				$inlineskaten = $_POST['inlineskaten'];
			}

			$intuitives_bogenschiessen = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['intuitives_bogenschiessen'] ) ) {
				$intuitives_bogenschiessen = $_POST['intuitives_bogenschiessen'];
			}

			$karate = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['karate'] ) ) {
				$karate = $_POST['karate'];
			}

			$minigolf = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['minigolf'] ) ) {
				$minigolf = $_POST['minigolf'];
			}

			$schwimmen_schwimmkurse = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['schwimmen_schwimmkurse'] ) ) {
				$schwimmen_schwimmkurse = $_POST['schwimmen_schwimmkurse'];
			}

			$selbstverteidigung = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['selbstverteidigung'] ) ) {
				$selbstverteidigung = $_POST['selbstverteidigung'];
			}

			$turnen_gymnastik  = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['turnen_gymnastik'] ) ) {
				$turnen_gymnastik  = $_POST['turnen_gymnastik'];
			}

			$weitere_individualsportarten = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['weitere_individualsportarten'] ) ) {
				$weitere_individualsportarten = $_POST['weitere_individualsportarten'];
			}

			//
			// Mannschaftssportarten
			$american_football = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['american_football'] ) ) {
				$american_football = $_POST['american_football'];
			}

			$aqua_ball = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['faszientraining'] ) ) {
				$faszientraining = $_POST['faszientraining'];
			}

			$baseball = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['baseball'] ) ) {
				$baseball = $_POST['baseball'];
			}

			$beachvolleyball = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['beachvolleyball'] ) ) {
				$beachvolleyball = $_POST['beachvolleyball'];
			}

			$fussball = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['fussball'] ) ) {
				$fussball = $_POST['fussball'];
			}

			$handball = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['handball'] ) ) {
				$handball = $_POST['handball'];
			}

			$rugby = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['rugby'] ) ) {
				$rugby = $_POST['rugby'];
			}

			$volleyball = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['volleyball'] ) ) {
				$volleyball = $_POST['volleyball'];
			}

			$weitere_mannschaftssportarten = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['weitere_mannschaftssportarten'] ) ) {
				$weitere_mannschaftssportarten = $_POST['weitere_mannschaftssportarten'];
			}

			//
			// Sportangebote für Kinder
			$akrobatik = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['akrobatik'] ) ) {
				$akrobatik = $_POST['akrobatik'];
			}

			$einradfahren = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['einradfahren'] ) ) {
				$einradfahren = $_POST['einradfahren'];
			}

			$kinder_ballschule = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['kinder_ballschule'] ) ) {
				$kinder_ballschule = $_POST['kinder_ballschule'];
			}

			$kiss_kindersportschule = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['kiss_kindersportschule'] ) ) {
				$kiss_kindersportschule = $_POST['kiss_kindersportschule'];
			}

			$kinderturnen_eltern_kind_turnen = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['kinderturnen_eltern_kind_turnen'] ) ) {
				$kinderturnen_eltern_kind_turnen = $_POST['kinderturnen_eltern_kind_turnen'];
			}

			$kommunikation_selbstbehauptung_selbstschutz = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['kommunikation_selbstbehauptung_selbstschutz'] ) ) {
				$kommunikation_selbstbehauptung_selbstschutz = $_POST['kommunikation_selbstbehauptung_selbstschutz'];
			}

			$spiel_sport_und_spass = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['spiel_sport_und_spass'] ) ) {
				$spiel_sport_und_spass = $_POST['spiel_sport_und_spass'];
			}

			$schwimmkurse_kinderschwimmen = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['schwimmkurse_kinderschwimmen'] ) ) {
				$schwimmkurse_kinderschwimmen = $_POST['schwimmkurse_kinderschwimmen'];
			}

			$weitere_sportangebote_fuer_kinder = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['weitere_sportangebote_fuer_kinder'] ) ) {
				$weitere_sportangebote_fuer_kinder = $_POST['weitere_sportangebote_fuer_kinder'];
			}

			//
			// Sportspiele
			$badminton = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['badminton'] ) ) {
				$badminton = $_POST['badminton'];
			}

			$billard = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['billard'] ) ) {
				$billard = $_POST['billard'];
			}

			$bowling = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['bowling'] ) ) {
				$bowling = $_POST['bowling'];
			}

			$dart = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['dart'] ) ) {
				$dart = $_POST['dart'];
			}

			$kegeln_sportkegeln = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['kegeln_sportkegeln'] ) ) {
				$kegeln_sportkegeln = $_POST['kegeln_sportkegeln'];
			}

			$kickern = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['kickern'] ) ) {
				$kickern = $_POST['kickern'];
			}

			$moelkky = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['moelkky'] ) ) {
				$moelkky = $_POST['moelkky'];
			}

			$tennis = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['tennis'] ) ) {
				$tennis = $_POST['tennis'];
			}

			$tischtennis = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['tischtennis'] ) ) {
				$tischtennis = $_POST['tischtennis'];
			}

			$weitere_sportspiele = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['weitere_sportspiele'] ) ) {
				$weitere_sportspiele = $_POST['weitere_sportspiele'];
			}

			//
			// Vereinssport- und -freizeitplan
			$mo_05_07 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mo_05_07'] ) ) {
				$mo_05_07 = $_POST['mo_05_07'];
			}

			$di_05_07 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['di_05_07'] ) ) {
				$di_05_07 = $_POST['di_05_07'];
			}

			$mi_05_07 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mi_05_07'] ) ) {
				$mi_05_07 = $_POST['mi_05_07'];
			}

			$do_05_07 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['do_05_07'] ) ) {
				$do_05_07 = $_POST['do_05_07'];
			}

			$fr_05_07 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['fr_05_07'] ) ) {
				$fr_05_07 = $_POST['fr_05_07'];
			}

			$sa_05_07 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['sa_05_07'] ) ) {
				$sa_05_07 = $_POST['sa_05_07'];
			}

			$so_05_07 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['so_05_07'] ) ) {
				$so_05_07 = $_POST['so_05_07'];
			}

			$mo_07_09 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mo_07_09'] ) ) {
				$mo_07_09 = $_POST['mo_07_09'];
			}

			$di_07_09 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['di_07_09'] ) ) {
				$di_07_09 = $_POST['di_07_09'];
			}

			$mi_07_09 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mi_07_09'] ) ) {
				$mi_07_09 = $_POST['mi_07_09'];
			}

			$do_07_09 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['do_07_09'] ) ) {
				$do_07_09 = $_POST['do_07_09'];
			}

			$fr_07_09 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['fr_07_09'] ) ) {
				$fr_07_09 = $_POST['fr_07_09'];
			}

			$sa_07_09 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['sa_07_09'] ) ) {
				$sa_07_09 = $_POST['sa_07_09'];
			}

			$so_07_09 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['so_07_09'] ) ) {
				$so_07_09 = $_POST['so_07_09'];
			}

			$mo_09_11 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mo_09_11'] ) ) {
				$mo_09_11 = $_POST['mo_09_11'];
			}

			$di_09_11 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['di_09_11'] ) ) {
				$di_09_11 = $_POST['di_09_11'];
			}

			$mi_09_11 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mi_09_11'] ) ) {
				$mi_09_11 = $_POST['mi_09_11'];
			}

			$do_09_11 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['do_09_11'] ) ) {
				$do_09_11 = $_POST['do_09_11'];
			}

			$fr_09_11 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['fr_09_11'] ) ) {
				$fr_09_11 = $_POST['fr_09_11'];
			}

			$sa_09_11 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['sa_09_11'] ) ) {
				$sa_09_11 = $_POST['sa_09_11'];
			}

			$so_09_11 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['so_09_11'] ) ) {
				$so_09_11 = $_POST['so_09_11'];
			}

			$mo_11_13 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mo_11_13'] ) ) {
				$mo_11_13 = $_POST['mo_11_13'];
			}

			$di_11_13 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['di_11_13'] ) ) {
				$di_11_13 = $_POST['di_11_13'];
			}

			$mi_11_13 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mi_11_13'] ) ) {
				$mi_11_13 = $_POST['mi_11_13'];
			}

			$do_11_13 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['do_11_13'] ) ) {
				$do_11_13 = $_POST['do_11_13'];
			}

			$fr_11_13 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['fr_11_13'] ) ) {
				$fr_11_13 = $_POST['fr_11_13'];
			}

			$sa_11_13 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['sa_11_13'] ) ) {
				$sa_11_13 = $_POST['sa_11_13'];
			}

			$so_11_13 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['so_11_13'] ) ) {
				$so_11_13 = $_POST['so_11_13'];
			}

			$mo_13_15 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mo_13_15'] ) ) {
				$mo_13_15 = $_POST['mo_13_15'];
			}

			$di_13_15 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['di_13_15'] ) ) {
				$di_13_15 = $_POST['di_13_15'];
			}

			$mi_13_15 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mi_13_15'] ) ) {
				$mi_13_15 = $_POST['mi_13_15'];
			}

			$do_13_15 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['do_13_15'] ) ) {
				$do_13_15 = $_POST['do_13_15'];
			}

			$fr_13_15 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['fr_13_15'] ) ) {
				$fr_13_15 = $_POST['fr_13_15'];
			}

			$sa_13_15 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['sa_13_15'] ) ) {
				$sa_13_15 = $_POST['sa_13_15'];
			}

			$so_13_15 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['so_13_15'] ) ) {
				$so_13_15 = $_POST['so_13_15'];
			}

			$mo_15_17 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mo_15_17'] ) ) {
				$mo_15_17 = $_POST['mo_15_17'];
			}

			$di_15_17 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['di_15_17'] ) ) {
				$di_15_17 = $_POST['di_15_17'];
			}

			$mi_15_17 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mi_15_17'] ) ) {
				$mi_15_17 = $_POST['mi_15_17'];
			}

			$do_15_17 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['do_15_17'] ) ) {
				$do_15_17 = $_POST['do_15_17'];
			}

			$fr_15_17 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['fr_15_17'] ) ) {
				$fr_15_17 = $_POST['fr_15_17'];
			}

			$sa_15_17 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['sa_15_17'] ) ) {
				$sa_15_17 = $_POST['sa_15_17'];
			}

			$so_15_17 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['so_15_17'] ) ) {
				$so_15_17 = $_POST['so_15_17'];
			}

			$mo_17_19 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mo_17_19'] ) ) {
				$mo_17_19 = $_POST['mo_17_19'];
			}

			$di_17_19 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['di_17_19'] ) ) {
				$di_17_19 = $_POST['di_17_19'];
			}

			$mi_17_19 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mi_17_19'] ) ) {
				$mi_17_19 = $_POST['mi_17_19'];
			}

			$do_17_19 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['do_17_19'] ) ) {
				$do_17_19 = $_POST['do_17_19'];
			}

			$fr_17_19 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['fr_17_19'] ) ) {
				$fr_17_19 = $_POST['fr_17_19'];
			}

			$sa_17_19 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['sa_17_19'] ) ) {
				$sa_17_19 = $_POST['sa_17_19'];
			}

			$so_17_19 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['so_17_19'] ) ) {
				$so_17_19 = $_POST['so_17_19'];
			}

			$mo_19_21 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mo_19_21'] ) ) {
				$mo_19_21 = $_POST['mo_19_21'];
			}

			$di_19_21 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['di_19_21'] ) ) {
				$di_19_21 = $_POST['di_19_21'];
			}

			$mi_19_21 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mi_19_21'] ) ) {
				$mi_19_21 = $_POST['mi_19_21'];
			}

			$do_19_21 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['do_19_21'] ) ) {
				$do_19_21 = $_POST['do_19_21'];
			}

			$fr_19_21 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['fr_19_21'] ) ) {
				$fr_19_21 = $_POST['fr_19_21'];
			}

			$sa_19_21 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['sa_19_21'] ) ) {
				$sa_19_21 = $_POST['sa_19_21'];
			}

			$so_19_21 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['so_19_21'] ) ) {
				$so_19_21 = $_POST['so_19_21'];
			}

			$mo_21_23 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mo_21_23'] ) ) {
				$mo_21_23 = $_POST['mo_21_23'];
			}

			$di_21_23 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['di_21_23'] ) ) {
				$di_21_23 = $_POST['di_21_23'];
			}

			$mi_21_23 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mi_21_23'] ) ) {
				$mi_21_23 = $_POST['mi_21_23'];
			}

			$do_21_23 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['do_21_23'] ) ) {
				$do_21_23 = $_POST['do_21_23'];
			}

			$fr_21_23 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['fr_21_23'] ) ) {
				$fr_21_23 = $_POST['fr_21_23'];
			}

			$sa_21_23 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['sa_21_23'] ) ) {
				$sa_21_23 = $_POST['sa_21_23'];
			}

			$so_21_23 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['so_21_23'] ) ) {
				$so_21_23 = $_POST['so_21_23'];
			}

			$mo_23_01 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mo_23_01'] ) ) {
				$mo_23_01 = $_POST['mo_23_01'];
			}

			$di_23_01 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['di_23_01'] ) ) {
				$di_23_01 = $_POST['di_23_01'];
			}

			$mi_23_01 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['mi_23_01'] ) ) {
				$mi_23_01 = $_POST['mi_23_01'];
			}

			$do_23_01 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['do_23_01'] ) ) {
				$do_23_01 = $_POST['do_23_01'];
			}

			$fr_23_01 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['fr_23_01'] ) ) {
				$fr_23_01 = $_POST['fr_23_01'];
			}

			$sa_23_01 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['sa_23_01'] ) ) {
				$sa_23_01 = $_POST['sa_23_01'];
			}

			$so_23_01 = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['so_23_01'] ) ) {
				$so_23_01 = $_POST['so_23_01'];
			}

			//
			// Übungsleiter, Trainer oder Betreuer für den FSV 
			$uebungsleiter_betreuer = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['uebungsleiter_betreuer'] ) ) {
				$uebungsleiter_betreuer = ANGEKREUZT;
			}
			if ( $uebungsleiter_betreuer != ANGEKREUZT ) {
				$bezahlte_uebungsleiter_trainerausbildung = NICHT_AUSGEFUELLT;
				$regelmaessige_fortbildungsmoeglichkeiten = NICHT_AUSGEFUELLT;
				$bezahlte_uebungsleiterstunden = NICHT_AUSGEFUELLT;
				$stundensatz = "";
				$kostenfreie_vereinsmitgliedschaft = NICHT_AUSGEFUELLT;
				$begleitete_einarbeitungszeit = NICHT_AUSGEFUELLT;
				$verlaessliche_vertretungsregelung = NICHT_AUSGEFUELLT;
				$betreuung_meiner_kinder_waehrend_der_trainingszeit = NICHT_AUSGEFUELLT;
				$weitere_voraussetzungen = "";
			}

			$bezahlte_uebungsleiter_trainerausbildung = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['bezahlte_uebungsleiter_trainerausbildung'] ) ) {
				$bezahlte_uebungsleiter_trainerausbildung = ANGEKREUZT;
			}

			$regelmaessige_fortbildungsmoeglichkeiten = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['regelmaessige_fortbildungsmoeglichkeiten'] ) ) {
				$regelmaessige_fortbildungsmoeglichkeiten = ANGEKREUZT;
			}

			$bezahlte_uebungsleiterstunden = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['bezahlte_uebungsleiterstunden'] ) ) {
				$bezahlte_uebungsleiterstunden = ANGEKREUZT;
				$stundensatz = NICHT_AUSGEFUELLT;
				if ( isset ( $_POST['stundensatz'] ) ) {
					$stundensatz = $_POST['stundensatz'] ;
				}
			}

			$kostenfreie_vereinsmitgliedschaft = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['kostenfreie_vereinsmitgliedschaft'] ) ) {
				$kostenfreie_vereinsmitgliedschaft = ANGEKREUZT;
			}

			$begleitete_einarbeitungszeit = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['begleitete_einarbeitungszeit'] ) ) {
				$begleitete_einarbeitungszeit = ANGEKREUZT;
			}

			$verlaessliche_vertretungsregelung = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['verlaessliche_vertretungsregelung'] ) ) {
				$verlaessliche_vertretungsregelung = ANGEKREUZT;
			}

			$betreuung_meiner_kinder_waehrend_der_trainingszeit = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['betreuung_meiner_kinder_waehrend_der_trainingszeit'] ) ) {
				$betreuung_meiner_kinder_waehrend_der_trainingszeit = ANGEKREUZT;
			}

			$weitere_voraussetzungen = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['weitere_voraussetzungen'] ) ) {
				$weitere_voraussetzungen = $_POST['weitere_voraussetzungen'];
			}

			$weitere_voraussetzungen_fuer_uebungsleiter = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['weitere_voraussetzungen_fuer_uebungsleiter'] ) ) {
				$weitere_voraussetzungen_fuer_uebungsleiter = ANGEKREUZT;
			}

			$sonst_noch_mitteilung = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['sonst_noch_mitteilung'] ) ) {
				$sonst_noch_mitteilung = $_POST['sonst_noch_mitteilung'];
			}

			$kontaktdaten = NICHT_AUSGEFUELLT;
			if ( isset ( $_POST['kontaktdaten'] ) ) {
				$kontaktdaten = $_POST['kontaktdaten'];
			}

			//
			// Transfer der erfassten Daten in die Datenbank
			$sql = "INSERT INTO tab_fsv_umfrage
												(	mein_alter, geschlecht, wohnort, arbeit, mitglied, austrittsgrund, fsv_abteilungen,
													gesundheit_wellness, sport_fitness, leistungsorientierung_wettkampf, freizeit_geselligkeit, angebote_fuer_jung_alt, zeitlich_befristete_kursangebote, regelmaessiges_training, angebote_direkt_am_vereinsgelaende, vielfaeltiges_angebot, qualifizierte_uebungsleiter_und_trainer, preisguenstiger_mitgliedsbeitrag, was_ist_dir_sonst_noch_wichtig,
													physiotherapie, personal_training, massage, ernaehrungsberatung, fahrdienst, spielplatz, ferienangebote_camps, sportkindergarten_hort, jugendclub_nachmittagsbetreuung, kinderbetreuung, feiern_und_veranstaltungen, public_viewing, musik_und_kulturveranstaltungen, weitere_angebote,
													guenstige_preise_gast, schnelle_kueche, bio_qualitaet, vegetarische_vegane_gerichte, vielfaeltiges_speisenangebot, fruehstuecksangebot_brunch, blick_auf_indoor_sportbereich, kinderecke, spielmoeglichkeiten_im_gastro_bereich, ruhige_atmosphaere_beim_essen, biergarten_aussenterrasse, uebertragung_von_sportereignissen, lieferdienst, was_ist_dir_noch_wichtig_gaststaette,
													aerobic_zumba_jazz_dance, aqua_fitness, body_workout_fitnesskurse, ems_training, indoor_cycling_spinning, kraftraum_fitnessgeraete, laufgruppe, nordicwalking, weitere_fitnessangebote,
													entspannungskurse_autogenes_training, faszientraining, feldenkrais, herz_kreislauftraining, meditation, qigong_yoga_pilates, reha_sport, sauna, wirbelsaeulengymnastik_rueckenschule, weitere_gesundheits_und_wellness_angebote,
													cheerleading, fussballtennis, jugger, lasertag, paintball, parcouring, speedminton, ultimate_frisbee, weitere_trendsportarten,
													bouldern, inlineskaten, intuitives_bogenschiessen, karate, minigolf, schwimmen_schwimmkurse, selbstverteidigung, turnen_gymnastik, weitere_individualsportarten,
													american_football, aqua_ball, baseball, beachvolleyball, fussball, handball, rugby, volleyball, weitere_mannschaftssportarten,
													akrobatik, einradfahren, kinder_ballschule, kiss_kindersportschule, kinderturnen_eltern_kind_turnen, kommunikation_selbstbehauptung_selbstschutz, spiel_sport_und_spass, schwimmkurse_kinderschwimmen, weitere_sportangebote_fuer_kinder,
													badminton, billard, bowling, dart, kegeln_sportkegeln, kickern, moelkky, tennis, tischtennis, weitere_sportspiele,
													mo_05_07, di_05_07, mi_05_07, do_05_07, fr_05_07, sa_05_07, so_05_07,
													mo_07_09, di_07_09, mi_07_09, do_07_09, fr_07_09, sa_07_09, so_07_09,
													mo_09_11, di_09_11, mi_09_11, do_09_11, fr_09_11, sa_09_11, so_09_11,
													mo_11_13, di_11_13, mi_11_13, do_11_13, fr_11_13, sa_11_13, so_11_13,
													mo_13_15, di_13_15, mi_13_15, do_13_15, fr_13_15, sa_13_15, so_13_15,
													mo_15_17, di_15_17, mi_15_17, do_15_17, fr_15_17, sa_15_17, so_15_17,
													mo_17_19, di_17_19, mi_17_19, do_17_19, fr_17_19, sa_17_19, so_17_19,
													mo_19_21, di_19_21, mi_19_21, do_19_21, fr_19_21, sa_19_21, so_19_21,
													mo_21_23, di_21_23, mi_21_23, do_21_23, fr_21_23, sa_21_23, so_21_23,
													mo_23_01, di_23_01, mi_23_01, do_23_01, fr_23_01, sa_23_01, so_23_01,
													uebungsleiter_betreuer, bezahlte_uebungsleiter_trainerausbildung, regelmaessige_fortbildungsmoeglichkeiten, bezahlte_uebungsleiterstunden, stundensatz, kostenfreie_vereinsmitgliedschaft, begleitete_einarbeitungszeit, verlaessliche_vertretungsregelung, betreuung_meiner_kinder_waehrend_der_trainingszeit, weitere_voraussetzungen, 
													weitere_voraussetzungen_fuer_uebungsleiter, sonst_noch_mitteilung
												)
											VALUES 	
												( 	'$mein_alter', '$geschlecht', '$wohnort', '$arbeit', '$mitglied', '$austrittsgrund', '$fsv_abteilungen',
													'$gesundheit_wellness', '$sport_fitness', '$leistungsorientierung_wettkampf', '$freizeit_geselligkeit', '$angebote_fuer_jung_alt', '$zeitlich_befristete_kursangebote', '$regelmaessiges_training', '$angebote_direkt_am_vereinsgelaende', '$vielfaeltiges_angebot', '$qualifizierte_uebungsleiter_und_trainer', '$preisguenstiger_mitgliedsbeitrag', '$was_ist_dir_sonst_noch_wichtig',
													'$physiotherapie', '$personal_training', '$massage', '$ernaehrungsberatung', '$fahrdienst', '$spielplatz', '$ferienangebote_camps', '$sportkindergarten_hort', '$jugendclub_nachmittagsbetreuung', '$kinderbetreuung', '$feiern_und_veranstaltungen', '$public_viewing', '$musik_und_kulturveranstaltungen', '$weitere_angebote',
													'$guenstige_preise_gast', '$schnelle_kueche', '$bio_qualitaet', '$vegetarische_vegane_gerichte', '$vielfaeltiges_speisenangebot', '$fruehstuecksangebot_brunch', '$blick_auf_indoor_sportbereich', '$kinderecke', '$spielmoeglichkeiten_im_gastro_bereich', '$ruhige_atmosphaere_beim_essen', '$biergarten_aussenterrasse', '$uebertragung_von_sportereignissen', '$lieferdienst', '$was_ist_dir_noch_wichtig_gaststaette',
													'$aerobic_zumba_jazz_dance', '$aqua_fitness', '$body_workout_fitnesskurse', '$ems_training', '$indoor_cycling_spinning', '$kraftraum_fitnessgeraete', '$laufgruppe', '$nordicwalking', '$weitere_fitnessangebote',
													'$entspannungskurse_autogenes_training', '$faszientraining', '$feldenkrais', '$herz_kreislauftraining', '$meditation', '$qigong_yoga_pilates', '$reha_sport', '$sauna', '$wirbelsaeulengymnastik_rueckenschule', '$weitere_gesundheits_und_wellness_angebote',
													'$cheerleading', '$fussballtennis', '$jugger', '$lasertag', '$paintball', '$parcouring', '$speedminton', '$ultimate_frisbee', '$weitere_trendsportarten', '$bouldern', '$inlineskaten', '$intuitives_bogenschiessen', '$karate', '$minigolf', '$schwimmen_schwimmkurse', '$selbstverteidigung', '$turnen_gymnastik', '$weitere_individualsportarten',
													'$american_football', '$aqua_ball', '$baseball', '$beachvolleyball', '$fussball', '$handball', '$rugby', '$volleyball', '$weitere_mannschaftssportarten',
													'$akrobatik', '$einradfahren', '$kinder_ballschule', '$kiss_kindersportschule', '$kinderturnen_eltern_kind_turnen', '$kommunikation_selbstbehauptung_selbstschutz', '$spiel_sport_und_spass', '$schwimmkurse_kinderschwimmen', '$weitere_sportangebote_fuer_kinder',
													'$badminton', '$billard', '$bowling', '$dart', '$kegeln_sportkegeln', '$kickern', '$moelkky', '$tennis', '$tischtennis', '$weitere_sportspiele',
													'$mo_05_07', '$di_05_07', '$mi_05_07', '$do_05_07', '$fr_05_07', '$sa_05_07', '$so_05_07',
													'$mo_07_09', '$di_07_09', '$mi_07_09', '$do_07_09', '$fr_07_09', '$sa_07_09', '$so_07_09',
													'$mo_09_11', '$di_09_11', '$mi_09_11', '$do_09_11', '$fr_09_11', '$sa_09_11', '$so_09_11',
													'$mo_11_13', '$di_11_13', '$mi_11_13', '$do_11_13', '$fr_11_13', '$sa_11_13', '$so_11_13',
													'$mo_13_15', '$di_13_15', '$mi_13_15', '$do_13_15', '$fr_13_15', '$sa_13_15', '$so_13_15',
													'$mo_15_17', '$di_15_17', '$mi_15_17', '$do_15_17', '$fr_15_17', '$sa_15_17', '$so_15_17',
													'$mo_17_19', '$di_17_19', '$mi_17_19', '$do_17_19', '$fr_17_19', '$sa_17_19', '$so_17_19',
													'$mo_19_21', '$di_19_21', '$mi_19_21', '$do_19_21', '$fr_19_21', '$sa_19_21', '$so_19_21',
													'$mo_21_23', '$di_21_23', '$mi_21_23', '$do_21_23', '$fr_21_23', '$sa_21_23', '$so_21_23',
													'$mo_23_01', '$di_23_01', '$mi_23_01', '$do_23_01', '$fr_23_01', '$sa_23_01', '$so_23_01',
													'$uebungsleiter_betreuer', '$bezahlte_uebungsleiter_trainerausbildung', '$regelmaessige_fortbildungsmoeglichkeiten', '$bezahlte_uebungsleiterstunden', '$stundensatz', '$kostenfreie_vereinsmitgliedschaft', '$begleitete_einarbeitungszeit', '$verlaessliche_vertretungsregelung', '$betreuung_meiner_kinder_waehrend_der_trainingszeit', '$weitere_voraussetzungen', 
													'$weitere_voraussetzungen_fuer_uebungsleiter', '$sonst_noch_mitteilung' );";

// 																								echo "<br />" . __LINE__  . "<br />";
// 																								echo "($sql)";

			$result = mysqli_query ($dbcnx, $sql);
			if ( ! $result ) {
// 																					echo "<br />" . __LINE__  . "<br />";
				die ( '<p>Fehler beim Eintrag Umfrageergebnisse in Datenbank: ' . mysqli_error($dbcnx) . '</p>' ) ;
			}
			
			//
			// Transfer der Kontaktdaten in die entsprechende Datenbanktabelle, sofern angegeben
			if ( $kontaktdaten != "" ) {
				$sql = "INSERT INTO tab_kontaktdaten_verlosung ( kontaktdaten ) VALUES ( '$kontaktdaten' );";
			
// 																								echo "<br />" . __LINE__  . "<br />";
// 																								echo "($sql)";

				$result = mysqli_query ($dbcnx, $sql);
				if ( ! $result ) {
// 																					echo "<br />" . __LINE__  . "<br />";
					die ( '<p>Fehler beim Eintrag Kontaktdaten in Datenbank: ' . mysqli_error($dbcnx) . '</p>' ) ;
				}
			}
  			echo (" <br />Deine Angaben zur Befragung sind korrekt in die Datenbank &uuml;bertragen worden. <br />
  					Herzlichen Dank f&uuml;r Deine Unterst&uuml;tzung und bis bald beim FSV! <br /><br /><br />");
  ?>
				<form name = "frm_fsv_umfrage_abschluss" accept-charset="UTF-8" action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
               <p><input type = "submit" name = "abschluss_umfrage" value = "Abschluss Umfrage, ggf. neue Umfrage..." /></p>
				</form>
	<?php
		//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/

		}
		elseif (    ( isset ( $_POST['abbruch'] ) )
					|| ( isset ( $_POST['abschluss_umfrage']) ) ) {

// 																								echo "<br />" . __LINE__  . "<br />";
// 																								var_dump($_POST);
// 																								echo "<br />" . __LINE__  . "<br />";
// 																								var_dump($_SERVER);

		?>
      	<div class = "allg_text">
         	<form name = "ende_umfrage" accept-charset="UTF-8" action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
            	<p><input type = "submit" name = "bestaet_stunden_vorgabe" value = "OK! zur Auswahl der n&auml;chsten Aktivit&auml;t... " /></p>
		<?php
			//
			// Verzweigung zurück
			$webadr = $_SERVER ['SCRIPT_URI'];
			header('Content-Type: text/html;charset=utf-8');
			header("Location: " . $webadr );
      ?>
      		</form>
      	</div>
		</div>
   	<?php
		}
		//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/
		else {

// 																								echo "<br />" . __LINE__  . "<br />";
// 																								var_dump($_POST);
// 																								echo "<br />" . __LINE__  . "<br />";
// 																								var_dump($_SERVER);

         	echo "<br />" . "Ende  / Undefiniert!!"  . " / " . __LINE__  . "<br />";
				$webadr = $_SERVER ['SCRIPT_URI'];
				header('Content-Type: text/html;charset=utf-8');
				header("Location: " . $webadr );

			}

	?>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
    	active: false,
  		collapsible: true          
	});
  } );
  </script>

</body>
</html>
