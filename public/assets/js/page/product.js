const View = {
    
    RelatedProduct: {
        render(data){
            data.map(v => {
                $(".related-product")
                    .append(`<div class="single-product-area mt-30 col-lg-3">
                            <div class="product-thumb">
                                <a href="/product/${v.slug}">
                                    <img class="primary-image" src="/${v.images.split(",")[0]}" alt="">
                                </a>
                                <div class="label-product label_new">${v.brand_name}</div> 
                            </div>
                            <div class="product-caption">
                                <h4 class="product-name"><a href="/product/${v.slug}">${v.name}</a></h4>
                                <div class="price-box">
                                <span class="new-price">$${v.prices}</span> 
                                </div>
                            </div>
                        </div>`)
            })
        }
    },
    isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    },
    formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    },
    URL: {
        get(id){
            return $(".product-id").val()
        }
    },
    init(){
        
    }
};
(() => {
    View.init()
    function init(){
        getRelatedProduct();
    }

    function getRelatedProduct(){
        Api.Product.GetRelated(View.URL.get("id"))
            .done(res => {
                View.RelatedProduct.render(res.data);
            })
            .fail(err => {  })
            .always(() => { });
    } 
    init()
})();
