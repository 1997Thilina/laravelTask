
<!DOCTYPE html>
<html>
<head>
    <title>Add Zone</title>
    <!-- Add Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>ADD TERRITORY</h2>
        <form method="POST" action="{{ route('territory.store') }}">
            @csrf <!-- CSRF protection -->
            
            <div class="form-group col-md-3">
                <label for="zone">Zone:</label>
                <select class="form-control" id="zone" name="zone" required>
                    <option value="" disabled selected>Select a Zone</option>
                    @foreach ($z as $item)
                    <option>{{$item->short_description}}</option>
                    @endforeach
                    
                </select>
            </div>
            {{-- <td><label hidden="hidden" id="zone_var"  ></td> --}}
            <div class="form-group col-md-4">
                <label for="region">Region:</label>
                <select class="form-control" id="region" name="region">
                    
                </select>
            </div>
            
            <div class="form-group col-md-4">
                <label for="tr_id"> Territory Code:</label>
                <input type="text" class="form-control" id="tr_id" value="{{ $tr->max('id')+1}}" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="territory_name">Territory Name:</label>
                <input type="text" class="form-control" id="territory_name" name="territory_name" placeholder="Ex. TERRITORY 1">
            </div>
            <button type="submit" class="btn btn-success">SAVE</button>

        </form>
        @if($errors->has('territory_name'))
        <div class="alert alert-danger">
            {{ $errors->first('territory_name') }}
        </div>
        @endif
    </div>


    <script>
        const inputFields = document.querySelectorAll('#zone');
        //const displayLabel1=document.getElementById('total_amount');
        //const zoneSelect = document.getElementById('zone');
        const regionSelect = document.getElementById('region');
        
        for (const inputField of inputFields) {
           
        inputField.addEventListener('input', function (event) {
            const targetInput = event.target;
            const myZone  = targetInput.value;
            var myRegion = @json($znr);
            //console.log(myZone);
            regionSelect.innerHTML = '';

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
    </script>
    

    <!-- Add Bootstrap JavaScript and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
