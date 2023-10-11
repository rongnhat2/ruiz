const Api = {
    Color: {},  
    Brand: {},  
    Product: {},  
    Order: {},



    Category: {},  
    Size: {},  

    Image: {},
    
};
(() => {
    $.ajaxSetup({
        headers: { 
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
        },
        crossDomain: true
    });
})();


//Color
(() => {
    Api.Color.GetAll = () => $.ajax({
        url: `/apip/color/get`,
        method: 'GET',
    }); 
})(); 
 
//Brand
(() => {
    Api.Brand.GetAll = () => $.ajax({
        url: `/apip/brand/get`,
        method: 'GET',
    }); 
})(); 

//Product
(() => {
    Api.Product.GetAll = () => $.ajax({
        url: `/apip/product/get`,
        method: 'GET',
    }); 
    Api.Product.GetAllNew = () => $.ajax({
        url: `/apip/product/get-all-new`,
        method: 'GET',
    }); 
    Api.Product.getOne = (id) => $.ajax({
        url: `/apip/product/get-one/${id}`,
        method: 'GET',
    });
})(); 


//Category
(() => {
    Api.Category.GetAll = () => $.ajax({
        url: `/apip/category/get`,
        method: 'GET',
    }); 
})(); 

//Size
(() => {
    Api.Size.GetAll = () => $.ajax({
        url: `/apip/size/get`,
        method: 'GET',
    }); 
})(); 

// Order
(() => {
    Api.Order.Checkout = (data) => $.ajax({
        url: `/customer/apip/order/checkout`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Order.GetOrder = (tab) => $.ajax({
        url: `/customer/apip/order/get`,
        method: 'GET',
        dataType: 'json',
        data: {
            tab: tab ?? null,
        }
    });
})();


// Image
(() => {
    Api.Image.Create = (data) => $.ajax({
        url: `/apip/post-image`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
})();
