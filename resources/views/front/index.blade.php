 @extends('layouts.front.app')

 @section('content')

 <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">
                <div class="col-lg-12">
                    <div class="active-banner-slider owl-carousel">
                        <!-- single-slide -->
                        @foreach($slides as $slide)
                        <div class="row single-slide align-items-center d-flex">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h1>{{$slide->title}}</h1>
                                    <p>{{$slide->description}}</p>
                                   <!--  <div class="add-bag d-flex align-items-center">
                                        <a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
                                        <span class="add-text text-uppercase">Add to Bag</span>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img">
                                    <img class="img-fluid" src="{{asset("$slide->image")}}" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- single-slide -->
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- start features Area -->
    
    <!-- end features Area -->

    <!-- Start category Area -->

    <section class="category-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                     <br>
                    <div class="row">
                        
                       
                       @foreach($category as $cat)
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="{{asset("$cat->cover")}}" alt="">
                                <a href="{{asset("$cat->cover")}}" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">{{$cat->name}}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
        </div>
    </section>
    <!-- End category Area -->

    <!-- start product Area -->
    <section class="owl-carousel active-product-area section_gap">
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Latest Products</h1>
                            <p> </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- single product -->
                     @foreach($latest as $l)
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                           <a href="{{route('single',$l->id)}}">  <img class="img-fluid" src="{{asset("$l->cover")}}" alt="">
                            <div class="product-details">
                                <h6>{{$l->name}}</h6>
                                <div class="price">
                                    <h6>₹{{$l->sale_price}}</h6>
                                    <h6 class="l-through">₹{{$l->price}}</h6>
                                </div></a>
                               <!--  <div class="prd-bottom">

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
            </div>
        </div>
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Coming Products</h1>
                            <p>Upcoming products</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                     @foreach($coming as $l)
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                           <a href="{{route('single',$l->id)}}">  <img class="img-fluid" src="{{asset("$l->cover")}}" alt="">
                            <div class="product-details">
                                <h6>{{$l->name}}</h6>
                                <div class="price">
                                    <h6>₹{{$l->sale_price}}</h6>
                                    <h6 class="l-through">₹{{$l->price}}</h6>
                                </div></a>
                               <!--  <div class="prd-bottom">

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
            </div>
        </div>
    </section>
    <!-- end product Area -->

    <!-- Start exclusive deal Area -->
    <section class="exclusive-deal-area">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 no-padding exclusive-left">
                    <div class="row clock_sec clockdiv" id="clockdiv">
                        <div class="col-lg-12">
                            <h1>Exclusive Hot Deal !</h1>
                            <p></p>
                        </div>
                        
                    </div>
                   
                </div>
                <div class="col-lg-6 no-padding exclusive-right">
                    <div class="active-exclusive-product-slider">
                        @foreach($popular as $p)
                        <!-- single exclusive carousel -->
                        <div class="single-exclusive-slider">
                          <a href="{{route('single',$p->id)}}">   <img class="img-fluid" src="{{asset("$p->cover")}}" alt="">
                            <div class="product-details">
                                <div class="price">
                                    <h6>₹{{$p->sale_price}}</h6>
                                    <h6 class="l-through">₹{{$p->price}}</h6>
                                </div>
                                <h4>{{$p->name}}</h4></a>
                               <!--  <div class="add-bag d-flex align-items-center justify-content-center">
                                    <a class="add-btn" href=""><span class="ti-bag"></span></a>
                                    <span class="add-text text-uppercase">Add to Bag</span>
                                </div> -->
                            </div>
                        </div>
                        @endforeach
                        <!-- single exclusive carousel -->
                        <div class="single-exclusive-slider">
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End exclusive deal Area -->

   

    <!-- Start related-product Area -->
    <section class="related-product-area section_gap_bottom">
        <div class="container">
            <br>
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Featured Products</h1>
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        
                      @foreach($featured as $f)
                       
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-related-product d-flex">
                               <a href="{{route('single',$p->id)}}"> <img src="{{asset("$f->cover")}}" alt="" style="height:120px"></a>
                                <div class="desc">
                                    <a href="{{route('single',$p->id)}}" class="title">{{$f->name}}</a>
                                    <div class="price">
                                        <h6>₹{{$f->sale_price}}</h6>
                                    <h6 class="l-through">₹{{$f->price}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
               
            </div>
        </div>
    </section>
        @endsection