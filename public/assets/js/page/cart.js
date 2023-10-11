const View = {
    Cart: {
        total: 0,
        render(data){

        }
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
                View.Product.render(res.data);
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
                View.Color.data = res.data
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    }
     
    init();
})();
