const Api = {
    Color: {},  
    Brand: {},  
    Product: {},  



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
    Api.Color.Store = (data) => $.ajax({
        url: `/apip/color/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Color.getOne = (id) => $.ajax({
        url: `/apip/color/get-one/${id}`,
        method: 'GET',
    });
    Api.Color.Update = (data) => $.ajax({
        url: `/apip/color/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Color.Delete = (id) => $.ajax({
        url: `/apip/color/delete/${id}`,
        method: 'GET',
    });
})(); 
 
//Brand
(() => {
    Api.Brand.GetAll = () => $.ajax({
        url: `/apip/brand/get`,
        method: 'GET',
    }); 
    Api.Brand.Store = (data) => $.ajax({
        url: `/apip/brand/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Brand.getOne = (id) => $.ajax({
        url: `/apip/brand/get-one/${id}`,
        method: 'GET',
    });
    Api.Brand.Update = (data) => $.ajax({
        url: `/apip/brand/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Brand.Delete = (id) => $.ajax({
        url: `/apip/brand/delete/${id}`,
        method: 'GET',
    });
})(); 

//Product
(() => {
    Api.Product.GetAll = () => $.ajax({
        url: `/apip/product/get`,
        method: 'GET',
    }); 
    Api.Product.Store = (data) => $.ajax({
        url: `/apip/product/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Product.getOne = (id) => $.ajax({
        url: `/apip/product/get-one/${id}`,
        method: 'GET',
    });
    Api.Product.Update = (data) => $.ajax({
        url: `/apip/product/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Product.Delete = (id) => $.ajax({
        url: `/apip/product/delete/${id}`,
        method: 'GET',
    });
})(); 


//Category
(() => {
    Api.Category.GetAll = () => $.ajax({
        url: `/apip/category/get`,
        method: 'GET',
    }); 
    Api.Category.Store = (data) => $.ajax({
        url: `/apip/category/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Category.getOne = (id) => $.ajax({
        url: `/apip/category/get-one/${id}`,
        method: 'GET',
    });
    Api.Category.Update = (data) => $.ajax({
        url: `/apip/category/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Category.Delete = (id) => $.ajax({
        url: `/apip/category/delete/${id}`,
        method: 'GET',
    });
})(); 

//Size
(() => {
    Api.Size.GetAll = () => $.ajax({
        url: `/apip/size/get`,
        method: 'GET',
    }); 
    Api.Size.Store = (data) => $.ajax({
        url: `/apip/size/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Size.getOne = (id) => $.ajax({
        url: `/apip/size/get-one/${id}`,
        method: 'GET',
    });
    Api.Size.Update = (data) => $.ajax({
        url: `/apip/size/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Size.Delete = (id) => $.ajax({
        url: `/apip/size/delete/${id}`,
        method: 'GET',
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
