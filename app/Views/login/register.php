<h3>Rekisteröidy</h3>
<form action="/login/registeration">
    <div class="col-12">
        <?= \Config\Services::validation()->listErrors(); ?>
    </div>
    <div class="form-group">
        <label>Username</label>
        <input
            class="form-control"
            name="username"
            placeholder="Enter username"
            maxlength="30">
    </div>
    <div class="form-group">
        <label>First name</label>
        <input
            class="form-control"
            name="firstname"
            placeholder="Enter first name"
            maxlength="100">
    </div>
    <div class="form-group">
        <label>Last name</label>
        <input
            class="form-control"
            name="lastname"
            placeholder="Enter last name"
            maxlength="100">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input
            class="form-control"
            name="password"
            type="password"
            placeholder="Enter password"
            maxlength="255">
    </div>
    <div class="form-group">
        <label>Password again</label>
        <input
            class="form-control"
            name="confirmedpassword"
            type="password"
            placeholder="Enter password again"
            maxlength="255">
    </div>
    <div class="form-group">
        <label>Lähiosoite</label>
        <input
            class="form-control"
            name="lahiosoite"
            placeholder="Lähiosoite"
            maxlength="200">
    </div>
    <div class="form-group">
        <label>Postinumero</label>
        <input
            class="form-control"
            name="postinumero"
            placeholder="Postinumero"
            maxlength="200">
    </div>
    <div class="form-group">
        <label>Postitoimipaikka</label>
        <input
            class="form-control"
            name="postitoimipaikka"
            placeholder="Postitoimipaikka"
            maxlength="200">
    </div>
    <div class="form-group">
        <label>Sähköpostiosoite</label>
        <input
            class="form-control"
            name="email"
            placeholder="Sähköpostiosoite"
            maxlength="200">
    </div>
    <div class="form-group">
        <label>Puhelinnumero</label>
        <input
            class="form-control"
            name="puhelin"
            placeholder="Puhelinnumero"
            maxlength="200">
    </div>
    <button class="btn btn-primary">Submit</button>
</form>