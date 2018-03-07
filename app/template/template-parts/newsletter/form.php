<div class="newsletter--wrapper">
	<div class="container newsletter">
		<h2 class="newsletter--title"><?php esc_html_e( 'Newsletter', 'elemarjr' ); ?></h2>
		<p class="newsletter--subtitle"><?php esc_html_e( 'Stay informed with our publications', 'elemarjr' ); ?></p>
		<form class="form newsletter--form" method="post" action="https://elemarjr.us17.list-manage.com/subscribe/post?u=0ea74f86198646647c46d29cf&amp;id=cd82e1ff48" target="_blank">
			<span class="screen-reader-text"><?php esc_html_e( 'Type your email', 'elemarjr' ); ?></span>
			<input type="email" name="EMAIL" placeholder="<?php esc_attr_e( 'Type your email', 'elemarjr' ); ?>">

			<div class="newsletter--col-6">
				<span class="screen-reader-text"><?php esc_html_e( 'First Name', 'elemarjr' ); ?></span>
				<input class="col-6" type="text" name="FNAME" placeholder="<?php esc_attr_e( 'First Name', 'elemarjr' ); ?>">
				<span class="screen-reader-text"><?php esc_html_e( 'Last Name', 'elemarjr' ); ?></span>
				<input type="text" name="LNAME" placeholder="<?php esc_attr_e( 'Last Name', 'elemarjr' ); ?>">
			</div>

			<h4 class="newsletter--divisortitle"><?php esc_html_e( 'Content of Interest', 'elemarjr' ); ?></h4>		

			<?php 
				// @todo remove div element inner the div
				// @todo remove onclick calls using a JS file
			?>
			<div class="newsletter--col-6">
				<label for="evt-pale">
					<div class="newsletter--interest">
						<span><?php esc_html_e( 'Events in which I will speak', 'elemarjr' ); ?></span>
						<input id="evt-pale" class="newsletter--check" type="checkbox" name="group[4625][1]" value="1">
						<span class="checkmark"></span>
					</div>
				</label>

				<label for="cont-en">
					<div class="newsletter--interest">
						<span><?php esc_html_e( 'English content', 'elemarjr' ); ?></span>
						<input id="cont-en" class="newsletter--check" type="checkbox" name="group[4625][2]" value="2">
						<span class="checkmark"></span>
					</div>
				</label>
			</div>

			<div class="newsletter--col-6">
				<label for="cont-pt">
					<div class="newsletter--interest"> 
						<span><?php esc_html_e( 'Portuguese content', 'elemarjr' ); ?></span>
						<input id="cont-pt" class="newsletter--check" type="checkbox" name="group[4625][4]" value="4">
						<span class="checkmark"></span>
					</div>
				</label>

				<label for="ofrt-prom">
					<div class="newsletter--interest">
						<span><?php esc_html_e( 'Offers and Promotions', 'elemarjr' ); ?></span>
						<input id="ofrt-prom" class="newsletter--check" type="checkbox" name="group[4625][8]" value="8">
						<span class="checkmark"></span>
					</div>
				</label>
			</div>
			
			<p class="newsletter--check-validation-message">
				<?php esc_html_e( 'Select at least one interest', 'elemarjr' ); ?>
			</p>

			<div class="form--submit-wrapper">
				<input type="submit" class="button button__white" value="<?php esc_attr_e( 'Subscribe', 'elemarjr' ); ?>">
			</div>	
		</form>
	</div>
</div>
