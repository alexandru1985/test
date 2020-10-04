<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <div id="app"> 
            <accordion v-for="item in items" :key="item.id" :item="item"></accordion>
            
        </div>
        

        <script src="./dist/app.js"></script>

    </body>
</html>