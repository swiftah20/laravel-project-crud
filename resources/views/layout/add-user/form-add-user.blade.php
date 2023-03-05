<form id="formAddUser" class="needs-validation">
    <div class="row">
        <div class="col-sm">
            <h5 class="border-botom-3"> Form User Detail </h5>
            <hr class="divider">
            <div class="form-group mb-2">
                <label class="mb-1" for="firstName"> First Name </label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="form-group mb-2">
                <label class="mb-1" for="lastName"> Last Name </label>
                <input type="text" class="form-control" id="lastName" placeholder="Last Name" required>
            </div>
            <div class="form-group mb-2">
                <label class="mb-1" for="email"> Email </label>
                <input type="email" class="form-control" id="email" placeholder="Email" required>
            </div>
            <div class="form-group mb-2">
                <label class="mb-1" for="userAdress"> Address </label>
                <textarea class="form-control" id="userAdress" rows="3" placeholder="User Address"></textarea>
            </div>
        </div>
        <div class="col-sm">
            <h5 class="border-botom-3"> Form Company Detail </h5>
            <hr class="divider">
            <div class="form-group mb-2">
                <label class="mb-1" for="inputCompanyName"> Company Name </label>
                <input type="text" class="form-control" id="companyName" placeholder="Company Name" required>
            </div>
            <div class="form-group mb-2">
                <label class="mb-1" for="inputDepartmentName"> Department Name </label>
                <input type="text" class="form-control" id="deparmentName" placeholder="Department Name" required>
            </div>
            <div class="form-group mb-2">
                <label class="mb-1" for="inputTitleName"> Title </label>
                <input type="text" class="form-control" id="titleName" placeholder="Title Name" required>
            </div>
            <div class="form-group mb-2">
                <label class="mb-1" for="inputCompanyAddress"> Address </label>
                <textarea class="form-control" id="companyAdress" rows="3" placeholder="Company Address"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <button type="button" class="btn btn-warning"> Reset </button>
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </div>
    </div>
</form>
