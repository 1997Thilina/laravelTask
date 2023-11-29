
<!DOCTYPE html>
<html>
<head>
    <title>Define free</title>
    <!-- Add Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container" style="align-items: center">
        <h2>define free Issues</h2>
        <form method="POST" action="{{ route('DefineFree.store') }}">
            @csrf
            <div class="form-group col-md-4">
                <label for="free_label">Free issue label</label>
                <input type="text" class="form-control" id="free_label" name="free_label" required >
            </div>
            <div class="form-group col-md-4">
                <label for="type">Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="Flat">Flat</option>
                    <option value="Multiple">Multiple</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="product">Purchase Product</label>
                <select class="form-control" id="product" name="product" required>
                    <option value="" disabled selected>Select a product</option>
                    @foreach ($sku as $item)
                    <option>{{$item->sku_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
            
                <label for="free_product">Free product</label>
                
                 <label class="form-control" name=" free_product" id="free_product"> </label>
                 
            </div>
            <div class="form-group col-md-4">
                <label for="purchase_quantity">Purchase Quantity</label>
                <input type="text" class="form-control" name="purchase_quantity" id="purchase_quantity">
            </div>

            

                <div class="form-group col-md-3">
                    <label for="free_quantity">Free quantity</label>
                    <input type="text" class="form-control" name="free_quantity" id="free_quantity">
                </div>

                <div class="form-group col-md-3">
                    <label for="lower_limit">LOWER LIMIT</label>
                    <input type="text" class="form-control" name="lower_limit" id="lower_limit">
                </div>

                <div class="form-group col-md-3">
                    <label for="upper_limit">UPPER LIMIT </label>
                    <input type="text" class="form-control" name="upper_limit" id="upper_limit">
                </div>
            
           
            <input type="hidden" class="form-control" name="unit_price" id="unit_price_test">
            <input type="hidden" class="form-control" name="sku_id" id="sku_id_test" >
            

                   
            <button type="submit" class="btn btn-success">Save</button>
        </form>
        
    </div>
    <script>
        const inputFields = document.querySelectorAll('#product');
        //const displayLabel1=document.getElementById('total_amount');
        
        for (const inputField of inputFields) {
           
        inputField.addEventListener('input', function (event) {
            const targetInput = event.target;
            const myProduct  = targetInput.value;
            var myVariable = @json($free_define);
            var mySku = @json($sku);
            const productQ=document.getElementById('free_product');
            const productId=document.getElementById('sku_id_test');
            const productPrice=document.getElementById('unit_price_test');
            
            
            for (var i = 0; i < myVariable.length; i++) {
                var fitem = myVariable[i];
                //console.log("Name: " + item.name + ", Age: " + item.age);
                
                if(fitem.product == myProduct){
                     let fq= fitem.free_quantity;
                    // console.log(myProduct);
                    // console.log(fitem.product + 'test');
                    // console.log(fq);

                    productQ.textContent = fq;
                    break;
                }
                else{
                    productQ.textContent = '';
                }
            }
            for (var j = 0; j < mySku.length; j++) {
                var sItem = mySku[j];
                
                if(sItem.sku_name == myProduct){
                    
                    const fp= sItem.dPrice;
                    const fid= sItem.id;
                    // console.log(mySku);
                     //console.log("Name: " + fp + ", Age: " + fid);

                    productId.value = fid;
                    productPrice.value = fp;
                }
            }


        });
        
        }
    </script>

    <!-- Add Bootstrap JavaScript and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
