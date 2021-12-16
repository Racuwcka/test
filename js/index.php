<!DOCTYPE html>
<html>
  <head>
    <title>An Example Form</title>
    <style>
      .signup {
        border:1px solid #999999;
        font:  normal 14px helvetica;
        color: #444444;
      }
    </style>

    <script>
      function validate(form){
        if (/Le *Guin/.test(form.forename.value)) return alert("true")
        else return alert("false");
        document.write(form.forename.value);
      }
    </script>
  </head>
  <body>
    <table class="signup" border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
      <th colspan="2" align="center">Signup Form</th>
      <form method="get" action="" onsubmit="return validate(this)">
        <tr><td>Forename</td>
          <td><input type="text" maxlength="32" name="forename"></td></tr>
          <tr><td colspan="2" align="center"><input type="submit" value="Signup"></td></tr>
      </form>
    </table>
  </body>
</html>