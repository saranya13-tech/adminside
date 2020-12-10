@extends('layouts.front.app')

 @section('content')
<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Shop Category page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Fashon Category</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Browse Categories</div>
					<ul class="main-categories">
						@foreach($category as $c)
						<li class="main-nav-list">
							<a data-toggle="collapse" onclick="hello({{$c->id}})" aria-expanded="false" aria-controls="fruitsVegetable"><span
								 class="lnr lnr-arrow-right"></span>{{$c->name}}</span></a>
						
						</li>
						@endforeach

						
							</ul>
						
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting mr-auto">
						<select>
							<option value="1">Show 20</option>
							
						</select>
					</div>
					
						
						{{$products->links()}}
					
				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						@foreach($products as $p)
						
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								<img class="img-fluid" src="{{asset("$p->cover")}}" alt="">
								<div class="product-details">
									 <a href="{{route('single',$p->id)}}" class="title">{{$p->name}}</a>
                                    <div class="price">
                                        <h6>₹{{$p->sale_price}}</h6>
                                    <h6 class="l-through">₹{{$p->price}}</h6>
									</div>
									<!-- <div class="prd-bottom">

										<a href="" class="social-info">
											<span class="ti-bag"></span>
											<p class="hover-text">add to bag</p>
										</a>
										<a href="" class="social-info">
											<span class="lnr lnr-heart"></span>
											<p class="hover-text">Wishlist</p>
										</a>
										<a href="" class="social-info">
											<span class="lnr lnr-sync"></span>
											<p class="hover-text">compare</p>
										</a>
										<a href="" class="social-info">
											<span class="lnr lnr-move"></span>
											<p class="hover-text">view more</p>
										</a>
									</div> -->
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</section>
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting mr-auto">
						<select>
							<option value="1">Show 20</option>
						</select>
					</div>
					{{$products->links()}}
				</div>
				<!-- End Filter Bar -->
			</div>
		</div>
	</div>

	<!-- Start related-product Area -->
	<script>
	function hello(id){
  
   var url = window.location.href;
   url=url.split('?')[0];
   var array=[];
   url += '?id='+id;
 
window.location.href = url;
 }
</script>
	@endscetion