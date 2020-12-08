<h3>Admin kirjautuminen</h3>
<form action="/admin/check">
    <div class="col-12">
    <?= \Config\Services::validation()->listErrors(); ?>
    </div>
    <div class="form-group">
        <label>Adminname</label>
        <input
        class="form-control" 
        name="adminname" 
        placeholder="Enter adminname" 
        maxlength="30">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input 
        class="form-control" 
        name="password" 
        type="password" 
        placeholder="Enter password" 
        maxlength="30">
    </div>
    <button class="btn btn-primary">Login</button>
    
</form>