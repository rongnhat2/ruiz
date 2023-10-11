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
                            <li class="breadcrumb-item active">Checkout Page</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb checkout-page">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="coupon-area">
                            <!-- coupon-accordion start -->
                            <div class="coupon-accordion">
                                <h3>Returning customer? <span class="coupon" id="showlogin"><a href="">Click here to login</a></span></h3>
                                 
                            </div>
                            <!-- coupon-accordion end -->
                        </div>
                    </div>
                </div>
                <!-- checkout-details-wrapper start -->
                <div class="checkout-details-wrapper">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <!-- billing-details-wrap start -->
                            <div class="billing-details-wrap">
                                <div class="cart-form-data js-validate">
                                    <h3 class="shoping-checkboxt-title">Billing Details</h3>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p class="single-form-row">
                                                <label>Username <span class="required">*</span></label>
                                                <input type="text" name="First name" class="data-name">
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="single-form-row">
                                                <label>Email <span class="required">*</span></label>
                                                <input type="text" name="Last name" class="data-email">
                                            </p>
                                        </div> 
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Town / City <span class="required">*</span></label>
                                                <input type="text" name="address" class="data-address">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Phone <span class="required">*</span></label>
                                                <input type="text" name="phone" class="data-phone">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row m-0">
                                                <label>Order notes</label>
                                                <textarea placeholder="Notes about your order, e.g. special notes for delivery." class="checkout-mess data-description" rows="2" cols="5"></textarea>
                                            </p>
                                        </div>
                                        <div class="error-log mt-3"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- billing-details-wrap end -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <!-- your-order-wrapper start -->
                            <div class="your-order-wrapper">
                                <h3 class="shoping-checkboxt-title">Your Order</h3>
                                <!-- your-order-wrap start-->
                                <div class="your-order-wrap">
                                    <!-- your-order-table start -->
                                    <div class="your-order-table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-total">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody class="cart-list">
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        Vestibulum suscipit <strong class="product-quantity"> × 1</strong>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">£165.00</span>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        Vestibulum magna <strong class="product-quantity"> × 1</strong>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">£50.00</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr class="order-total">
                                                    <th>Order Total</th>
                                                    <td><strong><span class="amount cart-total-price"></span></strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- your-order-table end -->

                                    <!-- your-order-wrap end -->
                                    <div class="payment-method">
                                        <div class="payment-accordion">
                                            <!-- ACCORDION START -->
                                            <h5>Direct Bank Transfer</h5>
                                            <div class="payment-content">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                            <!-- ACCORDION END -->
                                            <!-- ACCORDION START -->
                                            <h5>Cheque Payment</h5>
                                            <div class="payment-content">
                                                <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div>
                                            <!-- ACCORDION END -->
                                            <!-- ACCORDION START -->
                                            <h5>PayPal</h5>
                                            <div class="payment-content">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                            </div>
                                            <!-- ACCORDION END -->
                                        </div>
                                        <div class="order-button-payment">
                                            <input type="button" value="Place order" class="button-payment" />
                                        </div>
                                    </div>
                                    <!-- your-order-wrapper start -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- checkout-details-wrapper end -->
            </div>
        </div>
        <!-- main-content-wrap end -->
       
@endsection()

@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('assets/js/page/checkout.js') }}"></script>
@endsection()
        
