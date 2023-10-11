const View = {

    Product: {
        render(data){
            data.map(v => {
                $(".data-list")
                    .append(`<div class="col-lg-12"> 
                                <div class="single-product-area mt-30">
                                    <div class="product-thumb">
                                        <a href="/product/${v.slug}">
                                            <img class="primary-image" src="/${v.images.split(",")[0]}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-caption">
                                        <h4 class="product-name"><a href="/product/${v.slug}">${v.name}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">$${v.prices}</span> 
                                        </div>
                                    </div>
                                </div> 
                            </div>`)
            })

            $('.product-active-lg-4').slick({
                dots: false,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: false,
                prevArrow: '<button type="button" class="slick-prev"> <i class="fa fa-angle-left"> </i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"> </i></button>',
                responsive: [
                    {
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 479,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
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
    } 


    function getData(){
        Api.Product.GetAllNew()
            .done(res => {
                View.Product.render(res.data)
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    } 
    function getBrand(){
        Api.Brand.GetAll()
            .done(res => {

            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    }
     
    init();
})();
