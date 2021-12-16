<html>
  <head><title>Hello World</title></head>
  <body>
  	<a id="mylink" href="http://localhost">Click</a><br>
  	<a id="mylink2" href="http://site.ru">ClickSecond</a><br>
    <script type="text/javascript"><!--
      document.write(document.links.mylink.href + "<br>")
      document.write(history.length + "<br>")
      let myarray = new Array()
      myarray.push("Элемент 1")
      myarray.push("Элемент 2")
      let myarray2 = myarray.concat("Элемент 3", "Элемент 4")
      document.write(myarray2 + "<br>")

      document.write(myarray2.reverse())
      // history.go(-3)
      // history.back
      // history.forward
      // document.location.href = 'https://google.com'
      // -->
    </script>
    <noscript>
      Your browser doesn't support or has disabled JavaScript
    </noscript>
  </body>
</html>