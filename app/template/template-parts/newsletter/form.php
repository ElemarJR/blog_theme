<div class="newsletter--wrapper">
	<div class="container newsletter">
		<h2 class="newsletter--title"><?php echo esc_html_e( 'Newsletter', 'elemarjr' ); ?></h2>
		<p class="newsletter--subtitle"><?php echo esc_html_e( 'Stay informed with our publications', 'elemarjr' ); ?></p>
		<form class="form" method="post" action="https://elemarjr.us17.list-manage.com/subscribe/post?u=0ea74f86198646647c46d29cf&amp;id=cd82e1ff48" target="_blank">
			<span class="screen-reader-text"><?php echo esc_html_e( 'Type your email', 'elemarjr' ); ?></span>
			<input type="text" name="EMAIL" placeholder="<?php echo esc_attr_e( 'Type your email', 'elemarjr' ); ?>">

			<div class="newsletter--col-6">
				<span class="screen-reader-text"><?php echo esc_html_e( 'First Name', 'elemarjr' ); ?></span>
				<input class="col-6" type="text" name="FNAME" placeholder="<?php echo esc_attr_e( 'First Name', 'elemarjr' ); ?>">
				<span class="screen-reader-text"><?php echo esc_html_e( 'Last Name', 'elemarjr' ); ?></span>
				<input type="text" name="LNAME" placeholder="<?php echo esc_attr_e( 'Last Name', 'elemarjr' ); ?>">
			</div>

			<h4 class="newsletter--divisortitle"><?php echo esc_html_e( 'Content of Interest', 'elemarjr' ); ?></h4>		

			<?php 
				// @todo remove div element inner the div
				// @todo remove onclick calls using a JS file
			?>
			<div class="newsletter--col-6">
				<label class="newsletter--col-6" id="lbl-evt-pale" for="evt-pale">
					<div class="newsletter--interest">
						<span><?php echo esc_html_e( 'Events in which I will speak', 'elemarjr' ); ?></span>
						<input onclick="highlightInterest('lbl-evt-pale')" name="evt-pale" id="evt-pale" type="checkbox" name="group[4625][1]" value="1">
						<span class="checkmark"></span>
					</div>
				</label>

				<label id="lbl-cont-en" for="cont-en">
					<div class="newsletter--interest">
						<span><?php echo esc_html_e( 'English content', 'elemarjr' ); ?></span>
						<input onclick="highlightInterest('lbl-cont-en')" name="cont-en" id="cont-en" type="checkbox" name="group[4625][2]" value="2">
						<span class="checkmark"></span>
					</div>
				</label>
			</div>

			<div class="newsletter--col-6">
				<label id="lbl-cont-pt" for="cont-pt">
					<div class="newsletter--interest"> 
						<span><?php echo esc_html_e( 'Portuguese content', 'elemarjr' ); ?></span>
						<input onclick="highlightInterest('lbl-cont-pt')" name="cont-pt" id="cont-pt" type="checkbox" name="group[4625][4]" value="4">
						<span class="checkmark"></span>
					</div>
				</label>

				<label id="lbl-ofrt-prom" for="ofrt-prom">
					<div class="newsletter--interest">
						<span><?php echo esc_html_e( 'Offers and Promotions', 'elemarjr' ); ?></span>
						<input onclick="highlightInterest('lbl-ofrt-prom')" name="ofrt-prom" id="ofrt-prom" type="checkbox" name="group[4625][8]" value="8">
						<span class="checkmark"></span>
					</div>
				</label>
			</div>

			<div class="form--submit-wrapper">
				<input type="submit" class="button button__white" value="<?php echo esc_attr_e( 'Subscribe', 'elemarjr' ); ?>">
			</div>	
		</form>
	</div>
</div>

<?php // @todo use a JS file ?>
<script type="text/javascript" charset="utf-8">
    function highlightInterest(id) {
        var element = document.getElementById(id);
        element.classList.toggle("interes--selected");
    }
</script>
