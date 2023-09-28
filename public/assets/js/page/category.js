const View = {

    Product: {
        render(data){
            data.map(v => {
                $(".grid-item")
                    .append(`<div class="col-lg-4 col-md-6">
                                <!-- single-product-area start -->
                                <div class="single-product-area mt-30">
                                    <div class="product-thumb">
                                        <a href="/product/${v.slug}">
                                            <img class="primary-image" src="/${v.images.split(",")[0]}" alt="">
                                        </a>
                                        <div class="label-product label_new">New</div> 
                                        <ul class="watch-color">
                                            <li class="twilight"><span></span></li>
                                            <li  class="portage"><span></span></li>
                                            <li class="pigeon"><span></span></li>
                                        </ul>
                                    </div>
                                    <div class="product-caption">
                                        <h4 class="product-name"><a href="/product/${v.slug}">${v.name}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">$${v.prices}</span> 
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-area end -->
                            </div> `)
                $(".list-item")
                    .append(` <div class="shop-product-list-wrap">
                                <div class="row product-layout-list mt-30">
                                    <div class="col-lg-3 col-md-3">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="/product/${v.slug}"><img src="/${v.images.split(",")[0]}" alt="Produce Images"></a>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="product-content-list text-left">
                                           
                                            <h4><a href="/product/${v.slug}" class="product-name">Auctor gravida enim</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$${v.prices}</span> 
                                            </div>

                                            <div class="product-rating">
                                                <ul class="d-flex">
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li class="bad-reting"><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>

                                            <p>${v.description}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <div class="block2">
                                            <ul class="stock-cont">
                                                <li class="product-sku">Brand: <span>${v.brand_name}</span></li>
                                                <li class="product-stock-status">Availability: <span class="in-stock">In Stock</span></li>
                                            </ul>
                                            <div class="product-button">
                                                
                                                <div class="add-to-cart">
                                                    <div class="product-button-action">
                                                        <a href="#" class="add-to-cart">Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`)
            })
        }
        
    },
    Brand: {
        render(data){
            data.map(v => {
                $(".brand-list")
                    .append(`<li  class="has-sub"><a href="#">${v.name}</a></li>`)
            })
        }
    },
    Color: {
        render(data){
            data.map(v => {
                $(".color-list")
                    .append(`<li><a href="#">${v.name}</a></li>`)
            })
        }
    },
    init(){

    }
};
(() => {
    View.init();
    function init(){
        initData();
    }

    async function initData() { 
        await getBrand();
        await getData();
        await getColor();
    } 

 
    function getData(){
        Api.Product.GetAll()
            .done(res => {
                View.Product.render(res.data)
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    } 
    function getBrand(){
        Api.Brand.GetAll()
            .done(res => {
                View.Brand.render(res.data)
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    }
 
    function getColor(){
        Api.Color.GetAll()
            .done(res => {
                View.Color.render(res.data)
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    }
     
    init();
})();
