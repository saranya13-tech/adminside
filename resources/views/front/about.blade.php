@extends('layouts.front.app')

 @section('content')
<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>About Us</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">About</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<section class="contact_area section_gap_bottom">
		<div class="container">
			<?php $company=DB::select('SELECT *  FROM company');
        foreach($company as $value){
            $aboutus=$value->aboutus;
            
        }?>
			
			<?php

echo htmlspecialchars_decode($aboutus);
?>
		</div>
	</section>
	@endscetion