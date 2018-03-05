<div class="container newsletter">
	<h2 class="newsletter--title">NEWSLETTER</h2>
	<p class="newsletter--subtitle">Mantenha-se informado com nossas publicações</p>
	<form class="form">
		<span class="screen-reader-text">Digite seu e-mail</span>
		<input type="text" name="email" placeholder="Digite seu e-mail">

		<div class="newsletter--col-6">
			<span class="screen-reader-text">Nome</span>
			<input class="col-6" type="text" name="email" placeholder="Nome">
			<span class="screen-reader-text">Sobrenome</span>
			<input type="text" name="email" placeholder="Sobrenome">
		</div>

		<h4 class="newsletter--divisortitle"> CONTEÚDO DE INTERESSE </h4>

		<div class="newsletter--col-6">
			<label class="newsletter--col-6" id="lbl-evt-pale" for="evt-pale">
				<div class="newsletter--interest"> 
					<span> Eventos em que irei palestrar </span>
					<input onclick="highlightInterest('lbl-evt-pale')" name="evt-pale" id="evt-pale" type="checkbox" name="">
					<span class="checkmark"></span>
				</div>
			</label>

			<label id="lbl-cont-en" for="cont-en">
				<div class="newsletter--interest"> 
					<span> Conteúdos em Inglês </span>
					<input onclick="highlightInterest('lbl-cont-en')" name="cont-en" id="cont-en" type="checkbox" name="">
					<span class="checkmark"></span>
				</div>
			</label>
		</div>

		<div class="newsletter--col-6">
			<label id="lbl-cont-pt" for="cont-pt">
				<div class="newsletter--interest"> 
					<span> Conteúdos em Português </span>
					<input onclick="highlightInterest('lbl-cont-pt')" name="cont-pt" id="cont-pt" type="checkbox" name="">
					<span class="checkmark"></span>
				</div>
			</label>

			<label id="lbl-ofrt-prom" for="ofrt-prom">
				<div class="newsletter--interest"> 
					<span> Ofertas e Promoções </span>
					<input onclick="highlightInterest('lbl-ofrt-prom')" name="ofrt-prom" id="ofrt-prom" type="checkbox" name="">
					<span class="checkmark"></span>
				</div>
			</label>
		</div>

		<div class="form--submit-wrapper">
			<input type="submit" class="button button__white" value="INSCREVER-SE">
		</div>	
	</form>
</div>

<script type="text/javascript" charset="utf-8">
    function highlightInterest(id) {
        var element = document.getElementById(id);
        element.classList.toggle("interes--selected");
    }
</script>