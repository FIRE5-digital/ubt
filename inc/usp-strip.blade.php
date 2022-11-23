<!-- components/usp.scss -> components/usp/_full-2col.scss -->
<section class="usp-strip">
	<div class="usp-strip-content">
		<div class="ctr">
			<h1>{{ @$page->content->usp_title }}</h1>
			<div class="usp-list">
				<div class="usp-list-item">
					<h2>{{ @$page->content->usp1 }}</h2>
					<p>{{ @$page->content->usp1_description }}</p>
				</div>
				<div class="usp-list-item">
					<h2>{{ @$page->content->usp2 }}</h2>
					<p>{{ @$page->content->usp2_description }}</p>
				</div>
				<div class="usp-list-item">
					<h2>{{ @$page->content->usp3 }}</h2>
					<p>{{ @$page->content->usp3_description }}</p>
				</div>
			</div>
		</div>
	</div>
	<div class="usp-strip-img">
	</div>
</section><!--process-strip-->