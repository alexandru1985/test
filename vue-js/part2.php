<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <div id="app"> 
            Price<input type="text" v-model="price">
            <div>Tax {{ moneyFormat(tax) }}</div>
            <div>Total {{ moneyFormat(total) }}</div>

        </div>


        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script>
            new Vue({
                el: "#app",
                data: {
                    price: 100
                },
                methods: {
                    moneyFormat: function(price){
                        return '$' + price;
                    }
                },         
                computed: {
                  tax: function() {
                      return this.price * 0.1;
                  }
                  ,
                  total: function() {
                       return parseInt(this.price) + parseInt((this.price * 0.1));                
                  },
                }

            });
        </script>

    </body>
</html>