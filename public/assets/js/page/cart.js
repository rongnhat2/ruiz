const View = {
    Cart: {
        total: 0,
        render(data){
            View.Cart.total += data.quantity * data.prices
            $(".cart-list")
                .append(`<tr>
                            <td class="plantmore-product-thumbnail">
                                <a href="/product/${data.slug}"> <img src="/${data.images.split(",")[0]}" style="width: 150px" alt=""></a>
                            </td>
                            <td class="plantmore-product-name"><a href="#">${data.name}</a></td>
                            <td class="plantmore-product-price"><span class="amount">$${data.prices}</span></td>
                            <td class="plantmore-product-quantity" data-id="${data.id}">
                                <input value="${data.quantity}" type="number">
                            </td>
                            <td class="product-subtotal"><span class="amount">$${data.quantity * data.prices}</span></td>
                            <td class="plantmore-product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                        </tr>`)
        },
        doUpdate(){

        },
        onUpdate(callback){ 
            $(document).on('click', `.update-cart`, function() {
                callback();
            }); 
        },
    },
    Color: {
        data: [],
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
        await getColor();
        var card_data = localStorage.getItem("ruiz-cart")
        let card_json = JSON.parse(card_data)
        cart_list_id = []
        card_json.map(v => {
            getOne(v)
        })
    } 

    function getOne(string_data){
        let json_data = JSON.parse(string_data)
        Api.Product.getOne(json_data.id)
            .done(res => {
                res.data["quantity"] = json_data.quantity
                View.Cart.render(res.data);
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    } 

    View.Cart.onUpdate(() => {
        var card_data = localStorage.getItem("ruiz-cart")
        let card_json = JSON.parse(card_data)

        card_json.map(v => {
            let cart_item = JSON.parse(v)
            cart_item["quantity"] = $(`.plantmore-product-quantity[data-id=${cart_item.id}] input`).val()
        })

        $(".plantmore-product-quantity").map(v =>  {

        })
        console.log(123);
    })
 
    function getColor(){
        Api.Color.GetAll()
            .done(res => {
                View.Color.data = res.data
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    }
     
    init();
})();
