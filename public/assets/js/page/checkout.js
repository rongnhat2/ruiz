const View = {
    Cart: {
        total: 0,
        render(data){
            View.Cart.total += data.quantity * data.prices
            $(".cart-total-price").html(`$${View.Cart.total}`)
            $(".cart-list")
                .append(`
                        <tr class="cart_item">
                            <td class="product-name">
                                ${data.name} <strong class="product-quantity"> × ${data.quantity}</strong>
                            </td>
                            <td class="product-total">
                                <span class="amount">$${data.quantity * data.prices}</span>
                            </td>
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
        renderData(card_json)
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
        View.Cart.total = 0;
        var card_data = localStorage.getItem("ruiz-cart")
        let card_json = JSON.parse(card_data)

        let card_new = []
        card_json.map(v => {
            let cart_item = JSON.parse(v)
            cart_item["quantity"] = $(`.plantmore-product-quantity[data-id=${cart_item.id}] input`).val()
            card_new.push(JSON.stringify(cart_item)) 
        })
        localStorage.setItem("ruiz-cart", JSON.stringify(card_new)); 

        card_json_new = JSON.parse(JSON.stringify(card_new))
        renderData(card_json_new)
    })

    function renderData(data){
        $(".cart-list tr").remove()
        data.map(v => {
            getOne(v)
        }) 
    }
 
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
