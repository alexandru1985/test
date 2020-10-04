<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <div id="app"> 
           <ul>
               <li v-for="post in posts" v-text="post.title"></li>
           </ul>
        </div>


        <script src="./dist/part5.js"></script>

    </body>
</html>
