<div style="text-align:center;background-color:lightpink; padding:50px;">
   <img src="/adminimg/adminnerd.png" alt="nerd kuva" width="200"
         height="200">

    <h3>Admin kirjautuminen</h3>
    <form action="/admin/check">
    <div class="col-12">
    <?= \Config\Services::validation()->listErrors(); ?>
    </div>
    <div class="form-group">
        <label>Admin name</label>
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
    </div><br>
    <button class="btn btn-primary">Login</button><br>
    </form>
</div>


