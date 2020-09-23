<div class="card border-0 p-4">
    <div class="card-body ">
        <h5>Add a new product</h5>
        <hr class="underline mb-4" />
        <div id="response"></div>
        <form method="POST" id="newProductForm">
            <div class="form-group row">
                <div class="col-md-6 grid-stack">
                    <input type="text" class="form-control" value="" name="product_name" placeholder="Product Name" required />
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" value="" name="price" placeholder="&#8358; Price" required />
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea name="product_description" class="form-control" placeholder="Product Description"></textarea>
                </div>
            </div>
            
            <h6 class="mt-5 mb-3">Product Images</h6>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>  
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary float-right">Add Product</button>
                </div>
            </div>
        </form>
    </div>
</div>