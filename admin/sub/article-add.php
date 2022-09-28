<div class="jumbotron box-shadow">
  <div class="col-12">
    <form class="upl-form form-group" method="post" action="?s=article-add-sql">
      <h1 class="display-4">Wstawianie nowego wiersza</h1>
      <hr>
      <table>
        <tr>
          <td> <input class="form-control" style="width: 100%;" type="text" name="id-upl" disabled placeholder="ID"/></td>
              <input hidden name="author-upl" value="<?php echo $loginResult[1]; ?>"/>
        </tr>
        <tr>
          <td> <input class="form-control" type="text" name="topic-upl" placeholder="Tytuł"/></td>
        </tr>
        <tr>
          <td> <input class="form-control" type="date" name="date-upl" value="<?php echo date('Y-m-d'); ?>"/></td>
        </tr>
        <tr>
          <td> <input class="form-control" type="text" name="description-upl" placeholder="Opis"/></td>
        </tr>
        <tr>
          <td> <input class="form-control" type="text" name="image-upl" placeholder="Ścieżka obrazu" value="images\"></td>
        </tr>
        <tr>
          <td> <input class="form-control" type="text" name="link-upl" placeholder="Link"/></td>
        </tr>
        <tr>
          <td>
            <textarea id="myeditor" name="body-upl"> </textarea>
            <script type="text/javascript">
              CKEDITOR.replace("myeditor");
            </script>
          </td>
        </tr>
      </table>
      <input class="btn btn-outline-secondary" type="submit" value="Zapisz">
      <input class="btn btn-outline-secondary" type="reset" value="Wyczyść">
    </form>
  </div>
</div>
