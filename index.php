<?php
	require_once "layout/header.php";
?>
	
	<main>
		<div class="container">
			<div id="wizard_container">
				<form name="example-1" id="wrapped" method="POST" action="mailer.php">
					<input type="hidden" class="mailer_language" name="language" value="it" />
					<!-- Leave for security protection, read docs for details -->
					<div id="middle-wizard">

						<div class="step">
							<div class="row justify-content-center">
								<div class="col-12 col-md-6">
									<div class="box_general welcome-section">
										<h1>Benvenuto!</h1>
										<p>In questa pagina potrai <b>comporre il tuo KIT</b> scegliendo i prodotti uno per uno.</p>
										<p>Segui il <b>percorso guidato</b>, seleziona il Brand e lo sport, seleziona i Prodotti che ti interessano e poi clicca su <b>CONFERMA per inviarci una configurazione.</b></p>
										<p>La richiesta <b>non è impegnativa</b>. RICEVUTA la tua configurazione verrai contattato dal nostro Ufficio Commerciale entro 24h.</p>
										<p>1. Seleziona lo <b>Sport</b> che ti interessa.</p>
										<p>2. Scegli tra <b>Uomo</b>, <b>Donna</b> o <b>Bambino</b>.</p>
										<p>3. Seleziona il tuo <b>Brand</b> preferito.</p>
										<p>4. Scegli se comporre un Kit di <b>Rappresentanza</b>, <b>Gara</b> oppure <b>Allenamento</b></p>
										<p>5. Componi il tuo Outfit scegliendo <b>T-Shirt</b>, <b>Pantaloncini</b> e <b>Calze</b></p>
										<p>6. <b>Visualizza l'anteprima del tuo outfit</b> e conferma i tuoi dati.</p>
										<h2 style="font-size:20px;text-align:center;"><b>Continua la registrazione per scoprire lo sconto a te dedicato!</b></h2>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<!-- set user information from Cookie if current user has-->
									<div class="box_general box-form">
										<div class="form-group">
												<input type="text" id="company_name" name="company_name" class="required form-control" placeholder="Nome Società" value="<?php echo (isset($_COOKIE['user']))?(json_decode($_COOKIE['user'],true)['company']):'' ?>">
										</div>
										<div class="form-group">
											<input type="number" id="cap_number" name="cap_number" class="required form-control" placeholder="CAP" min="0" value="<?php echo (isset($_COOKIE['user']))?(json_decode($_COOKIE['user'],true)['cap']):'' ?>">
										</div>
										<div class="form-group">
											<input type="number" id="team_person" name="team_person" class="required form-control" placeholder="Numero Atleti" min="0" value="<?php echo (isset($_COOKIE['user']))?(json_decode($_COOKIE['user'],true)['people']):'' ?>">
										</div>
										<p id="owner-yes-title">Struttura di Proprietà?</p>
										<div class="form-group">
											<input type="radio" id="owner-yes" name="owner" class="required form-control"  value="si" checked>
											<label class="owner-yes-label" style="margin-right: 15px;" for="owner-yes">Sì</label>
											<input type="radio" id="owner-no" name="owner" class="required form-control"  value="no">
											<label id="owner-now-label" for="owner-no">No</label>
										</div>
										<div class="form-group">
											<input type="email" id="email" name="email" class="required form-control" placeholder="Inserisci la tua E-mail" value="<?php echo (isset($_COOKIE['user']))?(json_decode($_COOKIE['user'],true)['email']):'' ?>">
										</div>
										<div class="form-group">
											<input type="number" id="telephone" name="telephone" class="form-control" placeholder="Insersci un recapito telefonico" min="0" value="<?php echo (isset($_COOKIE['user']))?(json_decode($_COOKIE['user'],true)['telephone']):'' ?>">
										</div>
										<div class="checkbox_questions">
											<input name="terms" type="checkbox" class="icheck required" value="yes">
											<label id="terms" style="display:initial;">Dichiaro di aver preso visione dei <a href="#" data-toggle="modal" data-target="#terms-txt">termini e condizioni</a>.</label>
										</div>
									</div> 

								</div>
							</div>
							<!-- /row-->
						</div>
						<!-- /step -->
					</div>
					<!-- /middle-wizard -->
					<div id="bottom-wizard">
						<div class="float-right clearfix">
							<button type="submit" class="start_wizard" id="btn_continue">REGISTRATI E CONTINUA</button>
						</div>
					</div>
					<!-- /bottom-wizard -->
				</form>
			</div>
			<!-- /Wizard container -->
		</div>
		<!-- /Container -->
	</main>

	<!-- Modal terms -->
	<!-- Terms introduction -->
	<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="termsLabel">Termini e Condizioni</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
				</div>
				<div class="modal-body terms-modal">
					<p><b>TEMPI E MODALITA’ DI CONSEGNA</b></p>
					<p>La consegna dei Prodotti acquistati dal Cliente sul Sito [https://www.ggteamwear.com] verrà effettuata dal corriere espresso presso l’indirizzo di spedizione che il Cliente ha indicato nell’Ordine. La compilazione dei dati necessari alla spedizione verrà effettuata direttamente dallo stesso, pertanto la GGTeamwear non potrà essere ritenuta responsabile della mancata consegna in caso di errata indicazione dei dati.</p>
					<p>Gli ordini vengono spediti dal Lunedì al Venerdì nella fascia oraria 9:00 – 15:00. Gli ordini effettuati nel fine settimana verranno elaborati a partire dal Lunedì mattina successivo così come ogni ordine effettuato dopo le ore 14:00 verrà elaborato il giorno lavorativo (Lunedì – Venerdì) successivo.</p>
					<p>I tempi di consegna dei prodotti ordinati possono variare a seconda del paese di consegna: 24-48 ore per l’Italia, 48-72 ore per l’Europa, 3 o più giorni lavorativi per i Paesi extra Europa, trascorse 24 ore dalla data di ricevimento dell’Ordine da parte di GGTeamwear. I tempi di consegna sono puramente indicativi e non rappresentano termini vincolanti per GGTeamwear. I ritardi nella consegna dei prodotti possono essere causati da vari fattori: dalla temporanea indisponibilità dei Prodotti, da cause di forza maggiore o da festività ricorrenti, da disfunzioni nel servizio da parte del corriere. Il mero allungamento dei tempi di consegna non dà diritto al Cliente ad alcuna compensazione. In ogni caso la consegna avverrà al più tardi entro trenta giorni dalla data di conclusione del contratto.</p>
					<p>Nel caso in cui il cliente richiedesse nell’ordine prodotti personalizzati, i tempi di consegna previsti sono differenti in quanto saranno necessari tempi tecnici dovuti alla realizzazione e lavorazione della personalizzazione. La consegna completa di un Ordine con prodotti personalizzati potrà pertanto richiedere più tempo, generalmente dai 2 ai 5 giorni in più. In ogni caso, anche per i prodotti personalizzati, la consegna avverrà al più tardi entro trenta giorni dalla data di conclusione del contratto.</p>
					<p>Non appena il pacco verrà affidato fisicamente al corriere espresso (GLS o TNT) incaricato del servizio di consegna, il Cliente riceverà un'email di conferma. La conferma della spedizione conterrà un numero di controllo e/o il link che servirà per tracciare on line lo stato della spedizione.</p>
					<p>La consegna verrà effettuata nei giorni lavorativi, nei normali orari d’ufficio, escluso il sabato e le festività nazionali. La Conferma di Spedizione costituisce il momento in cui si perfeziona il contratto tra GGTeamwear e il Cliente.</p>
					<p>All’atto del ricevimento del prodotto il Cliente dovrà verificare che il collo sia perfettamente chiuso con il nastro adesivo con il logo GGTeamwear. Si invitano i clienti a non ritirare scatole o buste se  non integre o se il nastro adesivo risulta manomesso. Qualora il pacco non sia integro o sia danneggiato, o il nastro adesivo manomesso, il Cliente è invitato a segnalarlo immediatamente al corriere e a firmare con riserva. In caso contrario il prodotto si considererà regolarmente consegnato ed GGTeamwear non potrà essere ritenuto responsabile di eventuali danni e/o prodotti mancanti.</p>
					<p>In caso di assenza del destinatario all’indirizzo specificato, il corriere tenterà la riconsegna il giorno successivo, in una fascia oraria che va dalle ore 09:00 alle ore 18:00. In caso di impossibilità nell’eseguire la consegna anche il giorno successivo per assenza del destinatario, l’Azienda tenterà di contattare il Cliente per programmare una nuova consegna. Nel caso in cui il Servizio Clienti non dovesse riuscire a contattare il Cliente nei successivi 5 giorni lavorativi o nel caso di ulteriore impossibilità di consegna per assenza del destinatario, i prodotti ordinati saranno riconsegnati al mittente. In caso di cambio indirizzo di consegna a spedizione avvenuta o di nuova spedizione, il supplemento applicato dal corriere espresso sarà a carico del destinatario.</p>
					<p><b>MODALITA’ DI PAGAMENTO</b></p>
					<p>GGTeamwear assicura un'elevata protezione dei tuoi dati. Tutte le transazioni sono processate da sistemi di ultima generazione, per garantire acquisti e pagamenti in totale sicurezza.</p>
					<p>Le modalità di pagamento accettate sono le seguenti:</p>
					<p>Visa, MasterCard, American Express, Postepay, CartaSi</p>
					<p>PayPal</p>
					<p>Bonifico Bancario – IBAN IT1Z0103003405000063596829</p>
					<p>La tua carta di credito può essere rifiutata per i seguenti motivi:</p>
					<p>La carta di credito è scaduta: verifica che non sia stata superata la data di scadenza della tua carta di credito. È possibile che sia stato raggiunto il limite di credito: verifica con la tua banca che non sia stato raggiunto l'importo massimo ammesso dalla carta di credito per effettuare acquisti. È possibile che sia stato inserito qualche dato sbagliato: controlla di aver introdotto correttamente tutti i campi necessari.</p>
					<p>Gli ordini sono fatturati in Euro e corrispondono ai prezzi pubblicati su [https://www.ggteamwear.com].</p>
					<p>La somma che verrà addebitata al cliente potrà essere soggetta a variazione poiché basata su regimi di cambio a fluttuazione e sulle commissioni bancarie.</p>
					<p>GGTeamwear invita l'acquirente a contattare il proprio istituto bancario per richiedere informazioni dettagliate sui tassi di cambio e commissioni bancarie relative alla propria transazione.</p>
					<p>Il prezzo totale visibile dal cliente al termine dell’ordine nel prospetto di resoconto è comprensivo delle spese di spedizione che variano in base al Paese di destinazione ma non di eventuali dazi doganali e/o tasse aggiuntive sulla vendita, necessari per l’importazione della merce in territorio straniero. Per alcune tipologie di spedizioni è inoltre possibile una richiesta di integrazione qualora al momento dell’ordine non sia possibile calcolare con precisione i costi di spedizione. Sarà esclusivamente a carico del destinatario qualsiasi onere aggiuntivo relativo allo sdoganamento. In caso di rifiuto della merce da parte del Cliente o di mancata consegna per altre motivazioni (es. indirizzo e/o numero di telefono errati del destinatario; ripetuta assenza del destinatario, ecc.) sarà addebitato al destinatario e trattenuto dal rimborso del prezzo della merce dal Cliente, l’importo a copertura delle seguenti spese: “invio merce” + “ritorno merce” + “dogana per rientro”. Dazi doganali ed eventuali tasse variano in base al Paese di destinazione e vengono applicate all'arrivo della merce nel Paese medesimo. Per informazioni relative all'ammontare dei dazi e delle eventuali tasse, e alle modalità di sdoganamento delle merci, si consiglia di contattare i competenti Uffici Doganali del Paese di destinazione.</p>
					<p>GGTeamwear si riserva la facoltà di chiedere al cliente un’integrazione delle spese di spedizione, ove necessario , dovuta ai costi ulteriori che potranno essere richiesti dal vettore e non preventivabili al momento della effettuazione dell’ Ordine così come stabilito dall’art 48 D.lgs. 206/2005 lett. C).</p>
				</div>
			</div>
		</div>
	</div>
	<!-- /Modal terms -->	

	<div class="cd-overlay-nav">
		<span></span>
	</div>
	<!-- /cd-overlay-nav -->

	<div class="cd-overlay-content">
		<span></span>
	</div>
	<!-- /cd-overlay-content -->

	<a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
	<!-- /cd-nav-trigger -->

<?php
	require_once "layout/footer.php";
?>