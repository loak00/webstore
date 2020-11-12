<h3>Lisää tuoteryhmä</h3>
<div>
  <?= \Config\Services::validation()->listErrors();?>
</div>
<form action="/admin/tallenna" method="post">
  <div>
    <label>Nimi</label>
    <input name="nimi" maxlength="50" />
  </div>
  <button>Tallenna</button>
</form>