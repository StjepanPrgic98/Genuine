<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
  rel="stylesheet"
/>
<style>
    .filter_text
    {
        font-size: 15px;
    }
</style>




<form action="/profile/filter" method="POST" class="mt-2">
    @csrf
    <div class="row">
        <div class="col-md-3 mt-1">
            <select class="form-select" aria-label="Default select example" name="sex">
                <option selected value="null">Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
        </div>
        <div class="col-md-3 mt-1">
            <select class="form-select" aria-label="Default select example" name="age">
                <option selected value="null">Age</option>
                @for ($i = 18; $i < 51; $i++)
                <option value="{{$i}}">{{$i}}</option>
                @endfor 
              </select>
        </div>
        <div class="col-md-3 mt-1">
            <select class="form-select" aria-label="Default select example" name="relationship_status">
                <option selected value="null">Relationship status</option>
                <option value="Single">Single</option>
                <option value="In relationship">In Relationship</option>
                <option value="Married">Married</option>
                <option value="Complicated">Complicated</option>
              </select>
        </div>
        <div class="col-md-3 mt-1">
            <select class="form-select" aria-label="Default select example" name="interested_in">
                <option selected value="null">Interested in</option>
                <option value="Men">Men</option>
                <option value="Women">Women</option>
                <option value="Other">Other</option>
              </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-dark mt-2 filter_text">Filter<i class="fas fa-search ml-3"></i></button>
        </div>
        
        
            
        
        
    </div>    
    
    
</form>