<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHeading"></h5>
                <button type="button" class="btn-close btn-danger active" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="usersajax.php" method="post" name="myForm" id="myForm" enctype="multipart/form-data">
                <input type="hidden" name="userId" id="userId">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control border border-primary" id="name" aria-describedby="emailHelp" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control border border-primary" id="email" aria-describedby="emailHelp" onblur="checkEmailId(this.value)" />
                        <div id="emailError"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mobile</label>
                        <input type="text" name="mobile" class="form-control border border-primary" id="mobile" aria-describedby="emailHelp" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control border border-primary" id="address" aria-describedby="emailHelp" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">State</label>
                        <input type="text" name="state" class="form-control border border-primary" id="state" aria-describedby="emailHelp" />
                    </div>
                    
                    <div class="mb-3" id="passwordfield">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control border border-primary" name="password" id="password" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Photo</label>
                        <input type="file" name="image" class="form-control border border-primary" id="image"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="submit" name="addUser" id="addUserBtn" class="btn btn-success">ADD</button>
                </div>
            </form>
        </div>
    </div>
</div>

