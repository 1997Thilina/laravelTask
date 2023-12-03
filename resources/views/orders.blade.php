<!DOCTYPE html>
<html>
<head>
    <title>View Purchase Orders</title>
    <!-- Add Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container col-md-10">
        <h2 class="mt-10">View Purchase Orders</h2>
    
        <form class="col-md-12" method="GET" action="{{ route('order.view') }}">
            @csrf <!-- CSRF protection -->
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="zone">Zone</label>
                    <select class="form-control" id="zone" name="zone">
                        <option value="null" disabled selected>Select</option>
                        @foreach ($z as $item)
                        
                        <option>{{$item->short_description}}</option>
                        @endforeach
                        
                        <!-- Add zone options dynamically -->
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="region">Region</label>
                    
                    <select class="form-control" id="region" name="region">
                        <option value="" disabled selected>Select</option>
                     
                        @foreach ($r as $item)
                        <option>{{$item->region_name}}</option>
                        @endforeach
                        <!-- Add region options dynamically -->
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="territory">Territory</label>
                    <select class="form-control" id="territory" name="territory">
                        <option value="" disabled selected>Select</option>
                        
                        {{-- <option value="" disabled selected>Select</option> --}}

                        
                        @foreach ($t as $item)
                        <option>{{$item->territory_name}}</option>
                        @endforeach
                        <!-- Add territory options dynamically -->
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="distributor">Distributor</label>
                    <select class="form-control" id="distributor" name="customer">
                        <option value="" disabled selected>Select</option>
                        
                        @foreach ($user as $item)
                        @if($item->role !== 'admin')
                        <option>{{$item->name}}</option>
                        @endif
                        @endforeach
                        <!-- Add distributor options dynamically -->
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="poNumber">PO Number</label>
                    <input type="text" name="bulk_id" id="bulk_id" placeholder="type here">
                </div>
                <div class="form-group col-md-3">
                    <label for="dateFROM">FROM</label>
                    <input type="date" class="form-control" id="from_date" name="from_date">
                </div>
                <div class="form-group col-md-3">
                    <label for="dateTO">TO</label>
                    <input type="date" class="form-control" id="to_date" name="to_date">
                </div>
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-success">Filter</button>
                </div>
            </div>
        </form>
        <div class="form-group col-md-2">
            <button type="submit" class="btn btn-success" id='clearFilter'>Clear Filter</button>
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Region</th>
                    <th>Territory</th>
                    <th>Distributor</th>
                    <th>PO Number</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Total amount</th>
                    <th>View PO </th>
                    <th>Select To Print <br> <label for="select_all">select all:</label><input type="checkbox" class="col-md-3" id="select_all" name="select_all"></th>

                </tr>
            </thead>
            <tbody id="tableBody">
                
            </tbody>
        </table>
        
        {{-- <div class="col-md-2">
            <a href="{{ route('orderDetails.download') }}" class="btn btn-primary" style="color: white; width:100px ; height:40px; background-color: rgb(9, 156, 63);">download csv</a>
        </div> --}}
        <div id="message-container"></div>
        <div class="form-group col-md-2">
            <button type="submit" class="btn btn-success" id='print_order'>Print</button>
        </div>

    </div>
    <script>
        
        const inputFields = document.querySelectorAll('#zone');
        //const displayLabel1=document.getElementById('total_amount');
        //const zoneSelect = document.getElementById('zone');
        const regionSelect = document.getElementById('region');
        const territorySelect1 = document.getElementById('territory');
        
        for (const inputField of inputFields) {
           
        inputField.addEventListener('input', function (event) {
            const targetInput = event.target;
            const myZone  = targetInput.value;
            var myRegion = @json($r);
            //console.log(myZone);
            regionSelect.innerHTML = '';
            const option = document.createElement('option');
            option.value = '';
            option.text = 'Select';
            option.disabled = true;
            option.selected = true;
            regionSelect.add(option);
            
            for (var j = 0; j < myRegion.length; j++) {
                var sItem = myRegion[j];
                
                if(sItem.zone == myZone){
                    
                    const option = document.createElement('option');
                    option.value = sItem.region_name;
                    option.text = sItem.region_name;
                    regionSelect.add(option);
                    
    
                }
            }
            
        });
        
        }
        ////////////////////////////////////////
    </script>
    <script>
        
        const inputFields2 = document.querySelectorAll('#region');
        //const displayLabel1=document.getElementById('total_amount');
        //const zoneSelect = document.getElementById('zone');
        const territorySelect = document.getElementById('territory');
        
        for (const inputField of inputFields2) {
           
        inputField.addEventListener('input', function (event) {
            const targetInput = event.target;
            const myRegion  = targetInput.value;
            var myTerritory = @json($t);
            //console.log(myRegion);
            territorySelect.innerHTML = '';
            const option = document.createElement('option');
            option.value = '';
            option.text = 'Select';
            option.disabled = true;
            option.selected = true;
            territorySelect.add(option);
            
            // const userObject = {};

            for (var j = 0; j < myTerritory.length; j++) {
                var sItem = myTerritory[j];
                
                if(sItem.region == myRegion){
                    const option = document.createElement('option');
                    
                    option.value = sItem.territory_name;
                    option.text = sItem.territory_name;
                    territorySelect.add(option);
                }
            }
        });
        
        }
    
    </script>

    <script> // user dynamic
            
        const inputFields3 = document.querySelectorAll('#territory');
        //const displayLabel1=document.getElementById('total_amount');
        //const zoneSelect = document.getElementById('zone');
        const userSelect = document.getElementById('distributor');
        
        for (const inputField of inputFields3) {
        
        inputField.addEventListener('input', function (event) {
            const targetInput = event.target;
            const myTerr  = targetInput.value;
            var myUser = @json($user);
            //console.log(myRegion);
            userSelect.innerHTML = '';
            const option = document.createElement('option');
            option.value = '';
            option.text = 'Select';
            option.disabled = true;
            option.selected = true;
            userSelect.add(option);
            
            // const userObject = {};

            for (var j = 0; j < myUser.length; j++) {
                var userItem = myUser[j];
                
                if(userItem.territory == myTerr){
                    const option = document.createElement('option');
                    
                    option.value = userItem.name;
                    option.text = userItem.name;
                    userSelect.add(option);
                    
                }
            }
            // for(var m =1; m<= regionObject.length; m++){
            //     var rItem = myRegion[j];
            //     option.value = rItem.region_name;
            //     option.text = rItem.region_name;
            //     territorySelect1.add(option);
            // }
        // console.log(regionObject);

        });
        
        }

    </script>
    

    <script>
        const tableBody = document.getElementById('tableBody');
        const selectAll = document.getElementById('select_all');
        const rowData = @json($result);
        const bulkIdSums = {};
        const regionArray = {};
        const territoryArray = {};
        const customerArray = {};
        const dateArray = {};
        const timeArray = {};
        const checkedArray = {};
        let i = 0;
        let j = 0;

        rowData.forEach(item => {
            let region1 = item['region'];
            let territoryName = item['territory_name']; 
            let customerName = item['customer_name']; 
            let bulk_id = item['bulk_id'];
            let dateTimeString = item['date'];
            let [date, time] = dateTimeString.split(' ');
            let amount = parseFloat(item['amount']);
            i++;
            
            //console.log(customerName);

            // Check if bulkId is already in bulkIdSums
            //i = bulk_id;
            if (!bulkIdSums[bulk_id]) {
                bulkIdSums[bulk_id] =0 ;
                //customerArray[bulk_id] ;
                //customerArray[bulk_id] = 0;
                //names[bulk_id] 
                j=i;
                //console.log('bi '+j);
            }

            // Add the current amount to the sum
            bulkIdSums[bulk_id] += amount;
            regionArray[bulk_id] = region1;
            territoryArray[bulk_id] = territoryName;
            
            customerArray[bulk_id] = customerName;
            
            dateArray[bulk_id] = date;
            timeArray[bulk_id] = time;
            checkedArray[bulk_id] = false;
            //console.log(bulkIdSums);
            //console.log(bulk_id);
            //console.log(checkedArray);
        });

        

        Object.keys(bulkIdSums).forEach(bulk_id => {
            const newRow = document.createElement('tr');
            const tdRegion = document.createElement('td');
            const tdTerritory = document.createElement('td');
            const tdName = document.createElement('td');
            const tdBulkId = document.createElement('td');
            const tdDate = document.createElement('td');
            const tdTime = document.createElement('td');
            const tdResult = document.createElement('td');
            const newButton = document.createElement('button');
            const newCheckbox = document.createElement('input');

            const checkboxcolumn = document.createElement('td');
            const checkboxContainer = document.createElement('div');

            checkboxContainer.classList.add('form-check');
            newCheckbox.classList.add('form-check-input'); 
            checkboxContainer.appendChild(newCheckbox);
            checkboxcolumn.appendChild(checkboxContainer);


            // Set button attributes and properties
            newButton.textContent = 'view'; // Set button text
            newButton.setAttribute('id', 'myButton'); // Set button id
            newButton.classList.add('btn', 'btn-primary'); // Add CSS classes

            newCheckbox.type = 'checkbox';
            newCheckbox.id = 'newCheckbox';
            //newCheckbox.name = 'newCheckbox';
            newCheckbox.style.margin = '7px';
            newCheckbox.value = bulk_id;
            //console.log(newCheckbox);
            
            // Add a click event listener to the button
            newButton.addEventListener('click', function() {
                //alert('Button clicked!'+ bulk_id);
                window.location.href = '/viewOderDetails?bulk_id=' + bulk_id;
            });

            selectAll.addEventListener('click', function() {
                //alert('Button clicked!'+ bulk_id);
                if(selectAll.checked){
                    newCheckbox.checked = true;
                }else{
                    newCheckbox.checked = false;
                }
                checkedArray[bulk_id] = newCheckbox.checked;//
                //console.log(checkedArray);
                
            });
            newCheckbox.addEventListener('click', function() {
                if(!newCheckbox.checked){

                    selectAll.checked = false;
                }
                checkedArray[newCheckbox.value] = newCheckbox.checked;
  
            });

            

            // Populate td elements with data
            tdRegion.textContent = regionArray[bulk_id];
            tdTerritory.textContent = territoryArray[bulk_id];
            tdName.textContent = customerArray[bulk_id];
            tdBulkId.textContent = bulk_id;
            tdDate.textContent = dateArray[bulk_id];
            tdTime.textContent = timeArray[bulk_id];
            tdResult.textContent = bulkIdSums[bulk_id];
            

            // Append td elements to the new row
            newRow.appendChild(tdRegion);
            newRow.appendChild(tdTerritory);
            newRow.appendChild(tdName);
            newRow.appendChild(tdBulkId);
            newRow.appendChild(tdDate);
            newRow.appendChild(tdTime);
            newRow.appendChild(tdResult);
            newRow.appendChild(newButton);
            //newRow.appendChild(space);
            newRow.appendChild(checkboxcolumn);

            // Append the new row to the table body
            tableBody.appendChild(newRow);

            
        });
    //////////////////////////////////
    
    const newButton2 = document.getElementById('clearFilter');
    newButton2.addEventListener('click', function() {
                //alert('Button clicked!'+ bulk_id);
                
                window.location.href = '/viewOder';
    });

    const newButton3 = document.getElementById('print_order');
    newButton3.addEventListener('click', function() {
                //alert('Button clicked!'+ bulk_id);
                
                //window.location.href = '/viewOder';
                const checkedBulkIds = Object.keys(checkedArray).filter(bulk_id => checkedArray[bulk_id]);
                console.log(checkedBulkIds);
                if(checkedBulkIds.length == 0){
                    
                    const messageContainer = document.getElementById('message-container');
                    
                    
                    const message  = 'Select at least one order to print';
                   
                    messageContainer.style.display = 'block';
                    messageContainer.textContent = message;
                    messageTimeout = setTimeout(() => { 
                        messageContainer.style.display = 'none';
                    }, 2000);
                    
                }
                
                else{
                    window.location.href = '/download/orderDetails?checkedArray=' + checkedBulkIds;
                }
               
                //
    });

    </script>

    <!-- Add Bootstrap JavaScript and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
