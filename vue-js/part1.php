<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <div id="app"> 
<!--        va afisa textul de la menu la hover-->
            <h1 v-bind:title="menu">{{ title }}</h1> 
            <h1 v-if="hidden">Text</h1> 
            <h1 v-else>Another Text</h1> 
            <p v-text="content"></p>
            
            <ul>
                <li v-for="todo in items">{{ todo }}</li>
            </ul>    
            <input type="text" v-model="item">
<!--        item se refera la v-model="item"-->
            <button @click="items.push(item)">Add item</button>
            <ul>
                <li v-for="item in itemsRow">{{ item.text }}
                    <div v-if="item.checked">Checked</div>
                    <button @click="item.checked =! item.checked">Toggle</button>
                </li>
          
            </ul> 
            
        </div>
        
        
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script>
            new Vue({
                el: "#app",
                data: {
                    title: "My Title",
                    content: "Here is my text",
                    menu: "My menu here",
                    item: "",
                    items: [
                        'item1',
                        'item2'
                    ],
                    itemsRow: [
                        {text:'item1', checked:true},
                        {text:'item2', checked:true},
                        {text:'item3', checked:false}
                    ],
                    hidden: false
                }
            });
        </script>

    </body>
</html>