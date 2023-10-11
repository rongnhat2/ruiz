const IndexView = {
    Cart: {
        add_to_card(name, callback){
            $(document).on('click', `.action-add-to-card`, function() {
                if($(this).attr('atr').trim() == name) {
                    $(this).text("Added");
                    callback($(this));
                }
            });
        },
        update(){
            var card_data = localStorage.getItem("ruiz-cart")
            var count = (card_data == null || card_data == "") ? 0 : JSON.parse(card_data).length;
            $(".cart-count .count").html(count)
        },
        init(){ 
            var card_data = localStorage.getItem("ruiz-cart")
            if (card_data == null || card_data == "") {

            }else{
                let data_id = $(`.action-add-to-card`).attr("data-id")
                let card_json = JSON.parse(card_data)
                cart_list_id = []
                card_json.map(v => {
                    cart_list_id.push(JSON.parse(v).id)
                })
                hasId = cart_list_id.includes(data_id)
                if (hasId) $(`.action-add-to-card`).text("Added");
            }

        }
    },
    Config: {
        onNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        },
        isEmail(email){
            return email.match( /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ );
        },
        formatPrices(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        },
        toNoTag(string){
            return string.replace(/(<([^>]+)>)/ig, "");
        },
        isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        },
    },
    onSearch(callback){
        $(document).on('keyup', '.product-search-field', function() {
            $('.suggest-list .suggess-wrapper').remove()
            var data = $(this).val(); 
            var data_text      = $(this).val();
            var data_category  = $(`#category-search`).val();
            var fd = new FormData();
            fd.append('data_text', data_text);
            fd.append('data_category', data_category);
            if (data_text) callback(fd, data_text);
        });
        $(document).mouseup(function(e) {
            var container = $(".searchProduct");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $('.suggest-list .suggess-wrapper').remove()
            }
        });
    },
    doSearch(callback){
        $(document).on('keypress', '.product-search-field', function(e) { 
            if (e.which == 13) {
                var data_text      = $(this).val();
                var data_category  = $(`#category-search`).val();
                callback(data_text, data_category);
            }
        });
    },
    init(){
        IndexView.Cart.init()
        IndexView.Cart.update()
    }
};
(() => {
    IndexView.init(); 
    function init(){

    }
    
    IndexView.onSearch((fd, text) => {
        Api.Product.GetSearch(fd).done(res => { 
            $('.suggest-list .suggess-wrapper').remove()
            $('.suggest-list')
                .append(`<div class="suggess-wrapper"></div>`)
            if (res.data.length > 0) {
                res.data.map(v => {
                    $(".suggess-wrapper").append(`
                            <div class="suggess-item">
                                <a title="${v.name}" href="/product/${ v.id }-${v.slug }">${v.name}</a>
                                <p>${highlight(text, v.name)}</p>
                            </div>`)
                })
            }else{
                $(".suggess-wrapper").append(`<div class="suggess-item">検索結果がありません</div>`)
            }
        })
    })
    IndexView.doSearch((text, category) => {
        window.location.replace(`/category?keyword=${text}&tag=${category}`);
    })
    function highlight(text, inputText) {
        var index = inputText.toLowerCase().indexOf(text.toLowerCase());
       inputText = inputText.substring(0,index) + "<span class='highlight'>" + inputText.substring(index,index+text.length) + "</span>" + inputText.substring(index + text.length);
       return inputText
        
    }
    IndexView.Cart.add_to_card("Add to card", (item) => {
        var root = $(".product-data")
        var card        = localStorage.getItem("ruiz-cart");

        var data_id     = root.find(".product-id").val();
        var data_color     = root.find(".product-color").val();
        var data_quantity     = root.find(".product-quantity").val();

        var data_json = `{"id": "${data_id}", "color": "${data_color}", "quantity": "${data_quantity}" }`
        
        if (card == null || card == ""){
            card = [];
            card.push(data_json)
            localStorage.setItem("ruiz-cart", JSON.stringify(card));  
        }else{
            let card_json = JSON.parse(card)

            cart_list_id = []
            card_json.map(v => {
                cart_list_id.push(JSON.parse(v).id)
            })
            hasId = cart_list_id.includes(data_id)
            if (!hasId) {
                card_json.push(data_json) 
                localStorage.setItem("ruiz-cart", JSON.stringify(card_json)); 
            }
        } 
        IndexView.Cart.update();
    })
    init();
})();