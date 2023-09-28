@extends('customer.layout')
@section('title', "")


@section('css')

@endsection()


@section('body')


        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">{{ $data_response["data"]->name }}</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <!-- main-content-wrap start -->
        <div class="main-content-wrap shop-page section-ptb">
            <div class="container">
                <div class="row product-details-inner">
                    <div class="col-lg-5 col-md-6">
                        <!-- Product Details Left -->
                        <div class="product-large-slider">
                            <?php foreach (explode(",", $data_response["data"]->images) as $key => $value): ?>
                                <div class="pro-large-img img-zoom">
                                    <img src="/{{ $value }}" alt="product-details" />
                                    <a href="/{{ $value }}" data-fancybox="images"><i class="fa fa-search"></i></a>
                                </div>
                            <?php endforeach ?>  
                        </div>
                        <div class="product-nav">
                            <?php foreach (explode(",", $data_response["data"]->images) as $key => $value): ?>
                                <div class="pro-nav-thumb">
                                    <img src="/{{ $value }}" alt="product-details" />
                                </div>
                            <?php endforeach ?>   
                        </div>
                        <!--// Product Details Left -->
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="product-details-view-content">
                            <div class="product-info">
                                <h3>{{ $data_response["data"]->name }}</h3>
                                <div class="product-rating d-flex">
                                    <ul class="d-flex">
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                    </ul>
                                    <a href="#reviews">(<span class="count">0</span> customer review)</a>
                                </div>
                                <div class="price-box">
                                    <span class="new-price">$70.00</span>
                                    <span class="old-price">$78.00</span>
                                </div>
                                <p>{{ $data_response["data"]->description }}</p>

                                <div class="single-add-to-cart">
                                    <form action="#" class="cart-quantity d-flex">
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input type="number" class="input-text" name="quantity" value="1" title="Qty">
                                            </div>
                                        </div>
                                        <button class="add-to-cart" type="submit">Add To Cart</button>
                                    </form>
                                </div> 
                                <ul class="stock-cont mt-3"> 
                                    <li class="product-stock-status">Brand: <a href="#">{{ $data_response["data"]->brand_name }}</a></li> 
                                </ul> 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-description-area section-pt">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-details-tab">
                                <ul role="tablist" class="nav">
                                    <li class="active" role="presentation">
                                        <a data-bs-toggle="tab" role="tab" href="#description" class="active">Description</a>
                                    </li>
                                    <li role="presentation">
                                        <a data-bs-toggle="tab" role="tab" href="#reviews">Reviews</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="product_details_tab_content tab-content">
                                <!-- Start Single Content -->
                                <div class="product_tab_content tab-pane active" id="description" role="tabpanel">
                                    <div class="product_description_wrap  mt-30">
                                        <div class="product_desc mb-30">
                                            <p>{{ $data_response["data"]->description }}</p>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Single Content -->
                                <!-- Start Single Content -->
                                <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">
                                    <div class="review_address_inner mt-30">
                                        <!-- Start Single Review -->
                                        <div class="pro_review">
                                            <div class="review_thumb">
                                                <img alt="review images" src="assets/images/other/reviewer-60x60.jpg">
                                            </div>
                                            <div class="review_details">
                                                <div class="review_info mb-10">
                                                    <ul class="product-rating d-flex mb-10">
                                                        <li><span class="icon-star"></span></li>
                                                        <li><span class="icon-star"></span></li>
                                                        <li><span class="icon-star"></span></li>
                                                        <li><span class="icon-star"></span></li>
                                                        <li><span class="icon-star"></span></li>
                                                    </ul>
                                                    <h5>Admin - <span> November 19, 2019</span></h5>

                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in viverra ex, vitae vestibulum arcu. Duis sollicitudin metus sed lorem commodo, eu dapibus libero interdum. Morbi convallis viverra erat, et aliquet orci congue vel. Integer in odio enim. Pellentesque in dignissim leo. Vivamus varius ex sit amet quam tincidunt iaculis.</p>
                                            </div>
                                        </div>
                                        <!-- End Single Review -->
                                    </div>
                                    <!-- Start RAting Area -->
                                    <div class="rating_wrap mt-50">
                                        <h5 class="rating-title-1">Add a review </h5>
                                        <p>Your email address will not be published. Required fields are marked *</p>
                                        <h6 class="rating-title-2">Your Rating</h6>
                                        <div class="rating_list">
                                            <div class="review_info mb-10">
                                                <ul class="product-rating d-flex mb-10">
                                                    <li><span class="icon-star"></span></li>
                                                    <li><span class="icon-star"></span></li>
                                                    <li><span class="icon-star"></span></li>
                                                    <li><span class="icon-star"></span></li>
                                                    <li><span class="icon-star"></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End RAting Area -->
                                    <div class="comments-area comments-reply-area">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form action="#" class="comment-form-area">
                                                    <div class="row comment-input">
                                                        <div class="col-md-6 comment-form-author mt-15">
                                                            <label>Name <span class="required">*</span></label>
                                                            <input type="text" required="required" name="Name">
                                                        </div>
                                                        <div class="col-md-6 comment-form-email mt-15">
                                                            <label>Email <span class="required">*</span></label>
                                                            <input type="text" required="required" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="comment-form-comment mt-15">
                                                        <label>Comment</label>
                                                        <textarea class="comment-notes" required="required"></textarea>
                                                    </div>
                                                    <div class="comment-form-submit mt-15">
                                                        <input type="submit" value="Submit" class="comment-submit">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content -->
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- main-content-wrap end -->
       
@endsection()

@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('customer/assets/js/page/index.js') }}"></script>
@endsection()
        
