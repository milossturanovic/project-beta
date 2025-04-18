<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Rekos_Agency
 */

get_header();
?>



<main id="content" class="wrapper layout-page">
		<section class="pb-18">

			<div class="bg-body-secondary py-5">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb breadcrumb-site py-0 d-flex justify-content-center">
						<li class="breadcrumb-item"><a class="text-decoration-none text-body" href="#"><i
									class="fas fa-home-lg me-4 text-body-emphasis"></i> Home</a>
						</li>
						<li class="breadcrumb-item active pl-0 d-flex align-items-center" aria-current="page">Page Not
							Found</li>
					</ol>
				</nav>
			</div>
			<div class="container text-center">
				<h2 class="py-14 m-0">Page Not Found</h2>
			</div>
			<div class="container text-center">
				<div class="row">
					<div id="main-content" class="col">
						<div class="content-404-wrapper">
							<h1 class="fs-160px">404</h1>
							<h4 class="fs-3 mb-5">Oops! That page can’t be found.</h4>
							<p class="mb-11">Sorry, but the page you are looking for is not found. Please, make sure you
								have typed the current URL.</p>
							<a href="#" class="btn btn-dark btn-hover-border-primary btn-hover-bg-primary">Go to home
								page</a>
						</div>
					</div>
				</div>
			</div>
		</section>


	</main>



    


<?php
get_footer();
